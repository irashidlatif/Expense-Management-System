<?php
include('./includes/header.php');
include('./includes/functions.php');
check_user();

if (isset($_REQUEST['add_item'])) {

    include('./includes/db_conn.php');

    // Getting values from input form
    $item_name = $_REQUEST['item_name'];
    $item_price = $_REQUEST['item_price'];
    $item_date = $_REQUEST['item_date'];
    $item_details = $_REQUEST['item_details'];


    //inserting data into database
    $sql = "INSERT INTO expense_info (item_name , item_price , item_date , item_details)
            VALUES ('$item_name', '$item_price' , '$item_date' , '$item_details')";

    if (mysqli_query($conn, $sql)) {
        echo my_alert('success', 'Record created successfully!');
    } else {
        echo my_alert('danger', 'Record cannot be created!');
    }

    mysqli_close($conn);
}






?>


<div class="container py-3">
    <h2 class="text-center display-8 py-2 fw-semibold">Add Expense</h2>
    <form method="POST">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="" class="form-label">Name</label>
                <input name="item_name" type="text" class="form-control" placeholder="Item Name">
            </div>
            <div class="col-md-4 mb-3">
                <label for="" class="form-label">Price</label>
                <input name="item_price" type="number" class="form-control" placeholder="Item Price">
            </div>
            <div class="col-md-4 mb-3">
                <label for="" class="form-label">Date</label>
                <input value="<?php echo date("Y-m-d"); ?>" name="item_date" type="date" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label for="" class="form-label">Details</label>
                <input name="item_details" type="text" class="form-control" placeholder="Item Details">
            </div>
            <div class="col-md-12 mb-3">
                <button name="add_item" type="submit" class="btn btn-primary">Add Expense</button>
            </div>
        </div>
    </form>
</div>












<?php
include('./includes/footer.php');
?>