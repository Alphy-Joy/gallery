<?php

class User{

    public $id;
    public $username;
    public $first_name;
    public $last_name;

    //<<<========== static method to get all users from user table ==========>>>
    public static function get_all_users()
    {
        return self::get_this_query("SELECT * FROM users");
        // global $database;
        // $result = $database->query("SELECT * FROM users");
        // return $result;
    }

    //<<<========== static method to get user by id ==========>>>
    public static function get_user_by_id($user_id)
    {
        //global $database;
        //$result = $database->query("SELECT * FROM users WHERE id = $user_id");
        $result = self::get_this_query("SELECT * FROM users WHERE id = $user_id");
        $user = mysqli_fetch_array($result);
        return $user;
    }

    //<<<========== static method to get any queries ==========>>>
    public static function get_this_query($sql)
    {
        global $database;
        $result = $database->query($sql);
        return $result;
    }

    //<<<========== static method to instantiate user object and its properties ==========>>>
    public static function instantiate($user)
    {
        $user_obj = new self;
        $user_obj->id = $user['id'];
        $user_obj->first_name = $user['first_name'];
        $user_obj->last_name = $user['last_name'];
        return $user_obj;
    }
}



?>