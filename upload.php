<?php
include('./includes/header.php');
include('./includes/functions.php');
include('./includes/db_conn.php');
$image_id = NULL;


if (isset($_REQUEST['image_id'])) {
    $image_id = $_REQUEST['image_id'];
}

if (isset($_REQUEST['submit'])) {
    $image = $_FILES['user_image'];
    $name = $image['name'];
    $image_ext = explode('.', $name);
    $tmp_name = $image['tmp_name'];
    $unique_name = round(microtime(true)) . "." . end($image_ext);
    $image_dest = "./images/user_images/" . $unique_name;
    $upload_result = move_uploaded_file($tmp_name, $image_dest);
    if ($upload_result) {
        $upload_query = "UPDATE reg_users SET image_name = '$unique_name' WHERE reg_id=$image_id";
        $upload_query_result = mysqli_query($conn, $upload_query);
        if ($upload_query_result) {
            echo "Image name uploaded in the Database successfully!";
        } else {
            echo "Error while uploading image name in Database!";
        }
    } else {
        echo "Error while uploading the image";
    }
}






?>


<div class="container">
    <div class="row py-5">
        <h1 class="text-center py-3">Upload Image</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3 mx-auto">
                <input type="file" name="user_image" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3 mx-auto">
                <button type="submit" class="btn btn-primary " name="submit">Upload</button>
            </div>



        </form>
    </div>
</div>



<?php
include('./includes/footer.php');
?>