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
                    <h1 class="m-0">Whitelist</h1>
                </div>
                <div>
                    <a href="function/add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Add New Customer</a>
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
                                        <th style="width: 1%;">
                                            No.
                                        </th>
                                        <th style="width: 5%;">
                                            Name
                                        </th>
                                        <th style="width: 5%;">
                                            Email
                                        </th>
                                        <th style="width: 5%;">
                                            Amount of NFT
                                        </th>
                                        <th style="width: 5%;">
                                            Price+Code
                                        </th>
                                        <th style="width: 5%;">
                                            Payment
                                        </th>
                                        <th style="width: 5%;">
                                            Registered at
                                        </th>
                                        <th style="width: 5%;">
                                            Status
                                        </th>
                                        <th style="width: 5%;">
                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query = "SELECT * FROM form";
                                    $sql = mysqli_query($con, $query) or die(mysqli_error($con));
                                    if (mysqli_num_rows($sql) > 0) {
                                        while ($data = mysqli_fetch_array($sql)) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['name']; ?></td>
                                                <td><?= $data['email']; ?></td>
                                                <td><?= $data['book_amount']; ?></td>
                                                <td><?= number_format($data['priceUnique']); ?></td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#myModal_<?= $data['id']; ?>">
                                                        <img src="../storage/img/<?= $data['image'] ?>" width='120' height='120'>
                                                    </a>
                                                    <div id="myModal_<?= $data['id']; ?>" class="modal fade" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-body">
                                                                <img src="../storage/img/<?= $data['image'] ?>" height='640'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?= $data['created_at']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($data['status'] == 'approved') { ?>
                                                        <h5><span class="badge badge-pill badge-success">Approved</span></h5>
                                                        <?php
                                                        if ($data['hide'] == 'yes') {
                                                            if ($data['receive_book'] == 'yes') { ?>
                                                                <h5><span class="badge badge-pill badge-secondary">Hide</span></h5>
                                                                <h5><span class="badge badge-pill badge-info">Receive Physical Book</span></h5>
                                                            <?php
                                                            } elseif ($data['receive_book'] == 'no') { ?>
                                                                <h5><span class="badge badge-pill badge-secondary">Hide</span></h5>
                                                            <?php
                                                            }
                                                        } elseif ($data['hide'] == 'no') {
                                                            if ($data['receive_book'] == 'yes') { ?>
                                                                <h5><span class="badge badge-pill badge-info">Receive Physical Book</span></h5>
                                                            <?php
                                                            } elseif ($data['receive_book'] == 'no') { ?>
                                                        <?php
                                                            }
                                                        }
                                                    } elseif ($data['status'] == 'pending') { ?>
                                                        <h5><span class="badge badge-pill badge-warning">Pending</span></h5>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($_SESSION['user'] == 'validator') { ?>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="function/approval.php?id=<?= $data['id'] ?>" onclick="return confirm('Approve/unapprove this customer ?')">Approve</a>
                                                                <a class="dropdown-item" href="function/hide.php?id=<?= $data['id'] ?>" onclick="return confirm('Hide/unhide this customer ?')">Hide</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="function/receive.php?id=<?= $data['id'] ?>" onclick="return confirm('This customer receive/unreceive a Physical Book?')">Receive Physical Book</a>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } elseif ($_SESSION['user'] == 'admin') { ?>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="function/edit.php?id=<?= $data['id'] ?>">
                                                                    <i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit
                                                                </a>
                                                                <a class="dropdown-item" href="function/delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Delete this customer?')">
                                                                    <i class="fa fa-minus-circle" aria-hidden="true"></i> Delete
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="function/approval.php?id=<?= $data['id'] ?>" onclick="return confirm('Approve/unapprove this customer ?')">Approve</a>
                                                                <a class="dropdown-item" href="function/hide.php?id=<?= $data['id'] ?>" onclick="return confirm('Hide/unhide this customer ?')">Hide</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="function/receive.php?id=<?= $data['id'] ?>" onclick="return confirm('This customer receive/unreceive a Physical Book?')">Receive Physical Book</a>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#detail_<?= $data['id']; ?>">
                                                        Detail
                                                    </button>
                                                    <div id="detail_<?= $data['id']; ?>" class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Customer</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    <p>Name: <?= $data['name']; ?></p>
                                                                    <p> Wallet: <?= $data['wallet']; ?></p>
                                                                    <p>Email: <?= $data['email']; ?></p>
                                                                    <p>Phone Number: <?= $data['phone_number']; ?></p>
                                                                    <p>Status: <?= $data['status']; ?></p>
                                                                    <p>Hide: <?= $data['hide']; ?></p>
                                                                    <p>Amount of NFT: <?= $data['book_amount']; ?></p>
                                                                    <p>Unique Code: <?= substr($data['priceUnique'], -3); ?> </p>
                                                                    <p>Nominal: <?= $data['priceUnique']; ?></p>
                                                                    <p>Receive Physical Book: <?= $data['receive_book']; ?></p>
                                                                    <p>payment method: <?= $data['bank']; ?></p>
                                                                    <p>Registered at: <?= $data['created_at']; ?></p>
                                                                    <p>Confirmed at: <?= $data['confirmed_at']; ?></p>
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