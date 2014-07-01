<?php

/**
 * Rant
 */
class Rant extends Model {


    public static function insert($input) {

        // Note that Server Side validation is not being done here
        // and should be implemented by you


        // Prepare SQL Values
        $sql_values = [
            'comment' => $input['new-post'],
        ];

        // Ensure values are encompased with quote marks
        $sql_values = db::array_in_quotes($sql_values);

        // Insert
        $results = db::insert('rant', $sql_values);
        
        // Get Recent Insert ID
        $rant_id = $results->insert_id;

        // Return a new instance of this user as an object
        return new Rant($rant_id);

    }

    /**
     * Update User. Note that this method is used in object context because
     * we should already have a user object before we update:
     *
     * Example:
     * $user = new User(1);
     * $user->update($values);
     */
    // public function update($input) {

    //     // Note that Server Side validation is not being done here
    //     // and should be implemented by you


    //     // Prepare SQL Values
    //     $sql_values = [
    //         'first_name' => $input['first-name'],
    //         'last_name' => $input['last-name'],
    //         'user_name' => $input['username'],
    //         'email' => $input['email'],
    //         'password' => $input['password'],
    //         'dob' => $input['dob']
    //     ];

    //     // Ensure values are encompased with quote marks
    //     $sql_values = db::array_in_quotes($sql_values);

    //     // Insert
    //     $results = db::insert('rant', $sql_values, "WHERE user_id = {$this->user_id}");
        
    //     // Return a new instance of this user as an object
    //     return new User($this->user_id);

    // }

}