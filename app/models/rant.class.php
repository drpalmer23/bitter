<?php

session_start();
/**
 * Rant
 */
class Rant extends Model {


    public static function insert($input) {

        // Note that Server Side validation is not being done here
        // and should be implemented by you


        // Prepare SQL Values
        $sql_values = [
            'user_id' =>$_SESSION['user_id'],
            'comment' => $input['new-post']
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

    public static function getCommentAge($row) {
        $t = time();
        $commentDate = $row['created_time'];
        $age = ($commentDate < 0) ? ( $t + ($commentDate * -1) ) : $t - $commentDate;
        $rantAge = floor($age/31536000);
        return $rantAge;
    }

    public static function getRant($row) {


        $rant_html = '<div class="rant">
                    <img class="user-pic" src="images/blankprofilepic.jpg">
                    <div class="content">
                        <span class="full-name">
                            <span class="first-name">{{first_name}}</span> 
                            <span class="last-name">{{last_name}}</span>
                        </span>
                        <span class="user-name">@{{username}}</span>
                        <span class="rant-age">{{age}}</span>
                        <p class="comment">
                            {{comment}}
                        </p>
                        <div class="footer">
                            <a href="#" class="reply">
                                <span class="icon"><i class="fa fa-reply"></i></span>
                                <span class="icon-name">Reply</span>
                            </a>
                        </div>
                    </div>
                </div>';

        $rant_html = str_replace('{{first_name}}', $row['first_name'], $rant_html);
        $rant_html = str_replace('{{last_name}}', $row['last_name'], $rant_html);
        $rant_html = str_replace('{{username}}', $row['user_name'], $rant_html);
        $rant_html = str_replace('{{age}}', $rantAge, $rant_html);
        $rant_html = str_replace('{{comment}}', $row['comment'], $rant_html);
        return $rant_html;
    }

}