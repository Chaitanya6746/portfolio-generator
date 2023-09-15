<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
require_once('conn.php');
$uuid = $_SESSION['id'];
$select = "SELECT * FROM user_form WHERE uuid='$uuid'";
$selecthome = "SELECT * FROM home WHERE uuid='$uuid'";
$selectabt = "SELECT * FROM about WHERE uuid='$uuid'";
$result = mysqli_query($conn, $select);
$fet = mysqli_query($conn, $selecthome);
$abt = mysqli_query($conn, $selectabt);

?>
<?php
if (isset($_POST["submit"])) {
    $fname = $_POST['fname'];
    $stitle = $_POST['stitle'];
    if (mysqli_num_rows($fet) > 0) {
        $update = "UPDATE home
  SET title = '$fname', subtitle = '$stitle' 
  WHERE uuid = '$uuid'";
        $res = mysqli_query($conn, $update);
        if ($res) {
            header('location:index.php');
        }
    } else {
        $inserttohome = "INSERT INTO home(uuid,title,subtitle) VALUES('$uuid','$fname','$stitle')";
        $ins = mysqli_query($conn, $inserttohome);
        if ($ins) {
            header('location:index.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <style>
        .site button {
            font-weight: bold;
            font-size: 15px;
            text-transform: uppercase;
            display: none;
        }

        nav:hover .site button {
            display: block;
        }

        nav:hover .site .arrow {
            display: none;
        }
    </style>
</head>

<body>
    <div class="imp-container">
        <nav>
            <ul>
                <li>
                    <?php
                    if (mysqli_num_rows($abt) > 0) {
                        // LOOP TILL END OF DATA
                        while ($row = mysqli_fetch_array($abt)) {
                    ?>
                            <a href="#" class="logo">
                                <img src="imagesuploadedf/<?php echo $row['profile_pic']; ?>" />
                            <?php
                        }
                    } else {
                            ?>
                            <a href="#" class="logo">
                                <img src="" />
                            <?php
                        }
                            ?>

                            <span class="nav-items">HI,<?php echo $_SESSION['user'] ?></span>
                            </a>
                </li>
                <li>
                    <?php
                    if (mysqli_num_rows($fet) > 0) {
                        // // LOOP TILL END OF DATA
                        // while ($row = mysqli_fetch_array($fet)) {
                        //     ?>
                        <a href="./MyResume/index.php" target="__blank" class="site">
                        <button class="btn">Visit Site
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z" />
                            </svg></button>
                        <svg style="margin-left: 20px;" class="arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right arrow" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z" />
                        </svg>
                        </a>
                        <?php
                        }
                    ?>
                </li>
                <li>
                    <a href="index.php">
                        <i class="fas fa-home" aria-hidden="true"></i>
                        <span class="nav-items">Home</span>
                    </a>
                </li>
                <li>
                    <a href="about.php">
                        <i class="fas fa-info-circle" aria-hidden="true"></i>
                        <span class="nav-items">About</span>
                    </a>
                </li>
                <li>
                    <a href="interests.php">
                        <i class="fas fa-solid fa-pen"></i>
                        <span class="nav-items">Interests</span>
                    </a>
                </li>
                <li>
                    <a href="Personal_info.php">
                        <i class="fas fa-info" aria-hidden="true"></i>
                        <span class="nav-items">Personal info</span>
                    </a>
                </li>
                <li>
                    <a href="project.php">
                        <i class="fas fa-tasks"></i>
                        <span class="nav-items">Project</span>
                    </a>
                </li>
                <li>
                    <a href="education.php">
                        <i class="fas fa-graduation-cap"></i>
                        <span class="nav-items">Education</span>
                    </a>
                </li>
                <li>
                    <a href="skills.php">
                        <i class="fas fa-cog"></i>
                        <span class="nav-items">Skills</span>
                    </a>
                </li>
                <li>
                    <a href="socialmedia.php">
                        <i class="fas fa-cog"></i>
                        <span class="nav-items">Social media</span>
                    </a>
                </li>
                <li>
                    <a href="contact.php">
                        <i class="fas fa-solid fa-address-card"></i>
                        <span class="nav-items">Contact</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-items">Log out</span>
                    </a>
                </li>
            </ul>
        </nav>