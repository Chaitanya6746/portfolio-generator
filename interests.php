<?php
include("includes/header.php");
?>
<style>
  .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 200px !important;
    width: 50%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  }

  .styled-table thead tr {

    color: black;
    text-align: left;
  }

  .styled-table th,
  .styled-table td {
    padding: 12px 15px;
  }

  .styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
  }

  .styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
  }

  .styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
  }

  .styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
  }

  .btn-group {
    width: 40%;
  }

  .btn {
    color: white !important;
  }

  .btn:hover {
    color: black !important;
  }
</style>

<section class="main">
  <div class="main-top">
    <h1>Interests</h1>
    <br>
    <form action="data.php" method="post" autocomplete="off">
      <div class="form-group">
        <label for="title">Your Interests</label>
        <input class="form-control" type="text" name="title" id="title" placeholder="Enter Your interest" Required>

      </div><br>
      <button class="btn btn-success">Submit</button>

    </form>

  </div><br>
  <hr class="bg-dark m-auto">
  <div class="main-top w-50 m-auto my-4">
    <h1>Your Lists of Interests</h1>
    <div id="lists">
      <table class="styled-table">
        <thead>
          <tr>
            <th scope="col" name="id">S.no</th>
            <th scope="col">List of Interests</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'database.php';
          $sql = "SELECT * FROM interests WHERE uuid = '$uuid'";
          $result = mysqli_query($conn, $sql);

          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id'];
              $title = $row['title'];
          ?>
              <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $title  ?></td>
                <td class="btn-group">
                  <a class="btn btn-success btn-sm" href="edit.php?id=<?php echo $id ?>" role="button">Edit</a>
                  <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $id ?>" role="button">Delete</a>


                </td>

              </tr>

          <?php
            }
          }
          ?>


        </tbody>
      </table>
    </div>
  </div>
</section>

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