<?php
require_once 'conn.php';
ob_start();
// $id = $_SESSION['id'];
// $select = "SELECT * FROM user_form WHERE id='$id'";
// $select1 = "SELECT * FROM about WHERE id='$id'";
// $result = mysqli_query($conn, $select);
// $fet = mysqli_query($conn, $select1)

include("includes/header.php");
$selectpersonalinfo = "SELECT * FROM personal_info WHERE uuid='$uuid'";
$dtpinfo = mysqli_query($conn, $selectpersonalinfo);
if (isset($_POST['updatepinfo'])) {
    $mail = $_POST['mail'];
    $bday = $_POST['bday'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $dgree = $_POST['dgree'];
    $site = $_POST['site'];

    if (mysqli_num_rows($dtpinfo) > 0) {
        $pinfoupdate = "UPDATE personal_info
        SET email = '$mail', birthday = '$bday' ,phone = '$phone',age = '$age',degree = '$dgree',city = '$city'
        WHERE UUid = '$uuid'";
        $pinfoquery = mysqli_query($conn, $pinfoupdate);
        if ($pinfoquery) {
            header('location:personal_info.php');
        }
    } else {
        $insertintopinfo = "INSERT INTO `personal_info` (uuid,email,birthday,`phone`,city,age,degree,website)  VALUES ('$uuid','$mail','$bday','$phone','$city','$age','$dgree','$site')";
        $pinfoinsertqry = mysqli_query($conn, $insertintopinfo);
        if ($pinfoinsertqry) {

            header('location:personal_info.php');
        }
    }
}

?>


<section class="main">
    <div class="main-top">
        <h1>Your Personal Information</h1>
    </div>
    <div>
        <?php
        if (mysqli_num_rows($dtpinfo) > 0) {

            // LOOP TILL END OF DATA
            while ($row = $dtpinfo->fetch_assoc()) {
        ?>
                <form action="" method="POST">
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="email">Email_ID:</label>
                        <input type="email" id="email" placeholder="Enter your email address" value="<?php echo $row['email']; ?>" class="form-control" name="mail" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="bday">Birthday:</label>
                        <input type="text" id="bday" value="<?php echo $row['birthday']; ?>" class="form-control" name="bday" placeholder="Eg:YYYY-MM-DD" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="phone">Phone:</label>
                        <input type="number" id="phone" placeholder="Enter your mobile number" value="<?php echo $row['phone']; ?>" class="form-control" name="phone" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="city">City:</label>
                        <input type="text" id="city" placeholder="Enter your city" value="<?php echo $row['city']; ?>" class="form-control" name="city" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="age">Age:</label>
                        <input type="text" id="age" placeholder="Enter your age" value="<?php echo $row['age']; ?>" class="form-control" name="age" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="Dgree">Degree:</label>
                        <input type="text" id="Dgree" placeholder="Enter your degree" value="<?php echo $row['degree']; ?>" class="form-control" name="dgree" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="site">Website(e.g:www.john smith.com):</label>
                        <input type="text" id="site" placeholder="Enter your website" value="<?php echo $row['website']; ?>" class="form-control" name="site" />
                    </div>
                <?php
            }
        } else {
                ?>
                <form action="" method="POST">
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="email">Email ID:</label>
                        <input type="email" placeholder="Enter your email address" id="email" value="" class="form-control" name="mail" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="bday">Birthday:</label>
                        <input type="text" id="bday" value="" class="form-control" name="bday" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="phone">Phone:</label>
                        <input type="number" placeholder="Enter your mobile number" id="phone" value="" class="form-control" name="phone" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="city">City:</label>
                        <input type="text" id="city" placeholder="Enter your city" value="" class="form-control" name="city" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="age">Age:</label>
                        <input type="text" id="age" placeholder="Enter your age" value="" class="form-control" name="age" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="Dgree">Degree:</label>
                        <input type="text" id="Dgree" placeholder="Enter your degree" value="" class="form-control" name="dgree" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="site">Website(e.g:www.john smith.com):</label>
                        <input type="text" id="site" placeholder="Enter your website" value="" class="form-control" name="site" />
                    </div>
                <?php
            }
                ?>
                <div class="btn">
                    <button type="submit" class="btn btn-primary mx-3" name="updatepinfo">Update</button>
                </div>
                </form>
    </div>
</section>