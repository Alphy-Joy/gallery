
<div class="container-fluid">
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Blank Page
            <small>Subheading</small>
        </h1>
        <?php
            //calling static functiom from User class
            //$result_set = User::get_all_users();
            // while($row =  mysqli_fetch_array($result_set))
            //     {
            //         echo $row['first_name'];
            //     }
             $user = User::get_user_by_id(3);
            // $user = User::instantiate($uname);
             echo $user->first_name;

            // $users = User::get_all_users();
            // foreach($users as $user)
            // {
            //     echo $user->username."<br>";
            // }
        ?>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
