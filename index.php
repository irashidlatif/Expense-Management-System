<?php
include('./includes/header.php');
include('./includes/db_conn.php');
include('./includes/functions.php');
check_user();
?>

<div class="container py-3">
    <h2 class="text-center display-5 fw-bold py-5">Expense Managment System</h2>
    <div class="row px-3 ">
        <!-- <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">New Orders</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                3,243
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>12.5% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-xl-6 col-lg-6">
            <a href="./display_reg_users.php">
                <div class="card l-bg-blue-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">All Users</h5>
                        </div>

                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <?php
                                    $sql_query = "SELECT user_name FROM reg_users";
                                    $result_query = mysqli_query($conn, $sql_query);
                                    echo mysqli_num_rows($result_query);
                                    ?>
                                </h2>
                            </div>
                            <!-- <div class="col-4 text-right">
                            <span>9.23% <i class="fa fa-arrow-up"></i></span>
                        </div> -->
                        </div>

                    </div>
                </div>
            </a>
        </div>
        <!-- <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Ticket Resolved</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                578
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>10% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-xl-6 col-lg-6">
            <a href="./all_expenses.php">
                <div class="card l-bg-orange-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">All Expenses</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                  <?php
                                    $fetch_query = "SELECT * FROM expense_info";
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