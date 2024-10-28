<?php
include('./includes/header.php');
include('./includes/functions.php');
include('./includes/db_conn.php');





?>







<div class="container">
    <div class="card " id="my-card">
        <div class="card-header bg-primary text-white text-center">
            Search Expenses BY Date
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form action="./search_results.php" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label ">Starting Date</label>
                            <input type="date" name="starting_date" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label ">Ending Date</label>
                            <input type="date" name="ending_date" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="search" class="btn btn-primary">
                                Search
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