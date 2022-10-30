<?php
session_start();
require 'mysqlcon.php';

if(isset($_POST['delete_publication']))
{
    $publication_id = mysqli_real_escape_string($con, $_POST['delete_publication']);

    $query = "DELETE FROM publication WHERE ID='$publication_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Publication Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Publication Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_publication']))
{
    $publication_id = mysqli_real_escape_string($con, $_POST['publication_id']);

    $paper = mysqli_real_escape_string($con, $_POST['Paper']);
    $author = mysqli_real_escape_string($con, $_POST['Author']);
    $journal = mysqli_real_escape_string($con, $_POST['Journal']);
    $date = mysqli_real_escape_string($con, $_POST['Date']);
    $description = mysqli_real_escape_string($con, $_POST['Description']);

    $query = "UPDATE publication SET Paper='$paper', Author='$author', Journal='$journal', Date='$date', Description='$description' WHERE ID='$publication_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Publication Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Publication Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_publication']))
{
    $Paper = mysqli_real_escape_string($con, $_POST['Paper']);
    $Author = mysqli_real_escape_string($con, $_POST['Author']);
    $Journal = mysqli_real_escape_string($con, $_POST['Journal']);
    $Date = mysqli_real_escape_string($con, $_POST['Date']);
    $Description = mysqli_real_escape_string($con, $_POST['Description']);

    $query = "INSERT INTO publication (Paper,Author,Journal,Date,Description) VALUES ('$Paper','$Author','$Journal','$Date','$Description')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Publication Created Successfully";
        header("Location: new-publication.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Publication Not Created";
        header("Location: new-publication.php");
        exit(0);
    }
}

?>
