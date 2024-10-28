<?php
include('./includes/header.php');
include('./includes/functions.php');
include('./includes/db_conn.php');

check_user();

// fetching data from database of table (expense_info)

$edit_expense_id = NULL;
if (isset($_REQUEST['edit_expense_id'])) {
    $edit_expense_id = $_REQUEST['edit_expense_id'];
    $sql = "SELECT * FROM expense_info WHERE item_id= $edit_expense_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

// updating data to the same table 

if (isset($_REQUEST['update_item'])) {
    $updated_item_name = $_REQUEST['update_item_name'];
    $updated_item_price = $_REQUEST['update_item_price'];
    $updated_item_date = $_REQUEST['update_item_date'];
    $updated_item_details = $_REQUEST['update_item_details'];

    $db_sql = "UPDATE expense_info SET item_name= '$updated_item_name', item_price= '$updated_item_price', item_date= '$updated_item_date', item_details= '$updated_item_details' WHERE item_id = $edit_expense_id";

    if (mysqli_query($conn, $db_sql)) {
        my_alert('success', 'expense updated successfully!');
    } else {
        my_alert('danger', 'Error while updating expense!');
    }

    mysqli_close($conn);
}













?>


<div class="container py-3">
    <h2 class="text-center display-8 py-2 fw-semibold">Edit Expense</h2>
    <form method="POST">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="" class="form-label">Name</label>
                <input value="<?php echo $row['item_name'] ?>" name="update_item_name" type="text" class="form-control" placeholder="Item Name">
            </div>
            <div class="col-md-4 mb-3">
                <label for="" class="form-label">Price</label>
                <input value="<?php echo $row['item_price'] ?>" name="update_item_price" type="number" class="form-control" placeholder="Item Price">
            </div>
            <div class="col-md-4 mb-3">
                <label for="" class="form-label">Date</label>
                <input value="<?php echo $row['item_date'] ?>" name="update_item_date" type="date" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="" class="form-label">Details</label>
                <input value="<?php echo $row['item_details'] ?>" name="update_item_details" type="text" class="form-control" placeholder="Item Details">
            </div>
            <div class="col-md-12 mb-3">
                <button name="update_item" type="submit" class="btn btn-primary">Update Expense</button>
            </div>
        </div>
    </form>
</div>












<?php
include('./includes/footer.php');
?>