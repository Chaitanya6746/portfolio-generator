<?php
ob_start();
include "includes/config.php";
require_once "conn.php";
include "includes/header.php";

if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
if (isset($_GET["id"])) {
    $listid = mysqli_real_escape_string($conn, $_GET["id"]);
    $fetch = "SELECT * FROM project WHERE id= '$listid'";
    $updatefetch = mysqli_query($conn, $fetch);
} else {
    header("Location: project.php");
}

if (isset($_POST["uploadfilesub"])) {
    $type = $_POST['type'];
    $project_title = $_POST['project_title'];
    $project_desc = $_POST['project_desc'];
    $project_url = $_POST['project_url'];
    $filename = $_FILES['uploadfile']['name'];
    $filetmpname = $_FILES['uploadfile']['tmp_name'];
    //folder where images will be uploaded
    $folder = 'imagesuploadedf/';
    //function for saving the uploaded images in a specific folder
    move_uploaded_file($filetmpname, $folder . $filename);

    // Get User Id based on user email

    // Inserting todo
    $sql = "UPDATE project SET type = '$type',project_title = '$project_title',project_desc = '$project_desc',project_url = '$project_url',image = '$filename' WHERE id='{$listid}'";
    $qry = mysqli_query($conn, $sql);
    if ($qry) {

        header('location:project.php');
    }
}
?>


<!doctype html>
<html lang="en">



<body class="bg-light">


    <div class="container py-5">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card bg-white rounded border shadow">
                    <div class="card-header px-4 py-3">
                        <h4 class="card-title">Enter Your Educational Qualification:</h4>
                    </div>
                    <div class="card-body p-4">

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="fname">Type:</label>
                                <input type="text" id="fname" placeholder="" value="" class="form-control" name="type" />
                            </div>
                            <div class="mb-3">
                                <label for="fname">Project Title:</label>
                                <input type="text" id="stitle" value="" placeholder="" class="form-control" name="project_title" />
                            </div>
                            <div class="mb-3">
                                <label for="abt_desc">Project Description:</label>
                                <textarea name="project_desc" id="abt_desc" placeholder="describe your project" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="fname">Project URL:</label>
                                <input type="text" id="stitle" value="" placeholder="" class="form-control" name="project_url" />
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image Of the Project</label>
                                <input class="form-control" type="file" id="formFile" name="uploadfile" required>
                            </div>
                            <div>
                                <button type="submit" name="uploadfilesub" class="btn btn-primary me-2">Update</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>