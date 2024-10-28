<?php
include('./includes/header.php');
include('./includes/functions.php');
include('./includes/db_conn.php');

if (isset($_REQUEST['del_expense_id'])) {
    $del_expense_id = $_REQUEST['del_expense_id'];
    $sql = "DELETE FROM expense_info WHERE item_id= $del_expense_id";

    if (mysqli_query($conn, $sql)) {
        header("Location:./all_expenses.php");
        echo "Record deleted successfully";
    } else {
        echo "Error while deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}



?>












<?php
include('./includes/footer.php');
?>