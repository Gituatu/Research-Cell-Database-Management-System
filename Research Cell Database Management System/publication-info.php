<?php
require 'mysqlcon.php';
?>

<?php include('includes/header.php'); ?>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Publication Info 
                            <a href="index.php" class="btn btn-warning float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $publication_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM publication WHERE ID='$publication_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $publication = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Paper Name</label>
                                        <p class="form-control">
                                            <?=$publication['Paper'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Author Name</label>
                                        <p class="form-control">
                                            <?=$publication['Author'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Journal</label>
                                        <p class="form-control">
                                            <?=$publication['Journal'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Date</label>
                                        <p class="form-control">
                                            <?=$publication['Date'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Description</label>
                                        <p class="form-control">
                                            <?=$publication['Description'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include('includes/footer.php'); ?>
