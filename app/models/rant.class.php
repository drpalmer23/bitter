<?php

session_start();
/**
 * Rant
 */
class Rant extends Model {


    public static function insertOriginal($input) {

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



       // Prepare SQL Values
        $sql_values = [
            'parent_rant_id' =>$rant_id
        ];

        // Ensure values are encompased with quote marks
        $sql_values = db::array_in_quotes($sql_values);

        // Insert
        $results = db::update('rant', $sql_values, "WHERE rant_id = $rant_id");
        

        // Return a new instance of this user as an object
        return new Rant($rant_id);

    }

    public static function insertReply($input) {

        // Note that Server Side validation is not being done here
        // and should be implemented by you


        // Prepare SQL Values
        $sql_values = [
            'user_id' =>$_SESSION['user_id'],
            'comment' => $input['new-post'],
            'parent_rant_id' => $input['parent_rant_id']
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


        $rant_html ='<div class="rant {{reply_rant}}">
                    <div class="rant-container">
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
                                <span class="comment">
                                    <span class="icon"><i class="fa fa-comments"></i></span>
                                    <span class="icon-name">Show Comments</span>
                                </span>
                                <span class="reply">
                                    <span class="icon"><i class="fa fa-reply"></i></span>
                                    <span class="icon-name">Reply</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class=write-reply>
                        <form action="post.php" method="POST">
                            <input type="hidden" name="parent_rant_id" value="{{parent_rant_id}}">
                            <textarea name="new-post" placeholder="Write reply here..." required></textarea>
                            <button>POST</button>
                        </form>
                    </div>
                </div>';

        if ($row['rant_id'] == $row['parent_rant_id']) {
            $replyRant = "";
        } else {
            $replyRant = 'reply-rant';
        }

        $numComments = count($row['parent_rant-id']);

        $rant_html = str_replace('{{parent_rant_id}}', $row['parent_rant_id'], $rant_html);
        $rant_html = str_replace('{{reply_rant}}', $replyRant, $rant_html);
        $rant_html = str_replace('{{first_name}}', $row['first_name'], $rant_html);
        $rant_html = str_replace('{{last_name}}', $row['last_name'], $rant_html);
        $rant_html = str_replace('{{username}}', $row['user_name'], $rant_html);
        $rant_html = str_replace('{{age}}', $rantAge, $rant_html);
        $rant_html = str_replace('{{comment}}', $row['comment'], $rant_html);
        return $rant_html;
    }

}