<?php
include('./includes/header.php');
include('./includes/functions.php');
include('./includes/db_conn.php');

if (isset($_REQUEST['delete_id'])) {
    $delete_id = $_REQUEST['delete_id'];
    $sql = "DELETE FROM reg_users WHERE reg_id= $delete_id ";

    if (mysqli_query($conn, $sql)) {
        header("Location:./display_reg_users.php");
        echo "Record deleted successfully";
    } else {
        // header("Location:./display_reg_users.php");
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}



?>












<?php
include('./includes/footer.php');
?>