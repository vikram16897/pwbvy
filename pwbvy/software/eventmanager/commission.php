<?php
class CommissionDistributor
{
    private $db;

    // Commission rates
    private $commissionRates = [
        10 => 100,  // Panchayat
        9 => 50,    // Block
        8 => 25,    // District
        7 => 15,    // Area
        6 => 10,    // Regional
        5 => 5,     // Zonal
        4 => 3,     // Club
        3 => 2      // Board
    ];

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function distributeCommission($id, $transaction_for)
    {
        $userDetails = $this->getSponsorDetails($id);
        if ($userDetails) {
            $this->processCommission($userDetails, $transaction_for);
        }
    }

    private function getSponsorDetails($id)
    {
        $query = "SELECT * FROM ngo_user_detail WHERE id = '" . $id . "'";
        return $this->db->GetDataByQuery($query);
    }

    public function calculateCommission($rank)
    {
        $totalCommission = 0;

        foreach ($this->commissionRates as $key => $rate) {
            if ($key >= $rank) {
                $totalCommission += $rate;
            }
        }

        return $totalCommission;
    }
    private function processCommission($userDetails, $transaction_for)
    {
        $rank = $userDetails[0]['user_type'];
        $commissions = [];
        $condition = true;
        $count = 0;

        while ($condition) {
            if (isset($this->commissionRates[$rank])) {
                if ($count == 0) {
                    $commissions[] = [
                        'username' => $userDetails[0]['username'],
                        'transaction_amount' => $this->calculateCommission($rank),
                        'transaction_type' => 1,
                        'transaction_for' => $transaction_for
                    ];
                } else {
                    $commissions[] = [
                        'username' => $userDetails[0]['username'],
                        'transaction_amount' => $this->commissionRates[$userDetails[0]['user_type']],
                        'transaction_type' => 1,
                        'transaction_for' => $transaction_for,
                        ''
                    ];
                }
                $count++;
            }

            $sponsorDetails = $this->getSponsorDetails($userDetails[0]['sponsor_id']);

            if ($sponsorDetails[0]['user_type'] < 3) {
                $condition = false;
            }

            $userDetails = $sponsorDetails;
        }

        $this->insertCommissionRecords($commissions);
    }



    private function insertCommissionRecords($commissions)
    {
        foreach ($commissions as $commission) {
            $this->db->insertData($commission, "ngo_user_account");
        }
    }
}

?>