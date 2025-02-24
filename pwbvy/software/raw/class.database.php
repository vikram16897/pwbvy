<?php

/********************************************************************************/

/*
**Writer: Avinash Kumar
**Class : Database.
**Work  : All the work is related to the database.
/*********************************************************************************/

class Database
{
    /********************************************************/
    # Data Member #
    /********************************************************/

    private $dbHost;
    private $dbName;
    private $dbUser;
    private $dbPassword;
    private $linkRes;
    private $sqlVar;
    private $data;

    /********************************************************/
    # Member Function #
    /********************************************************/

    public function __construct()
    {
        $this->dbHost = HOST;
        $this->dbName = DB_DATABASE;
        $this->dbUser = DB_USER;
        $this->dbPassword = DB_PWD;
        $this->sqlVar = '';
        $this->data = array();

        $this->linkRes = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);

        if ($this->linkRes->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->linkRes->connect_error;
            exit();
        }

        $GLOBALS['db'] = $this->linkRes;
    }

    /**
     * LOGIN
     **/
    public function login($username, $password)
    {
        $_SESSION['username'] = $username;
        $stmt = $this->linkRes->prepare("SELECT * FROM user WHERE username = ? AND password = ? AND status = 'active'");
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            return $result->fetch_array(MYSQLI_ASSOC);
        } else {
            echo "Unsuccessful";
        }
    }

    /**
     * Work: This function inserts the given input into the given table
     * Argument: array, String
     * Return: boolean
     */
    public function insertData($data, $table)
    {
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $sql = "INSERT INTO $table ($columns, added_on, modify_by) VALUES ('$values', NOW(), ?)";
        $stmt = $this->linkRes->prepare($sql);
        $stmt->bind_param('i', $_SESSION['user_detail']['id']);
        return $stmt->execute();
    }

    public function insertSimple($data, $table)
    {
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $sql = "INSERT INTO $table ($columns, added_on) VALUES ('$values', NOW())";
        $stmt = $this->linkRes->prepare($sql);
        return $stmt->execute();
    }

    /**
     * Work: This function sets the Primary key of any data of any table into session variable $_SESSION['pk']
     * Argument: String(display name), string(table name), String(column name), string(object Name)
     * Return: boolean
     */
    public function getPK($data, $table, $fieldName, $pkField)
    {
        $sql = "SELECT $pkField FROM $table WHERE $fieldName = ?";
        $stmt = $this->linkRes->prepare($sql);
        $stmt->bind_param('s', $data);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $_SESSION['pk'] = $row[$pkField];
            return $row[$pkField];
        } else {
            $_SESSION['pk'] = '0';
            return 0;
        }
    }

    /**
     * Work: This function deletes the row of any given table using the primary Key
     * Argument: array
     * Return: boolean
     */
    public function deleteData($data, $table, $pkField)
    {
        $sql = "DELETE FROM $table WHERE $pkField = ?";
        $stmt = $this->linkRes->prepare($sql);
        $stmt->bind_param('i', $data);
        return $stmt->execute();
    }

    /**
     * Work: This function selects all data from a given table
     * Argument: array
     * Return: array
     */
    public function selectAll($table, $status)
    {
        $sql = "SELECT * FROM $table WHERE $status BETWEEN '1' AND '3' ORDER BY id DESC";
        return $this->linkRes->query($sql);
    }

    public function selectByField($table, $status, $field, $data)
    {
        $sql = "SELECT * FROM $table WHERE $field = ? AND $status BETWEEN '1' AND '3' ORDER BY id DESC";
        $stmt = $this->linkRes->prepare($sql);
        $stmt->bind_param('s', $data);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function selectAllFromTable($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->linkRes->query($sql);
    }

    public function selectAllPageByPage($table, $page, $range)
    {
        $sql = "SELECT COUNT(*) AS total FROM $table";
        $result = $this->linkRes->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION['tc'] = $row['total'];
        $_SESSION['np'] = ceil($row['total'] / $range);

        if ($page < 0) {
            $page = 0;
        } elseif ($page >= $_SESSION['np']) {
            $page = $_SESSION['np'] - 1;
        }

        $offset = $page * $range;
        $sql = "SELECT * FROM $table ORDER BY sNo LIMIT ?, ?";
        $stmt = $this->linkRes->prepare($sql);
        $stmt->bind_param('ii', $offset, $range);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function selectAllActive($table)
    {
        $sql = "SELECT * FROM $table WHERE status = '1'";
        return $this->linkRes->query($sql);
    }

    public function getDNByPK($pk, $pkField, $tableName, $dn)
    {
        $sql = "SELECT $dn FROM $tableName WHERE $pkField = ?";
        $stmt = $this->linkRes->prepare($sql);
        $stmt->bind_param('s', $pk);
        $stmt->execute();
        $result = $stmt->get_result();
        $res = $result->fetch_assoc();
        return $res[$dn];
    }

    public function selectAllData($table, $condition, $order, $orderfield, $limit = '')
    {
        $sql = "SELECT * FROM $table";

        if (!empty($condition)) {
            $sql .= " WHERE ";
            if (is_array($condition)) {
                foreach ($condition as $key => $val) {
                    $sql .= "$key = '$val' AND ";
                }
                $sql = rtrim($sql, "AND ");
            } else {
                $sql .= $condition;
            }
        }

        if (!empty($limit)) {
            $sql .= " ORDER BY $orderfield $order LIMIT $limit";
        } else {
            $sql .= " ORDER BY $orderfield $order";
        }

        $data = array();
        $result = $this->linkRes->query($sql);

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function productMaxPrice()
    {
        $sql = "SELECT selling_price FROM cl_product_data ORDER BY selling_price DESC LIMIT 1";
        $result = $this->linkRes->query($sql);
        $price = $result->fetch_assoc();
        return $price['selling_price'];
    }

    public function selectProductUsingTag($tag)
    {
        $sql = "SELECT * FROM " . TB_PREFIX . "data WHERE (product_tags LIKE '%$tag,%' OR product_tags LIKE '%,$tag' OR product_tags LIKE '$tag') AND product_status = '1'";
        $data = array();
        $result = $this->linkRes->query($sql);

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }


    public function selectLimitedData($table, $condition, $order, $orderfield, $limit = 0, $offset = 0)
    {
        // Start building the query
        $this->sqlVar = "SELECT * FROM " . $table . " ";

        // Check if a condition is provided
        if (!empty($condition)) {
            $this->sqlVar .= "WHERE ";

            if (is_array($condition)) {
                // Build the condition part of the query
                $conditions = [];
                foreach ($condition as $key => $val) {
                    // Use prepared statements or escape the values to prevent SQL injection
                    $conditions[] = "$key = '" . mysqli_real_escape_string($this->linkRes, $val) . "'";
                }
                $this->sqlVar .= implode(' AND ', $conditions);
            } else {
                // If the condition is a string, use it directly
                $this->sqlVar .= $condition;
            }
        }

        // Append the ORDER BY clause
        $this->sqlVar .= " ORDER BY " . $orderfield . " " . $order;

        // Append the LIMIT clause
        if ($limit > 0) {
            $this->sqlVar .= " LIMIT " . $offset . ", " . $limit;
        }

        // Execute the query
        $res = mysqli_query($this->linkRes, $this->sqlVar);

        // Handle query execution errors
        if (!$res) {
            die("Error executing query: " . mysqli_error($this->linkRes));
        }

        // Fetch and return the result
        $data = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }

        return $data;
    }


    public function selectAllByPK($pk, $pkField, $tableName)
    {

        $this->sqlVar = "SELECT * FROM " . $tableName . " WHERE " . $pkField . "='" . $pk . "';";

        //echo $this->sqlVar;

        return mysqli_query($this->linkRes, $this->sqlVar);

    }



    public function delData($tn, $id)
    {

        $this->sqlVar = "UPDATE " . $tn . " SET status ='2' WHERE id=" . $id . "";

        mysqli_query($this->linkRes, $this->sqlVar);

        if (!mysqli_query($this->linkRes, $this->sqlVar)) {

            echo $this->sqlVar;

            echo 'unsuccessfull';

            exit();

        }

    }



    public function activate($tn, $id, $status)
    {

        foreach ($id as $val) {

            $this->sqlVar = "UPDATE " . $tn . " SET " . $status . "='1' WHERE id=" . $val . "";

            mysql_query($this->sqlVar);

            if ($tn == "tbl_student") {

                $this->sqlVar = "UPDATE tbl_user SET userStatus='1' WHERE userFK=" . $val . " and userType=4";

                mysqli_query($this->linkRes, $this->sqlVar);

            }

            if ($tn == "tbl_staff") {

                $this->sqlVar = "UPDATE tbl_user SET userStatus='1' WHERE userFK=" . $val . " and userType=2";

                mysqli_query($this->linkRes, $this->sqlVar);

            }

        }

    }

    public function deActivate($tn, $id, $status)
    {

        foreach ($id as $val) {

            $this->sqlVar = "UPDATE " . $tn . " SET " . $status . " ='2' WHERE id=" . $val . "";

            //echo $this->sqlVar;

            mysqli_query($this->linkRes, $this->sqlVar);

            if ($tn == "tbl_student") {

                $this->sqlVar = "UPDATE tbl_user SET userStatus='2' WHERE userFK=" . $val . " and userType=4";

                mysqli_query($this->linkRes, $this->sqlVar);

            }

            if ($tn == "tbl_staff") {

                $this->sqlVar = "UPDATE tbl_user SET userStatus='2' WHERE userFK=" . $val . " and userType=2";

                mysqli_query($this->linkRes, $this->sqlVar);

            }

        }

    }

    public function delete($tn, $data, $status, $field)
    {



        $this->sqlVar = "UPDATE " . $tn . " SET " . $status . "='4' WHERE " . $field . "='" . $data . "'";

        $this->sqlVar;

        return mysqli_query($this->linkRes, $this->sqlVar) or die(mysqli_error());

    }



    public function updateData($data, $table, $pk, $pkfield)
    {



        $this->sqlVar = "UPDATE $table SET ";



        foreach ($data as $key => $value)

            $this->sqlVar .= $key . "=" . "'" . $value . "'" . ",";

        $this->sqlVar = $this->sqlVar . " modify_on=now() Where $pkfield='" . $pk . "';";

        // 	exit(0);

        return mysqli_query($this->linkRes, $this->sqlVar);


    }

    public function updateLoginDetail($data, $id, $type)
    {

        $this->sqlVar = "UPDATE tbl_user SET ";

        foreach ($data as $key => $value)

            $this->sqlVar .= $key . "=" . "'" . $value . "'" . ",";

        $this->sqlVar = $this->sqlVar . " ModifiedOn=now() Where userFK='" . $id . "' and userType='" . $type . "';";

        //echo $this->sqlVar;

        //exit(0);

        return mysqli_query($this->linkRes, $this->sqlVar);

    }



    public function getRowCount($table, $status)
    {

        $this->sqlVar = "SELECT count(*) as count from " . $table . " where " . $status . "!='-1'";

        //echo $this->sqlVar;

        $res = mysqli_query($this->linkRes, $this->sqlVar);

        $row = mysqli_fetch_assoc($res);

        return $row['count'];

    }

    public function getRowCount1($table)
    {

        $this->sqlVar = "SELECT count(*) as count from " . $table . " where status='1'";

        //echo $this->sqlVar;

        $res = mysqli_query($this->linkRes, $this->sqlVar);

        $row = mysqli_fetch_assoc($res);

        return $row['count'];

    }

    public function get_last_id()
    {
        return $GLOBALS['db']->insert_id;
    }



    public function changeStatus($tableName, $statusfield, $statusValue, $keys, $primary)
    {

        $this->sqlVar = "UPDATE " . $tableName . " SET " . $statusfield . " = '" . $statusValue . "' where ";

        foreach ($keys as $key) {
            $this->sqlVar .= "$primary='" . $key . "' or ";
        }

        $pos = strripos($this->sqlVar, 'or');
        $this->sqlVar = substr($this->sqlVar, 0, $pos);
        $res = mysqli_query($this->linkRes, $this->sqlVar);
        return $res;

    }

    public function GetDataByQuery($query)
    {
        $data = array();

        $res = mysqli_query($this->linkRes, $query);

        if ($res)
            ;

        $i = 0;

        while ($row = mysqli_fetch_assoc($res)) {

            $data[$i] = $row;

            $i++;

        }
        return $data;
    }

    public function GetCount($query)
    {
        $res = mysqli_query($this->linkRes, $query);
        $row = mysqli_fetch_assoc($res);
        if ($row['count'] > 0) {
            return $row['count'];
        } else {
            return 0;
        }

    }

    /**
     * Summary of checkEpin
     * @param string $epin
     * @return bool
     */

    public function checkEpin(string $epin): bool
    {
        if ($epin == '') {
            return false;
        }

        $query = "SELECT count(*) as count from ngo_epin where e_pin = '" . $epin . "' ";
        $res = mysqli_query($this->linkRes, $query);
        $row = mysqli_fetch_assoc($res);
        if ($row['count'] > 0) {
            return true;
        } else {
            return false;
        }

    }

}

?>