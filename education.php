<?php
include('includes/header.php');
?>
<style>
</style>
<section class="main">
    <div class="main-top">
        <h1>Education</h1>
    </div>
    <div class="col-lg-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="card-tools">
                    <a class="btn btn-block btn-sm btn-default btn-flat border-primary new_education" href="add-edu.php"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table tabe-hover table-bordered table-compact" id="list">
                    <colgroup>
                        <col width="5%">
                        <col width="20%">
                        <col width="20%">
                        <col width="15%">
                        <col width="35%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="text-center">S.no</th>
                            <th>Organization</th>
                            <th>Degree</th>
                            <th>Duration</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'conn.php';
                        $selectfromeducation = "SELECT * FROM education WHERE uuid = '$uuid'";
                        $fetchfromeducation = mysqli_query($conn, $selectfromeducation);

                        if ($fetchfromeducation) {
                            while ($row =  mysqli_fetch_assoc($fetchfromeducation)) {
                        ?>
                                <?php
                                $id = $row['id'];
                                $title = $row['title'];
                                $time = $row['time'];
                                $org = $row['org'];
                                $desc = $row['about_exp']; ?>
                                <tr>
                                    <th class="text-center"><?php echo $id ?></th>
                                    <td><b class="truncate-1"><?php echo $org ?></b></td>
                                    <td><b class="truncate-1"><?php echo $title ?></b></td>
                                    <td><b class="truncate-1"><?php echo $time ?></b></td>
                                    <td><small class="truncate-1"><?php echo $desc ?></small></td>
                                    <td class="text-center">
                                        <div class="btn-group ">
                                            <a href="edit-edu.php?id=<?php echo $id ?>" class="btn btn-primary btn-flat btn-sm manage_education w-50">
                                                <i class="fas fa-edit" style="color: white;"></i>
                                            </a>
                                            <a href="delete-edu.php?id=<?php echo $id ?>" class="btn btn-danger btn-sm btn-flat delete_education w-50">
                                                <i class="fas fa-trash" style="color: white;"></i>
                                            </a>
                                        </div>
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
    </div>
</section>