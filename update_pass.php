<?php
include('./includes/header.php');
include('./includes/functions.php');
include('./includes/db_conn.php');

$update_pass_id = NULL;
if (isset($_REQUEST['update_pass_id'])) {
    $update_pass_id = $_REQUEST['update_pass_id'];
    $sql = "SELECT user_pass,user_name FROM reg_users WHERE reg_id= $update_pass_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_REQUEST['db_update_pass'])) {
    $updated_user_pass = $_REQUEST['updated_user_pass'];
    $enc_pass = password_hash($updated_user_pass, PASSWORD_BCRYPT);
    $db_sql = "UPDATE reg_users SET user_pass= '$enc_pass' WHERE reg_id = $update_pass_id";

    if (mysqli_query($conn, $db_sql)) {
        my_alert('success', 'Record updated successfully!');
    } else {
        my_alert('danger', 'Error while updating record!');
    }

    mysqli_close($conn);
}










?>

<div class="container">
    <div class="card" id="my-card">
        <div class="card-header bg-primary text-white text-center">
            Set New Password!
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label ">User Name</label>
                            <input value="<?php echo $row['user_name']    ?>" type="text" name="user_name" id="" class="form-control" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label ">User Password</label>
                            <input type="text" name="updated_user_pass" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="db_update_pass" class="btn btn-primary">
                                Update Password
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