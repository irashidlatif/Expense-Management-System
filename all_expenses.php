<?php
include('./includes/header.php');
include('./includes/db_conn.php');
include('./includes/functions.php');
check_user();
?>

<div class="container py-3">
    <h2 class="text-center display-5 fw-bold py-5">Date Wise Expenses</h2>
    <div class="row px-3 ">
        <div class="col-xl-6 col-lg-6">
            <a href="./today_expenses.php">
                <div class="card l-bg-orange-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Today Expenses</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <?php
                                    $today_date = date("Y-m-d");
                                    $fetch_query = "SELECT * FROM expense_info WHERE item_date='$today_date' ORDER BY item_date DESC ";
                                    $result = mysqli_query($conn, $fetch_query);
                                    echo mysqli_num_rows($result)
                                    ?>

                                </h2>
                            </div>

                        </div>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6">
            <a href="./yesterday_expenses.php">
                <div class="card l-bg-cyan">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Yesterday Expenses</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <?php
                                    $yesterday_date = date("Y-m-d", strtotime("-1 days"));
                                    $fetch_query = "SELECT * FROM expense_info WHERE item_date='$yesterday_date' ORDER BY item_date DESC ";
                                    $result = mysqli_query($conn, $fetch_query);
                                    echo mysqli_num_rows($result);
                                    ?>

                                </h2>
                            </div>

                        </div>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6">
            <a href="./week_expenses.php">
                <div class="card l-bg-green">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Last Week Expenses</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <?php
                                    $today_date = date("Y-m-d");
                                    $week_date = date("Y-m-d", strtotime($today_date . "-1 week"));
                                    $fetch_query = "SELECT * FROM expense_info WHERE item_date BETWEEN '$week_date' AND '$today_date' ORDER BY item_date DESC ";
                                    $result = mysqli_query($conn, $fetch_query);
                                    echo mysqli_num_rows($result);
                                    ?>

                                </h2>
                            </div>

                        </div>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6">
            <a href="./month_expenses.php">
                <div class="card l-bg-cherry">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Last Month Expenses</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <?php
                                    $today_date = date("Y-m-d");
                                    $month_date = date("Y-m-d", strtotime($today_date . "-1 month"));
                                    $fetch_query = "SELECT * FROM expense_info WHERE item_date BETWEEN '$month_date' AND '$today_date' ORDER BY item_date DESC ";
                                    $result = mysqli_query($conn, $fetch_query);
                                    echo mysqli_num_rows($result);                        
                                    ?>

                                </h2>
                            </div>

                        </div>

                    </div>
                </div>
            </a>
        </div>


    </div>
</div>










<?php
include('./includes/footer.php');
?>