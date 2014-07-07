<?php

session_start();
/**
 * User
 */
class User extends Model {

	/**
	 * Insert User. Note that while normally the User class is used in object
	 * context, when creating new users we must use the class in static context
	 * since won't have the opportunity to create the new User without having
	 * a user_id to pass in. 
	 *
	 * Example:
	 * User::insert($values);
	 */
	public static function insert($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you


		// Prepare SQL Values
		$sql_values = [
			'first_name' => $input['first-name'],
			'last_name' => $input['last-name'],
			'user_name' => $input['username'],
			'email' => $input['email'],
			'password' => $input['password'],
			'dob' => $input['dob']
		];

		// Ensure values are encompased with quote marks
		$sql_values = db::array_in_quotes($sql_values);

		// Insert
		$results = db::insert('user', $sql_values);
		
		// Get Recent Insert ID
		$user_id = $results->insert_id;

		// Return a new instance of this user as an object
		return new User($user_id);

	}

	/**
	 * Update User. Note that this method is used in object context because
	 * we should already have a user object before we update:
	 *
	 * Example:
	 * $user = new User($_SESSION['user_id']);
	 * $user->update($values);
	 */
	public function update($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you


		// Prepare SQL Values
		$sql_values = [
			'first_name' => $input['first-name'],
			'last_name' => $input['last-name'],
			'user_name' => $input['username'],
			'email' => $input['email'],
			'zip'=> $input['zip'],
			'dob' => $input['dob']
		];

		// Ensure values are encompased with quote marks
		$sql_values = db::array_in_quotes($sql_values);

		// Insert
		$results = db::update('user', $sql_values, 'WHERE user_id =\'{$this->user_id}\'');
		
		// Return a new instance of this user as an object
		return new User($this->user_id);

	}

	public function resetPassword($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you


		// Prepare SQL Values
		$sql_values = [
			'password' => $input['password']
		];

		// Ensure values are encompased with quote marks
		$sql_values = db::array_in_quotes($sql_values);

		// Insert
		$results = db::update('user', $sql_values, 'WHERE user_id = \'{$this->user_id}\'');
		
		// Return a new instance of this user as an object
		return new User($this->user_id);
	}

	/**
	 * Who to follow list
	 */

    public static function getMiniProfiles($row) {

         $wtf_html = '<div class="mini-profile">
                        <img class="user-pic" src="images/blankprofilepic.jpg">
                        <div class="user-info">
                            <div class="name">{{first_name}} {{last_name}}</div>
                            <div class="user-name">@{{username}}</div> 
                        <button class="follow">Follow</button>
                        </div>
                    </div>';
                   
        $wtf_html = str_replace('{{first_name}}', $row['first_name'], $wtf_html);
        $wtf_html = str_replace('{{last_name}}', $row['last_name'], $wtf_html);
        $wtf_html = str_replace('{{username}}', $row['user_name'], $wtf_html);
        
        return $wtf_html;
    }


}