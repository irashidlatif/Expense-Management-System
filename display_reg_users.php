<?php
include('./includes/header.php');
include('./includes/functions.php');
include('./includes/db_conn.php');
?>

<div class="container">

    <table class="table table-bordered table-striped table-hover mt-3">
        <thead class="table-dark">
            <tr>
                <th scope="col">Reg ID</th>
                <th scope="col">Name</th>
                <th scope="col">User Picture</th>
                <th scope="col">Operations</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $fetch_data = "SELECT * FROM reg_users";
            $result = mysqli_query($conn, $fetch_data);
            // echo mysqli_num_rows($result);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <th scope="row"><?php echo $row['reg_id']  ?></th>
                        <td><?php echo $row['user_name']  ?></td>
                        <td><a href="upload.php?image_id=<?php echo $row['reg_id'] ?>">
                                <?php
                                if ($row['image_name'] == NULL) {
                                ?> <img width="50px" src="./images/user_images/dummy.jpg" alt="User Image">
                                <?php
                                } else {
                                ?>
                                    <img width="50px" src="./images/user_images/<?php echo $row['image_name']  ?>" alt="User Image">
                                <?php
                                }




                                ?>


                            </a>
                        </td>
                        <td>
                            <a class="me-3" href="./update_pass.php?update_pass_id=<?php echo $row['reg_id'] ?>">Set New Password</a>
                            <a href="./delete.php?delete_id=<?php echo $row['reg_id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4">
                        <h3> No Record Found! </h3>
                    </td>
                </tr>
            <?php
            }






            ?>


        </tbody>
    </table>

</div>

















<?php
include('./includes/footer.php');
?>