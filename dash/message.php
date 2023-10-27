<?php
include "include/header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between">
                <div class="col-sm-6">
                    <h1 class="m-0">Message</h1>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card direct-chat direct-chat-primary">
                    <!-- Default box -->
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        No.
                                    </th>
                                    <th style="width: 5%">
                                        Name
                                    </th>
                                    <th style="width: 5%">
                                        Email
                                    </th>
                                    <th style="width: 5%;">
                                        Message
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM message
                                            ORDER BY created_at DESC";
                                $sql = mysqli_query($con, $query) or die(mysqli_error($con));
                                if (mysqli_num_rows($sql) > 0) {
                                    while ($data = mysqli_fetch_array($sql)) { ?>
                                        <tr>
                                            <td><?= $data['id']; ?></td>
                                            <td><?= $data['name']; ?></td>
                                            <td><?= $data['email']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_<?= $data['id']; ?>">
                                                    <i class="nav-icon fa fa-envelope"></i>
                                                </button>
                                                <div id="myModal_<?= $data['id']; ?>" class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle"><?= $data['name']; ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?= $data['message']; ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <h5 class="modal-title" id="exampleModalLongTitle"><?= $data['email']; ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
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
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include "include/footer.php";
?>