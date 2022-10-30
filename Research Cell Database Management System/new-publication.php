<?php
session_start();
?>

<?php include('includes/header.php'); ?>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Publication
                            <a href="index.php" class="btn btn-warning float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Paper Name</label>
                                <input type="text" name="Paper" placeholder="Hyperspace: A Scientific Odyssey" class="form-control" maxlength="30" required>
                            </div>
                            <div class="mb-3">
                                <label>Author Name</label>
                                <input type="text" name="Author" placeholder="Michio Kaku" class="form-control" maxlength="20" required>
                            </div>
                            <div class="mb-3">
                                <label>Journal</label>
                                <input type="text" name="Journal" placeholder="journal details" class="form-control" maxlength="40" required>
                            </div>
                            <div class="mb-3">
                                <label>Date</label>
                                <input type="date" style="width: 200px; height: 25px;" name="Date" min="1900-01-01" max="2099-12-31" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <input type="paragraph_text" name="Description" placeholder="Brief description of research paper." class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_publication" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>