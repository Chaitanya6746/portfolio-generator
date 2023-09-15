<?php
ob_start();
include("includes/header.php");
require_once "conn.php";
?>
<?php
$uuid = $_SESSION['id'];
$selectcontact = "SELECT * FROM contact WHERE uuid='$uuid'";
$fetcontact = mysqli_query($conn, $selectcontact);

if (isset($_POST['update'])) {
    $location = $_POST['location'];
    $phone_num = $_POST['phone_num'];
    $email = $_POST['email'];
    if (mysqli_num_rows($fetcontact) > 0) {
        $updatecontact = "UPDATE contact SET location='$location',phone = '$phone_num',email = '$email' WHERE uuid = '$uuid'";
        $updateqry = mysqli_query($conn, $updatecontact);
        if ($updateqry) {
            header("location:contact.php");
        }
    } else {
        $insertcontact = "INSERT INTO contact(uuid,location,phone,email) VALUES('$uuid','$location','$phone_num','$email') ";
        $insertqry = mysqli_query($conn, $insertcontact);
        if ($insertqry) {
            header("location:contact.php");
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
        if (mysqli_num_rows($fetcontact) > 0) {

            // LOOP TILL END OF DATA
            while ($row = $fetcontact->fetch_assoc()) {
        ?>
                <form action="" method="POST">
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="fname">Location:</label>
                        <input type="text" id="fname" placeholder="Enter Your Full Name" value="<?php echo $row['location']; ?>" class="form-control" name="location" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="stitle">Phone Number:</label>
                        <input type="text" id="stitle" placeholder="" value="<?php echo $row['phone']; ?>" class="form-control" name="phone_num" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="stitle">Email:</label>
                        <input type="email" id="stitle" placeholder="" value="<?php echo $row['email']; ?>" class="form-control" name="email" />
                    </div>
                <?php
            }
        } else {
                ?>
                <form action="" method="POST">
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="fname">Location:</label>
                        <input type="text" id="fname" placeholder="Enter Your Full Name" value="" class="form-control" name="location" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="stitle">Phone Number:</label>
                        <input type="text" id="stitle" placeholder="" value="" class="form-control" name="phone_num" />
                    </div>
                    <div class="col-12 col-md-8 my-4 mx-3">
                        <label for="stitle">Email:</label>
                        <input type="email" id="stitle" placeholder="" value="" class="form-control" name="email" />
                    </div>

                <?php
            }
                ?>
                <div class="btn">
                    <button type="submit" class="btn btn-primary mx-3" name="update">Update</button>
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