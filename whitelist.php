<?php
include "include/header.php";
?>

<section id="whitelist"></section>
<!-- content -->
<div class="col-sm-10 mx-auto mt-5 mb-5">
    <h3 class="mt-3 mb-5 text-center" style="color: #ea5273;">Whitelist</h3>
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-striped projects text-center mt-5 table-responsive">
            <h4 class="text-left" style="color: #EA5273;">Daftar&nbsp;Whitelist</h4>
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 5%">
                            Nama
                        </th>
                        <th style="width: 5%">
                            Email
                        </th>
                        <th style="width: 5%">
                            Status
                        </th>
                        <th style="width: 5%">
                            Jumlah&nbsp;NFT
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = "SELECT name, email, receive_book, SUM(book_amount) AS nft_sum FROM form 
                    WHERE receive_book = 'yes' AND status = 'approved'
                    GROUP BY email
                    ORDER BY confirmed_at DESC";
                    $sql = mysqli_query($con, $query) or die(mysqli_error($con));
                    if (mysqli_num_rows($sql) > 0) {
                        while ($data = mysqli_fetch_array($sql)) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data['name']; ?></td>
                                <td>
                                    <?php
                                    $email = $data['email'];

                                    $em = explode("@", $email);
                                    $name = $em[0];
                                    $len = strlen($name);
                                    $showLen = floor($len / 2);
                                    $str_arr = str_split($name);
                                    for ($ii = $showLen; $ii < $len; $ii++) {
                                        $str_arr[$ii] = '*';
                                    }
                                    $em[0] = implode('', $str_arr);
                                    $new_name = implode('@', $em);
                                    echo $new_name;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($data['receive_book'] == 'yes') { ?>
                                        <b style="color:#EA5273;">NFT<sup> + Buku</sup></b>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td><?= $data['nft_sum']; ?></td>
                            </tr>
                        <?php
                        }
                    } else { ?>
                        <tr>
                        <td colspan="5" align="center" style="background-color: #ffffff; padding: 70px"><h1>Jadilah yang <span style="color: #EA5273;">pertama</span>!</h1></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
</section>

<?php
include "include/footer.php";
?>