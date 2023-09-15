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
    $fetch = "SELECT * FROM education WHERE id= '$listid'";
    $updatefetch = mysqli_query($conn, $fetch);
} else {
    header("Location: education.php");
}


if (isset($_POST["updateTodo"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $desc = mysqli_real_escape_string($conn, $_POST["desc"]);
    $time = mysqli_real_escape_string($conn, $_POST["time"]);
    $org = mysqli_real_escape_string($conn, $_POST["org"]);

    // Updating todo
    $sql = "UPDATE education SET title='$title', time='$time',org = '$org',about_exp='{$desc}' WHERE id='{$listid}'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('location:education.php');
    }
}
// // Get User Id based on user email
// $sql = "SELECT id FROM users WHERE email='{$_SESSION["user_email"]}'";
// $res = mysqli_query($conn, $sql);
// $count = mysqli_num_rows($res);
// if ($count > 0) {
//     $row = mysqli_fetch_assoc($res);
//     $user_id = $row["id"];
// } else {
//     $user_id = 0;
// }
// $sql = "SELECT * FROM todos WHERE id='{$todoId}' AND user_id='{$user_id}'";
// $res = mysqli_query($conn, $sql);
// if (mysqli_num_rows($res) > 0) {
//     $todoData = mysqli_fetch_assoc($res);
// } else {
//     header("Location: todos.php");
// }

?>


<!doctype html>
<html lang="en">



<body class="bg-light">


    <div class="container py-5">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card bg-white rounded border shadow">
                    <div class="card-header px-4 py-3">
                        <h4 class="card-title">Edit Your Educational Qualifications:</h4>
                    </div>
                    <div class="card-body p-4">
                        <?php echo $msg; ?>
                        <?php
                        if ($updatefetch) {
                            while ($row =  mysqli_fetch_assoc($updatefetch)) {
                        ?>
                                <?php
                                $id = $row['id'];
                                $title = $row['title'];
                                $time = $row['time'];
                                $org = $row['org'];
                                $desc = $row['about_exp']; ?>

                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Degree:</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="enter your degree" value="<?php echo $row["title"] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="time" class="form-label">Duration:</label>
                                        <input type="text" class="form-control" id="time" name="time" placeholder="enter duration" value="<?php echo $row["time"] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="org" class="form-label">Organization:</label>
                                        <input type="text" class="form-control" id="org" name="org" placeholder="enter your oraganization" value="<?php echo $row["org"] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="desc" class="form-label">Description:</label>
                                        <textarea class="form-control" id="desc" name="desc" rows="3" required><?php echo $row["about_exp"] ?></textarea>
                                    </div>
                            <?php
                            }
                        }

                            ?>
                            <div>
                                <button type="submit" name="updateTodo" class="btn btn-primary me-2">Update</button>
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