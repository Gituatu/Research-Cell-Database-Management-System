<?php
    require 'mysqlcon.php';
?>

<?php include('includes/header.php'); ?>
  
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                        <h4>Search Published Papers
                            <a href="index.php" class="btn btn-warning float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search Paper Name">
                                        <button type="submit" class="btn btn-secondary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
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
                                if(isset($_GET['search']))
                                {
                                    $filtervalues= $_GET['search'];
                                    $query = "SELECT * FROM publication WHERE Paper LIKE '%$filtervalues%' ";
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
                                        ?>
                                            <tr>
                                                <td clospan= "5">No Record Found</td>
                                            </tr>
                                        <?php
                                    }
                                }
                                
                            ?>
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>