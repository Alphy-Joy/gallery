<?php

class User{

    public $id;
    public $username;
    public $password;
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
        global $database;
        //$result = $database->query("SELECT * FROM users WHERE id = $user_id");
        $result_array = self::get_this_query("SELECT * FROM users WHERE id = $user_id");
        //$user = mysqli_fetch_array($result);
        // if(!empty($result_array))
        // {
        //     $the_first_item = array_shift($result_array);
        //     return $the_first_item;
        // }
        // else
        // {
        //     return false;
        // }
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    //<<<========== static method to get any queries ==========>>>
    public static function get_this_query($sql)
    {
        global $database;
        $result = $database->query($sql);
        $this_obj_array=array();
        while($row = mysqli_fetch_array($result))
        {
            $this_obj_array[] = self::instantiate($row);
        }
        return $this_obj_array;
    }

    //<<<========== static method to instantiate user object and its properties ==========>>>
    public static function instantiate($user)
    {
        $user_obj = new self;
        // $user_obj->id = $user['id'];
        // $user_obj->username = $user['username'];
        // $user_obj->password = $user['password'];
        // $user_obj->first_name = $user['first_name'];
        // $user_obj->last_name = $user['last_name'];
        foreach($user as $the_attribute => $value)
        {
            if($user_obj->has_the_attribute($the_attribute))
            {
                $user_obj->$the_attribute = $value;
            }
        }
        return $user_obj;
    }

    //<<<========== to check if the object has the required attributes ==========>>>
    private function has_the_attribute($the_attribute)
    {
        //get_object_vars() is a php pre-built function to get all the properties of a object as an array.
        $the_obj_attributes = get_object_vars($this);
        //array_key_exists() is a php pre-built function to check if particular key exixts in an array. Returns a boolean value
        return array_key_exists($the_attribute,$the_obj_attributes);
    }
}



?>