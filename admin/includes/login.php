<?php
    require_once('init.php');
    if($session->is_signed_in())
    {
        redirect("index.php");
    }
    if(isset($_POST['Submit']))
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if($user_found)
        {
            $session->login($user_found);
            redirect("index.php");
        }
        else
        {
            echo "Invalid credentials";
        }
    }
    else{
        $username = "";
        $password = "";
    }
?>