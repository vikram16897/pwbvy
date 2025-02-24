<?php
class Sponsors
{
    private $db;

    // Commission rate

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getSponsorList($id)
    {
        $userDetails = $this->getUserDetailsByID($id);
        if ($userDetails) {
            $sponsors = $this->processSponsors($userDetails);
        }
        // echo "<pre>";
        // print_r($sponsors);
        // Convert the sponsors array into a comma-separated string
        return implode(',', $sponsors);
    }

    private function getUserDetailsByID(int $id)
    {
        $query = "SELECT * FROM ngo_user_detail WHERE id = '" . $id . "' ";
        return $this->db->GetDataByQuery($query);
    }

    private function getSponsorDetailsByID(int $id)
    {
        $query = "SELECT * FROM ngo_user_detail WHERE sponsor_id = '" . $id . "' ";
        return $this->db->GetDataByQuery($query);
    }


    private function processSponsors($userDetails): array
    {
        $sponsorIds = [];  // This will hold the unique sponsor IDs
        $condition = true;

        // Keep track of processed user IDs to avoid duplicates
        $processedUserIds = [];

        // Initialize the userDetails array with the first user
        $currentUserDetails = $userDetails;

        while ($condition) {
            // Initialize a temporary array to hold new user details
            $newUserDetails = [];

            // Process each user in the current userDetails
            foreach ($currentUserDetails as $userDetail) {
                // Check if we've already processed this user
                if (in_array($userDetail['id'], $processedUserIds)) {
                    continue; // Skip if this user has already been processed
                }

                // Add the user ID to the sponsorIds array if it's not already there
                $sponsorIds[] = $userDetail['id'];
                // Mark this user as processed
                $processedUserIds[] = $userDetail['id'];

                // Get all users with the same sponsor ID
                $sponsorDetails = $this->getSponsorDetailsByID($userDetail['id']);

                // Add the new users to the temporary array
                $newUserDetails = array_merge($newUserDetails, $sponsorDetails);
            }

            // If no new user details were found, break the loop
            if (empty($newUserDetails)) {
                break; // No more users to process
            }

            // Update the current user details to the newly found users for the next iteration
            $currentUserDetails = $newUserDetails;

            // Check if any user type in newUserDetails is less than 3
            foreach ($newUserDetails as $newUserDetail) {
                if ($newUserDetail['user_type'] < 3) {
                    $condition = false; // Stop processing if we find a user with user_type < 3
                    break; // Exit the foreach loop
                }
            }
        }

        // Return a unique array of sponsor IDs
        return array_unique($sponsorIds);
    }




}
