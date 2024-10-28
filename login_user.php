<?php
include('./includes/header.php');
include('./includes/db_conn.php');
include('./includes/functions.php');

if (isset($_REQUEST['login'])) {
    $user_name = $_REQUEST['user_name'];
    $user_pass = $_REQUEST['user_pass'];


    $login_query = "SELECT * FROM reg_users WHERE user_name='$user_name'";
    $result_login_query = mysqli_query($conn, $login_query);
    $row = mysqli_fetch_assoc($result_login_query);
    $db_user_name =  $row['user_name'];
    $db_user_pass =  $row['user_pass'];
    $db_image_name =  $row['image_name'];


    if (password_verify($user_pass, $row['user_pass'])) {
        $_SESSION['name'] = $db_user_name;
        $_SESSION['picture'] = $db_image_name;
        $_SESSION['is_login'] = true;



        my_alert('success', 'Login Successfull!');
        header('Location: index.php');
    } else {
        my_alert('danger', 'login Failed!');
    }
}



?>









<div class="container">
    <div class="card " id="my-card">
        <div class="card-header bg-primary text-white text-center">
            Login User
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label ">User Name</label>
                            <input type="text" name="user_name" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label ">User Password</label>
                            <input type="password" name="user_pass" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="login" class="btn btn-primary">
                                Login
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>










<?php
include('./includes/footer.php');
?>