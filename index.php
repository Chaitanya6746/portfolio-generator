<?php
include("includes/header.php");
ob_start();
?>

<section class="main">
  <div class="main-top">
    <h1>Your Details</h1>
  </div>
  <div>
    <?php
    if (mysqli_num_rows($fet) > 0) {

      // LOOP TILL END OF DATA
      while ($row = $fet->fetch_assoc()) {
    ?>
        <form action="" method="POST">
          <div class="col-12 col-md-8 my-4 mx-3">
            <label for="fname">Full name:</label>
            <input type="text" id="fname" placeholder="Enter Your Full Name" value="<?php echo $row['title']; ?>" class="form-control" name="fname" />
          </div>
          <div class="col-12 col-md-8 my-4 mx-3">
            <label for="stitle">Subtitle</label>
            <input type="text" id="stitle" placeholder="(e.g:Web Developer,Data Analyst,UI/UX designer)" value="<?php echo $row['subtitle']; ?>" class="form-control" name="stitle" />
          </div>
        <?php
      }
    } else {
        ?>
        <form action="" method="POST">
          <div class="col-12 col-md-8 my-4 mx-3">
            <label for="fname">Full name:</label>
            <input type="text" id="fname" placeholder="Enter Your Full Name" value="" class="form-control" name="fname" />
          </div>
          <div class="col-12 col-md-8 my-4 mx-3">
            <label for="fname">Subtitle</label>
            <input type="text" id="stitle" value="" placeholder="(e.g:Web Developer,Data Analyst,UI/UX designer)" class="form-control" name="stitle" />
          </div>
        <?php
      }
        ?>
        <?php
        // LOOP TILL END OF DATA
        while ($row = $result->fetch_assoc()) {
        ?>
          <div class="col-12 col-md-8 my-4 mx-3">
            <label for="fname">Username</label>
            <input type="text" placeholder="Enter Your Username" id="Uname" value="<?php echo $row['name']; ?>" class="form-control" />
          </div>
          <div class="col-12 col-md-8 my-4 mx-3">
            <label for="pass">Password</label>
            <input type="password" placeholder="Enter Your Password" id="pass" value="" class="form-control" />
            <small><i>Leave this blank if you dont want to change the password.</i></small>
          </div>
          <div class="btn">
            <button type="submit" class="btn btn-primary mx-3" name="submit">Update</button>
          </div>
        </form>
      <?php
        }
      ?>
  </div>
</section>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>