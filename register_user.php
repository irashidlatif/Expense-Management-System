<?php
include('./includes/header.php');
include('./includes/db_conn.php');
include('./includes/functions.php');

if (isset($_REQUEST['register'])) {
    $user_name = $_REQUEST['user_name'];
    $user_pass = $_REQUEST['user_pass'];
    $enc_pass = password_hash($user_pass, PASSWORD_BCRYPT);

    //inserting data into database
    $sql = "INSERT INTO reg_users (user_name , user_pass)
            VALUES ('$user_name', '$enc_pass')";

    if (mysqli_query($conn, $sql)) {
        echo my_alert('success', 'Record created successfully!');
    } else {
        echo my_alert('danger', 'Record cannot be created!');
    }

    mysqli_close($conn);
}



?>









<div class="container">
    <div class="card " id="my-card">
        <div class="card-header bg-primary text-white text-center">
            Register User
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
                            <button type="submit" name="register" class="btn btn-primary">
                                Register
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