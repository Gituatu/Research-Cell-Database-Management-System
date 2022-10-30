<?php
session_start();
require 'mysqlcon.php';
?>

<?php include('includes/header.php'); ?>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Publication Editor 
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
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="publication_id" value="<?= $publication['ID']; ?>">

                                    <div class="mb-3">
                                        <label>Paper Name</label>
                                        <input type="text" name="Paper" value="<?=$publication['Paper'];?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Author Name</label>
                                        <input type="text" name="Author" value="<?=$publication['Author'];?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Journal</label>
                                        <input type="text" name="Journal" value="<?=$publication['Journal'];?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Date</label>
                                        <input type="date" name="Date" value="<?=$publication['Date'];?>" style="width: 200px; height: 25px;" name="Date" min="1900-01-01" max="2099-12-31" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Description</label>
                                        <input type="text" name="Description" value="<?=$publication['Description'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_publication" class="btn btn-primary">
                                            Update Data
                                        </button>
                                    </div>

                                </form>
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
