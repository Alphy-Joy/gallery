<?php

class User{

    //static method to get all users from user table
    public static function get_all_users()
    {
        global $database;
        $result = $database->query("SELECT * FROM users");
        return $result;
    }
}



?>