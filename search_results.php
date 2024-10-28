<?php
include('./includes/header.php');
include('./includes/functions.php');
include('./includes/db_conn.php');

$starting_date = NULL;
$ending_date = NULL;
if (isset($_REQUEST['search'])) {
    $starting_date = $_REQUEST['starting_date'];
    $ending_date = $_REQUEST['ending_date'];
}
?>

<div class="container">
    <h1 class="text-center">Search Results</h1>
    <table class="table table-bordered table-striped table-hover mt-3">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Date Added</th>
                <th scope="col">Details</th>
                <th scope="col">Operations</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $fetch_query = "SELECT * FROM expense_info
            WHERE item_date BETWEEN '$starting_date' AND '$ending_date'";
            $result = mysqli_query($conn, $fetch_query);
            $total_price = 0;
            $expense_counter = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $expense_counter; ?></td>
                        <td><?php echo $row['item_name']; ?></td>
                        <td><?php echo $row['item_price']; ?></td>
                        <td><?php customized_date($row['item_date']); ?></td>
                        <td><?php echo $row['item_details']; ?></td>
                        <td>
                            <a class="me-3" href="./edit_expense.php?edit_expense_id=<?php echo $row['item_id'] ?>">Edit</a>
                            <a href="./delete_expense.php?del_expense_id=<?php echo $row['item_id'] ?>">Delete</a>

                        </td>
                    </tr>
                <?php
                    $expense_counter++;
                    $total_price += $row['item_price'];
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">
                        <h3> No Record Found! </h3>
                    </td>
                </tr>
            <?php
            }






            ?>
        </tbody>
        <tfoot class="table-dark">
            <tr>
                <td colspan="2">Total:</td>
                <td><?php echo $total_price; ?></td>
                <td colspan="3"></td>

            </tr>
        </tfoot>
    </table>

</div>

















<?php
include('./includes/footer.php');
?>