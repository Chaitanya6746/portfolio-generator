<?php
ob_start();
require_once 'conn.php';
// $id = $_SESSION['id'];
// $select = "SELECT * FROM user_form WHERE id='$id'";
// $select1 = "SELECT * FROM about WHERE id='$id'";
// $result = mysqli_query($conn, $select);
// $fet = mysqli_query($conn, $select1)
include("includes/header.php");

$selectmedia = "SELECT * FROM social_media WHERE uuid='$uuid'";
$dtmedia = mysqli_query($conn, $selectmedia);
if (isset($_POST['updatemedia'])) {
    $twit = $_POST['twitter'];
    $insta = $_POST['instagram'];
    $fb = $_POST['facebook'];
    $link = $_POST['linkedin'];


    if (mysqli_num_rows($dtmedia) > 0) {
        $mediaupdate = "UPDATE social_media
        SET twitter = '$twit', instagram = '$insta' ,facebook = '$fb',linkedin = '$link'
        WHERE uuid = '$uuid'";
        $mediaquery = mysqli_query($conn, $mediaupdate);
        if ($mediaquery) {
            header('location: socialmedia.php');
        }
    } else {
        $insertintomedia = "INSERT INTO social_media (uuid,twitter,instagram,facebook,linkedin)  VALUES('$uuid','$twit','$insta','$fb','$link')";
        $mediainsertqry = mysqli_query($conn, $insertintomedia);
        if ($mediainsertqry) {
            header('location: socialmedia.php');
        }
    }
}

?>


<section class="main">
    <div class="main-top">
        <h1>Your Details</h1>
    </div>
    <div>
        <?php
        if (mysqli_num_rows($dtmedia) > 0) {

            // LOOP TILL END OF DATA
            while ($row = $dtmedia->fetch_assoc()) {
        ?>
                <form action="" method="POST">
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="email">Twitter URL:</label>
                        <input type="text" id="email" placeholder="Enter your Twitter URL" value="<?php echo $row['twitter']; ?>" class="form-control" name="twitter" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="bday">Instagram URL:</label>
                        <input type="text" id="bday" placeholder="Enter your Instagram URL" value="<?php echo $row['instagram']; ?>" class="form-control" name="instagram" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="phone">LinkedIn URL:</label>
                        <input type="text" id="phone" value="<?php echo $row['linkedin']; ?>" class="form-control" name="linkedin" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="city">Facebook URL:</label>
                        <input type="text" id="city" value="<?php echo $row['facebook']; ?>" class="form-control" name="facebook" />
                    </div>

                <?php
            }
        } else {
                ?>
                <form action="" method="POST">
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="email">Twitter URL:</label>
                        <input type="text" id="email" value="" class="form-control" name="twitter" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="bday">Instagram URL:</label>
                        <input type="text" id="bday" value="" class="form-control" name="instagram" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="phone">LinkedIn URL:</label>
                        <input type="text" id="phone" value="" class="form-control" name="linkedin" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="city">Facebook URL:</label>
                        <input type="text" id="city" value="" class="form-control" name="facebook" />
                    </div>
                <?php
            }
                ?>
                <div class="btn">
                    <button type="submit" class="btn btn-primary mx-3" name="updatemedia">Update</button>
                </div>
                </form>
    </div>
</section>