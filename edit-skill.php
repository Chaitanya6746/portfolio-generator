<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Dynamic Portfolio Generator</title>
</head>

<body>
    <h1 class="text-center py-4 my-4">Update Your Skills</h1>

    <?php
    ob_start();
    include 'database.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM skills WHERE id=" . $id;

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $skill_name = $row['skill_name'];
        $skill_level = $row['skill_level'];
    }
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $skill_name = $_POST['skill_name'];
        $skill_level = $_POST['skill_level'];

        include 'conn.php';

        $sql = "UPDATE skills SET skill_name='$skill_name' ,skill_level='$skill_level' WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location: ./skills.php");
        }
    }


    ?>
    <div class="w-50 m-auto">
        <form action="" method="post" autocomplete="off">
            <div class="form-group">
                <label for="skillname">Name of The Skill:</label>
                <input class="form-control" type="text" value="<?php echo $skill_name ?>" name="skill_name" id="skillname" placeholder="Enter Your skill" Required><br><br>
                <label for="title">Level of Skill You Know:(Eg:90,40): </label>
                <input class="form-control" type="text" value="<?php echo $skill_level ?>" name="skill_level" id="title" placeholder="Enter Your skill level" Required>
                <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
            </div><br>
            <button class="btn btn-success" name="update">Update</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>