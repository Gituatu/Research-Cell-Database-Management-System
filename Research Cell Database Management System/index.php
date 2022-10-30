<?php
    session_start();
    require 'mysqlcon.php';
?>

<?php include('includes/header.php'); ?>

    <div class="container-fluid mt-2">
        <a href="search.php" class="btn btn-secondary">Search</a>
        <a href="login.php" class="btn btn-danger d-inline">Logout</a>
    </div>
  
    <div class="container-fluid mt-2">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Publication Details
                            <a href="new-publication.php" class="btn btn-dark float-end">Add Publication</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Paper</th>
                                    <th>Author</th>
                                    <th>Journal</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM publication";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $publication)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $publication['ID']; ?></td>
                                                <td><?= $publication['Paper']; ?></td>
                                                <td><?= $publication['Author']; ?></td>
                                                <td><?= $publication['Journal']; ?></td>
                                                <td><?= $publication['Date']; ?></td>
                                                <td>
                                                    <a href="publication-info.php?id=<?= $publication['ID']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="publication-edit.php?id=<?= $publication['ID']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_publication" value="<?=$publication['ID'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
