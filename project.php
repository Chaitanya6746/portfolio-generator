<?php
include('includes/header.php');
?>
<style>
</style>
<section class="main">
    <div class="main-top">
        <h1>Projects</h1>
    </div>
    <div class="col-lg-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="card-tools">
                    <a class="btn btn-block btn-sm btn-default btn-flat border-primary new_education" href="add-project.php"><i class="fa fa-plus"></i> Add New</a>
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
                            <th class="text-center">#</th>
                            <th>Banner</th>
                            <th>Project Name</th>
                            <th>Type</th>
                            <th>Summary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'conn.php';
                        $selectprojects = "SELECT * FROM project WHERE uuid = '$uuid'";
                        $fetchprojects = mysqli_query($conn, $selectprojects);

                        if ($fetchprojects) {
                            while ($row =  mysqli_fetch_assoc($fetchprojects)) {
                        ?>
                                <?php
                                $id = $row['id'];
                                $image = $row['image'];
                                $project_title = $row['project_title'];
                                $type = $row['type'];
                                $project_desc = $row['project_desc']; ?>
                                <tr>
                                    <th class="text-center"><?php echo $id ?></th>
                                    <td>
                                        <center><img style="height: 100px;width: 150px" src="imagesuploadedf/<?php echo $image ?>" class="banner-img img-thumbnail" alt=""></center>
                                    </td>
                                    <td><b class="truncate-1"><?php echo $project_title ?></b></td>
                                    <td><b class="truncate-1"><?php echo $type ?></b></td>
                                    <td><small class="truncate-1"><?php echo $project_desc ?></small></td>
                                    <td class="text-center">
                                        <div class="btn-group ">
                                            <a href="edit-project.php?id=<?php echo $id ?>" class="btn btn-primary btn-flat btn-sm manage_education w-50">
                                                <i class="fas fa-edit" style="color: white;"></i>
                                            </a>
                                            <a href="delete-project.php?id=<?php echo $id ?>" class="btn btn-danger btn-sm btn-flat delete_education w-50">
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
</section>