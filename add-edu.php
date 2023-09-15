<?php
ob_start();
include "includes/config.php";
require_once "conn.php";
include "includes/header.php";

if (!isset($_SESSION['user'])) {
    header('location:login.php');
}

$msg = "";

if (isset($_POST["addTodo"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $desc = mysqli_real_escape_string($conn, $_POST["desc"]);
    $time = mysqli_real_escape_string($conn, $_POST["time"]);
    $org = mysqli_real_escape_string($conn, $_POST["org"]);

    // Get User Id based on user email

    // Inserting todo
    $sql = "INSERT INTO education (uuid,title,time,org,about_exp) VALUES ('$uuid','$title', '$time', '$org','$desc')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('location:education.php');
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
                        <?php echo $msg; ?>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="title" class="form-label">Qualification:</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="enter your degree" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Duration:</label>
                                <input type="datetime" class="form-control" id="time" name="time" placeholder="enter duration" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="org" class="form-label">Organization:</label>
                                <input type="text" class="form-control" id="org" name="org" placeholder="enter your organization" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Description:</label>
                                <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="about your organization" required></textarea>
                            </div>
                            <div>
                                <button type="submit" name="addTodo" class="btn btn-primary me-2">Submit

                                </button>
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