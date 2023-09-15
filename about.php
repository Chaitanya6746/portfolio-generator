<?php
require_once 'conn.php';
ob_start();
// $id = $_SESSION['id'];
// $select = "SELECT * FROM user_form WHERE id='$id'";
// $select1 = "SELECT * FROM about WHERE id='$id'";
// $result = mysqli_query($conn, $select);
// $fet = mysqli_query($conn, $select1)

?>
<?php
include("includes/header.php");
?>
<?php
$abt = mysqli_query($conn, $selectabt);

//if button with the name uploadfilesub has been clicked
if (isset($_POST['uploadfilesub'])) {
    //declaring variables
    $abt_us = $_POST['abt_us'];
    $abt_title = $_POST['abt_title'];
    $abt_stitle = $_POST['abt_stitle'];
    $abt_desc = $_POST['abt_desc'];
    $filename = $_FILES['uploadfile']['name'];
    $filetmpname = $_FILES['uploadfile']['tmp_name'];
    //folder where images will be uploaded
    $folder = 'imagesuploadedf/';
    //function for saving the uploaded images in a specific folder
    move_uploaded_file($filetmpname, $folder . $filename);
    //inserting image details (ie image name) in the database
    if (mysqli_num_rows($abt) > 0) {
        $abtupdate = "UPDATE about
        SET about_us = '$abt_us',about_title = '$abt_title', about_subtitle = '$abt_stitle' ,about_desc = '$abt_desc',profile_pic = '$filename'
        WHERE uuid = '$uuid'";
        $res = mysqli_query($conn, $abtupdate);
        if ($res) {
            header('location:about.php');
        }
    } else {
        $sql = "INSERT INTO `about` (uuid,about_us,about_title,about_subtitle,`profile_pic`,about_desc)  VALUES ('$uuid','$abt_us','$abt_title','$abt_stitle','$filename','$abt_desc')";
        $qry = mysqli_query($conn, $sql);
        if ($qry) {
            header('location:about.php');
        }
    }
}


?>




<section class="main">
    <div class="main-top">
        <h1>Your Details</h1>
    </div>
    <div>


        <div>
            <?php
            if (mysqli_num_rows($abt) > 0) {



                while ($row = $abt->fetch_assoc()) {

            ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="col-12 col-md-8 my-4 mx-3">
                            <label for="abt_desc">About You:</label>
                            <textarea name="abt_us" id="abt_desc" placeholder="Describe yourself" cols="30" rows="10" class="form-control"><?php echo $row['about_us']; ?></textarea>
                        </div>
                        <div class="col-12 col-md-8 my-4 mx-3">
                            <label for="fname">About Profession:</label>
                            <input type="text" id="fname" placeholder="(e.g:Web Developer,Data Analyst,UI/UX designer)" value="<?php echo $row['about_title']; ?>" class="form-control" name="abt_title" />
                        </div>
                        <div class="col-12 col-md-8 my-4 mx-3">
                            <label for="fname">Subtitle:</label>
                            <input type="text" id="stitle" placeholder="brief your profession(e.g:making websites is really fun)" value="<?php echo $row['about_subtitle']; ?>" class="form-control" name="abt_stitle" />
                        </div>
                        <div class="col-12 col-md-8 my-4 mx-3">
                            <label for="abt_desc">About Description:</label>
                            <textarea name="abt_desc" id="abt_desc" placeholder="describe your profession" cols="30" rows="10" class="form-control"><?php echo $row['about_desc']; ?></textarea>
                        </div>
                        <div class="col-12 col-md-8 my-4 mx-3">
                            <label for="formFile" class="form-label">Profile picture</label>
                            <input class="form-control" type="file" id="formFile" name="uploadfile" value="<?php echo $row['profile_pic'] ?>" required>
                        </div>
                    <?php
                }
            } else {
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="col-12 col-md-8 my-4 mx-3">
                            <label for="abt_desc">About You:</label>
                            <textarea name="abt_us" id="abt_desc" placeholder="Describe yourself" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="col-12 col-md-8 my-4 mx-3">
                            <label for="fname">About Profession:</label>
                            <input type="text" id="fname" placeholder="(e.g:Web Developer,Data Analyst,UI/UX designer)" value="" class="form-control" name="abt_title" />
                        </div>
                        <div class="col-12 col-md-8 my-4 mx-3">
                            <label for="fname">Subtitle:</label>
                            <input type="text" id="stitle" value="" placeholder="brief your profession(e.g:making websites is really fun)" class="form-control" name="abt_stitle" />
                        </div>
                        <div class="col-12 col-md-8 my-4 mx-3">
                            <label for="abt_desc">About Description:</label>
                            <textarea name="abt_desc" id="abt_desc" placeholder="describe your profession" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="col-12 col-md-8 my-4 mx-3">
                            <label for="formFile" class="form-label">Profile picture</label>
                            <input class="form-control" type="file" id="formFile" name="uploadfile" value="" required>
                        </div>
                    <?php
                }
                    ?>

        </div>

        <div class="btn">
            <button type="submit" class="btn btn-primary mx-3" name="uploadfilesub">Update</button>
        </div>
        </form>
    </div>
</section>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>