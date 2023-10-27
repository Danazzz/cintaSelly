<?php
include "include/header.php";
error_reporting(0);

if ($_SESSION['choose_bank'] == "") {
    echo "<script>alert('please choose bank first')</script>";
    header('Location: pickbank.php');
}

if (isset($_POST['back'])) {
    unset($_SESSION['choose_bank']);
    header('Location: pickbank.php');
}

if (isset($_POST['next'])) {
    if ($_SESSION['count'] != "" and  $_SESSION['choose_bank'] != "" and $_SESSION['amount'] != "") {
        $_SESSION['paybank'] = 1;
        header('Location: konfirmasi.php');
    }
}

//get bank account
$query_bca = "SELECT * FROM bank
WHERE name = 'bca'";
$sql_bca = mysqli_query($con, $query_bca);
$data_bca = mysqli_fetch_array($sql_bca);

$query_bpd = "SELECT * FROM bank
WHERE name = 'bpd'";
$sql_bpd = mysqli_query($con, $query_bpd);
$data_bpd = mysqli_fetch_array($sql_bpd);

$query_qris = "SELECT * FROM bank
WHERE name = 'qris'";
$sql_qris = mysqli_query($con, $query_qris);
$data_qris = mysqli_fetch_array($sql_qris);

?>

<section id="order" class="mt-5 mb-5">
    <div class="container">
        <div class="row p-3">

            <?php if ($_SESSION['choose_bank'] == 'bca') { ?>
                <div class="col-sm-12 laptop">
                    <div class="card text-left p-5">

                        <div class="row">
                            <div class="col-sm-6">
                                <div style="display: flex">
                                    <h3>Pembayaran</h3><br>
                                </div>
                                <p style="color: pink;">Bank Central Asia</p>
                            </div>
                            <div class="col-sm-6 text-right">
                                <img src="img/bankBCA.svg" class="photo" alt="..." width="15%" />
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-6">
                                <div style="display: flex">
                                    <div>
                                        <p>Nomor Rekening</p>
                                        <div class="copy-text" style="display: flex">
                                            <h3 class="mr-3" id="text" style="color: #EA5273;"><?= $data_bca['account'] ?></h3>
                                            <div class="btn d-flex flex-row">
                                                <button id="copy-text-btn" style="border: none; background: #ffffff; margin-top: -10px"><img src="img/copy.svg" alt="">Salin</button>
                                                <span class="tooltip">Tersalin!</span>
                                            </div>
                                        </div>
                                        <p>a/n Baliola</p>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-6 text-right">
                                <p>Total Pembayaran</p>
                                <h3 style="color: #EA5273;">Rp. <?php echo number_format($_SESSION['amount']); ?></h3>
                            </div>

                        </div>
                        <h5>Metode Pembayaran</h5>
                        <!-- Collapse payment method -->
                        <div class="accordion mb-3" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left d-flex justify-content-between p-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="mt-2">BCA Mobile</div>
                                            <span class="navbar-text mr-4">
                                                <div>
                                                    <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#collapse-projects1" aria-expanded="false" aria-controls="collapse-projects1s"></i>
                                                </div>
                                            </span>

                                            <div class="collapse" id="collapse-projects1">

                                            </div>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <li>
                                            <ol>1. Buka BCA mobile.</ol>
                                            <ol>2. Masukkan Kode Akses.</ol>
                                            <ol>3. Pilih menu m-Transfer.</ol>
                                            <ol>4. Klik Antar Rekening di Daftar Transfer.</ol>
                                            <ol>5. Daftarkan Nomor Rekening Tujuan.</ol>
                                            <ol>6. Periksa informasi rekening atas nama Baliola . Jika benar pilih Ya.</ol>
                                            <ol>7. Pilih Daftar Rekening.</ol>
                                            <ol>8. Masukkan nominal transfer BCA sebesar Rp. <b style="color:#EA5273;"><?php echo number_format($_SESSION['amount']); ?></b></ol>
                                            <ol>9. Klik Send.</ol>
                                            <ol>10. Masukkan PIN Mobile BCA. Tunggu pop up transfer BCA berhasil.</ol>
                                        </li>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed d-flex justify-content-between p-0" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <div class="mt-2">ATM BCA</div>
                                            <span class="navbar-text mr-4">
                                                <div>
                                                    <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#collapse-projects2" aria-expanded="false" aria-controls="collapse-projects2"></i>
                                                </div>
                                            </span>

                                            <div class="collapse" id="collapse-projects2">

                                            </div>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <li>
                                            <ol>1. Masukkan Kartu ATM BCA Anda.</ol>
                                            <ol>2. Masukan PIN ATM Anda.</ol>
                                            <ol>3. Pilih Menu Transaksi Lainnya.</ol>
                                            <ol>4. Pilih menu Transfer dan Ke Rek BCA.</ol>
                                            <ol>5. Masukkan no rekening BCA yang dituju.</ol>
                                            <ol>6. Masukkan Nominal Jumlah Uang yang akan di transfer sebesar Rp. <b style="color:#EA5273;"><?php echo number_format($_SESSION['amount']); ?></b>.</ol>
                                            <ol>7. Layar ATM akan menampilkan data transaksi anda.</ol>
                                            <ol>8. Jika data sudah benar pilih “YA” (OK).</ol>
                                            <ol>9. Selesai (struk akan keluar dari mesin ATM).</ol>
                                            <ol>10. Ambil Kartu ATM anda.</ol>
                                        </li>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed d-flex justify-content-between p-0" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <div class="mt-2">KlikBCA</div>
                                            <span class="navbar-text mr-4">
                                                <div>
                                                    <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#collapse-projects3" aria-expanded="false" aria-controls="collapse-projects3"></i>
                                                </div>
                                            </span>

                                            <div class="collapse" id="collapse-projects3">

                                            </div>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <li>
                                            <ol>1. Kunjungi laman <a href="https://ibank.klikbca.com/" target="_blank">https://ibank.klikbca.com/</a></ol>
                                            <ol>2. Masukan User ID KlikBCA Individual dan PIN </ol>
                                            <ol>3. Pilih "Login" </ol>
                                            <ol>4. Daftarkan terlebih dahulu nomor rekening tujuan di KlikBCA Individual </ol>
                                            <ol>5. Buka menu "Transfer Dana" Pilih Transfer ke "Rekening BCA" </ol>
                                            <ol>6. Pilih nomor rekening dari daftar transfer yang sudah didaftarkan </ol>
                                            <ol>7. Masukan nominal transfer sebesar Rp. <b style="color:#EA5273;"><?php echo number_format($_SESSION['amount']); ?></b>.</ol>
                                            <ol>8. Tulis berita jika ada informasi terkait transfer Akan muncul 8 angka di bagian bawah yang harus dimasukan ke KeyBCA </ol>
                                            <ol>9. Nyalakan KeyBCA, masukan pin dan tekan angka 2 </ol>
                                            <ol>10. Masukan 8 angka yang muncul. Kemudian masukan 8 angka balasan pada Respon KeyBCA APLLI 2 </ol>
                                            <ol>11. Klik "Lanjutkan" </ol>
                                            <ol>12. Lalu muncul identitas rekening tujuan </ol>
                                            <ol>13. Aktifkan kembali KeyBCA dan tekan nomor 1 </ol>
                                            <ol>14. Muncul 8 angka untuk diinput di kotak "Respon KeyBCA APPLI 1" </ol>
                                            <ol>15. Klik "Kirim" </ol>
                                            <ol>16. Transaksi berhasil dan akan muncul bukti transaksi. </ol>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 style="color: #EA5273;"><b>Note: Nominal pembayaran sudah termasuk dengan tiga angka kode unik dibelakang</b></h5>
                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <form action="" method="post">
                                    <input type="submit" name="back" value="Kembali" class="btn-close-modal text-secondary mr-3">
                                    <input type="submit" name="next" value="Kirim Bukti Transfer" class="btn-close-modal text-white p-2" style="background-color: #EA5273;color:white">
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-xs-12 mt-3 handphone">
                    <div class="card p-3">
                        <div class="col-sm-12">
                            <div class="row">
                                <ul class="navbar-nav mr-auto text-default">
                                    <li class="nav-item active">
                                        <div>
                                            <h5 class="text-dark">Pembayaran</h5>
                                            <p style="color: #EA5273;font-size:9pt;">Bank Central Asia</p>
                                        </div>
                                        <div class="collapse" id="collapse-projects">
                                            <p style="margin-bottom: 20px">Mengenai Buku</p>
                                            <p style="margin-bottom: 20px">Tentang Penulis</p>
                                            <p style="margin-bottom: 20px">Whitelist</p>
                                        </div>
                                    </li>
                                </ul>
                                <span class="navbar-text text-right" style="margin-top: -10px;">
                                    <div>
                                        <img src="img/bankBCA.svg" class="photo" alt="..." width="60%" />
                                    </div>
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <div style="display: flex">
                                    <div>
                                        <p>Nomor Rekening</p>
                                        <div class="copy-text" style="display: flex">
                                            <h3 class="mr-3" id="text2" style="color: #EA5273;"><?= $data_bca['account'] ?></h3>
                                            <div class="btn d-flex flex-row">
                                                <button id="copy-text-btn2" style="border: none; background: #ffffff; margin-top: -10px"><img src="img/copy.svg" width="10" alt="">Salin</button>
                                                <span class="tooltip2" style="font-size: 8pt">Tersalin!</span>
                                            </div>
                                        </div>
                                        <p style="color:#EA5273">a/n Baliola</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 text-left">
                                <p>Total Pembayaran</p>
                                <h5 style="color: #EA5273;">Rp. <?php echo number_format($_SESSION['amount']); ?></h5>
                            </div>
                        </div>
                        <h5>Metode Pembayaran</h5>
                        <!-- Collapse payment method -->
                        <div class="accordion mb-3" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left d-flex justify-content-between p-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="mt-2">BCA Mobile</div>
                                            <span class="navbar-text mr-4">
                                                <div>
                                                    <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#collapse-projects3" aria-expanded="false" aria-controls="collapse-projects3"></i>
                                                </div>
                                            </span>

                                            <div class="collapse" id="collapse-projects3">

                                            </div>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <li>
                                            <ol>1. Buka BCA mobile.</ol>
                                            <ol>2. Masukkan Kode Akses.</ol>
                                            <ol>3. Pilih menu m-Transfer.</ol>
                                            <ol>4. Klik Antar Rekening di Daftar Transfer.</ol>
                                            <ol>5. Daftarkan Nomor Rekening Tujuan.</ol>
                                            <ol>6. Periksa informasi rekening atas nama Baliola . Jika benar pilih Ya.</ol>
                                            <ol>7. Pilih Daftar Rekening.</ol>
                                            <ol>8. Masukkan nominal transfer BCA sebesar Rp. <b style="color:#EA5273;"><?php echo number_format($_SESSION['amount']); ?></b></ol>
                                            <ol>9. Klik Send.</ol>
                                            <ol>10. Masukkan PIN Mobile BCA. Tunggu pop up transfer BCA berhasil.</ol>
                                        </li>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left d-flex justify-content-between p-0" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="mt-2">ATM BCA</div>
                                            <span class="navbar-text mr-4">
                                                <div>
                                                    <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#collapse-projects4" aria-expanded="false" aria-controls="collapse-projects3"></i>
                                                </div>
                                            </span>

                                            <div class="collapse" id="collapse-projects4">

                                            </div>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <li>
                                            <ol>1. Masukkan Kartu ATM BCA Anda.</ol>
                                            <ol>2. Masukan PIN ATM Anda.</ol>
                                            <ol>3. Pilih Menu Transaksi Lainnya.</ol>
                                            <ol>4. Pilih menu Transfer dan Ke Rek BCA.</ol>
                                            <ol>5. Masukkan no rekening BCA yang dituju.</ol>
                                            <ol>6. Masukkan Nominal Jumlah Uang yang akan di transfer sebesar Rp. <b style="color:#EA5273;"><?php echo number_format($_SESSION['amount']); ?></b>.</ol>
                                            <ol>7. Layar ATM akan menampilkan data transaksi anda.</ol>
                                            <ol>8. Jika data sudah benar pilih “YA” (OK).</ol>
                                            <ol>9. Selesai (struk akan keluar dari mesin ATM).</ol>
                                            <ol>10. Ambil Kartu ATM anda.</ol>
                                        </li>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed d-flex justify-content-between p-0" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <div class="mt-2">KlikBCA</div>
                                            <span class="navbar-text mr-4">
                                                <div>
                                                    <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#collapse-projects3" aria-expanded="false" aria-controls="collapse-projects3"></i>
                                                </div>
                                            </span>

                                            <div class="collapse" id="collapse-projects3">

                                            </div>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <li>
                                            <ol>1. Kunjungi laman <a href="https://ibank.klikbca.com/" target="_blank">https://ibank.klikbca.com/</a></ol>
                                            <ol>2. Masukan User ID KlikBCA Individual dan PIN </ol>
                                            <ol>3. Pilih "Login" </ol>
                                            <ol>4. Daftarkan terlebih dahulu nomor rekening tujuan di KlikBCA Individual </ol>
                                            <ol>5. Buka menu "Transfer Dana" Pilih Transfer ke "Rekening BCA" </ol>
                                            <ol>6. Pilih nomor rekening dari daftar transfer yang sudah didaftarkan </ol>
                                            <ol>7. Masukan nominal transfer sebesar Rp. <b style="color:#EA5273;"><?php echo number_format($_SESSION['amount']); ?></b>.</ol>
                                            <ol>8. Tulis berita jika ada informasi terkait transfer Akan muncul 8 angka di bagian bawah yang harus dimasukan ke KeyBCA </ol>
                                            <ol>9. Nyalakan KeyBCA, masukan pin dan tekan angka 2 </ol>
                                            <ol>10. Masukan 8 angka yang muncul. Kemudian masukan 8 angka balasan pada Respon KeyBCA APLLI 2 </ol>
                                            <ol>11. Klik "Lanjutkan" </ol>
                                            <ol>12. Lalu muncul identitas rekening tujuan </ol>
                                            <ol>13. Aktifkan kembali KeyBCA dan tekan nomor 1 </ol>
                                            <ol>14. Muncul 8 angka untuk diinput di kotak "Respon KeyBCA APPLI 1" </ol>
                                            <ol>15. Klik "Kirim" </ol>
                                            <ol>16. Transaksi berhasil dan akan muncul bukti transaksi. </ol>
                                        </li>
                                    </div>
                                </div>
                            </div>
                            <<<<<<< HEAD <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed d-flex justify-content-between p-0" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <div class="mt-2">klikBCA antar Bank</div>
                                            <span class="navbar-text mr-4">
                                                <div>
                                                    <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#collapse-projects4" aria-expanded="false" aria-controls="collapse-projects4"></i>
                                                </div>
                                            </span>

                                            <div class="collapse" id="collapse-projects4">

                                            </div>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <li>
                                            <ol>1. Kunjungi laman https://ibank.klikbca.com/ </ol>
                                            <ol>2. Masukan User ID KlikBCA Individual dan PIN </ol>
                                            <ol>3. Pilih "Login" </ol>
                                            <ol>4. Daftarkan terlebih dahulu nomor rekening tujuan </ol>
                                            <ol>5. Masukan nominal transfer sebesar Rp. <b style="color:#EA5273;"><?php echo number_format($_SESSION['amount']); ?></b>.</ol>
                                            <ol>6. Tulis berita jika ada informasi terkait transfer jika diperlukan</ol>
                                            <ol>7. Pilih jenis transfer </ol>
                                            <ol>8. Lakukan konfirmasi dengan token BCA APPL 2 dan APPL 1 </ol>
                                            <ol>9. Transaksi selesai dan bukti transfer bisa dicetak. </ol>
                                        </li>
                                    </div>
                                </div>
                        </div>
                        =======
                        >>>>>>> b03258b6cbc389669f38ec0a228bc2b4373b1d98
                    </div>
                    <h6 style="color: #EA5273;"><b>Note: Nominal pembayaran sudah termasuk dengan tiga angka kode unik dibelakang</b></h6>
                    <div class="row mt-4">
                        <div class="col-sm-12 text-center">
                            <form action="" method="post">
                                <input type="submit" name="back" value="Kembali" class="btn-close-modal text-secondary mr-3">
                                <input type="submit" name="next" value="Kirim Bukti Transfer" class="btn-close-modal text-white p-2" style="background-color: #EA5273;color:white">
                            </form>
                        </div>
                    </div>

                </div>

        </div>



    <?php } elseif ($_SESSION['choose_bank'] == 'bpd') { ?>

        <div class="col-sm-12 mt-3 laptop">
            <div class="card text-left p-5">

                <div class="row">
                    <div class="col-sm-6">
                        <div style="display: flex">
                            <h3>Pembayaran</h3><br>
                        </div>
                        <p style="color: pink;">Bank Pembangunan Daerah Bali</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <img src="img/bankBPD.svg" class="photo" alt="..." width="15%" />
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <div style="display: flex">
                            <div>
                                <p>Nomor Rekening</p>
                                <div class="copy-text" style="display: flex">
                                    <h3 class="mr-3" id="text" style="color: #EA5273;"><?= $data_bpd['account'] ?></h3>
                                    <div class="btn d-flex flex-row">
                                        <button id="copy-text-btn" style="border: none; background: #ffffff; margin-top: -10px"><img src="img/copy.svg" alt="">Salin</button>
                                        <span class="tooltip">Tersalin!</span>
                                    </div>
                                </div>
                                <p>a/n Baliola</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p>Total Pembayaran</p>
                        <h3 style="color: #EA5273;">Rp. <?php echo number_format($_SESSION['amount']); ?></h3>
                    </div>
                </div>
                <h5>Metode Pembayaran</h5>
                <!-- Collapse payment method -->
                <div class="accordion mb-3" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left d-flex justify-content-between p-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="mt-2">BPD Mobile</div>
                                    <span class="navbar-text mr-4">
                                        <div>
                                            <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#collapse-projects5" aria-expanded="false" aria-controls="collapse-projects3"></i>
                                        </div>
                                    </span>

                                    <div class="collapse" id="collapse-projects5">

                                    </div>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <li>
                                    <ol>1. Buka BPD mobile.</ol>
                                    <ol>2. Masukkan Kode Akses.</ol>
                                    <ol>3. Pilih menu m-Transfer.</ol>
                                    <ol>4. Klik Antar Rekening di Daftar Transfer.</ol>
                                    <ol>5. Daftarkan Nomor Rekening Tujuan.</ol>
                                    <ol>6. Periksa informasi rekening atas nama Baliola . Jika benar pilih Ya.</ol>
                                    <ol>7. Pilih Daftar Rekening.</ol>
                                    <ol>8. Masukkan nominal transfer BPD sebesar Rp. <b style="color:#EA5273;"><?php echo number_format($_SESSION['amount']); ?></b></ol>
                                    <ol>9. Klik Send.</ol>
                                    <ol>10. Masukkan PIN Mobile BPD. Tunggu pop up transfer BPD berhasil.</ol>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left d-flex justify-content-between p-0" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="mt-2">ATM BPD</div>
                                    <span class="navbar-text mr-4">
                                        <div>
                                            <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#collapse-projects6" aria-expanded="false" aria-controls="collapse-projects3"></i>
                                        </div>
                                    </span>

                                    <div class="collapse" id="collapse-projects6">

                                    </div>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <li>
                                    <ol>1. Masukkan Kartu ATM BPD Anda.</ol>
                                    <ol>2. Masukan PIN ATM Anda.</ol>
                                    <ol>3. Pilih Menu Transaksi Lainnya.</ol>
                                    <ol>4. Pilih menu Transfer dan Ke Rek BPD.</ol>
                                    <ol>5. Masukkan no rekening BPD yang dituju.</ol>
                                    <ol>6. Masukkan Nominal Jumlah Uang yang akan di transfer sebesar Rp. <b style="color:#EA5273;"><?php echo number_format($_SESSION['amount']); ?></b>.</ol>
                                    <ol>7. Layar ATM akan menampilkan data transaksi anda.</ol>
                                    <ol>8. Jika data sudah benar pilih “YA” (OK).</ol>
                                    <ol>9. Selesai (struk akan keluar dari mesin ATM).</ol>
                                    <ol>10. Ambil Kartu ATM anda.</ol>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 style="color: #EA5273;"><b>Note: Nominal pembayaran sudah termasuk dengan tiga angka kode unik dibelakang</b></h5>
                <div class="row mt-4">
                    <div class="col-sm-12 text-center">
                        <form action="" method="post">
                            <input type="submit" name="back" value="Kembali" class="btn-close-modal text-secondary mr-3">
                            <input type="submit" name="next" value="Kirim Bukti Transfer" class="btn-close-modal text-white p-2" style="background-color: #EA5273;color:white">
                        </form>
                        <!-- <button type="submit" class="btn-whitelist p-2">Lanjutkan</button> -->
                    </div>
                </div>

            </div>

        </div>

        <div class="col-xs-12 mt-3 handphone">
            <div class="card p-3">
                <div class="col-sm-12">
                    <div class="row">
                        <!-- <div class="col-xs-6">
                                    <div style="display: flex">
                                        <h3 style="font-size:15pt;">Pembayaran</h3><br>
                                    </div>
                                    <p style="color: #EA5273;font-size:8pt;">Bank Pembangunan Bali</p>
                                </div>
                                <div class="col-xs-5 ">
                                    <img src="img/bankBPD.svg" alt="..." width="" />
                                </div> -->

                        <ul class="navbar-nav mr-auto text-default">
                            <li class="nav-item active">
                                <div>
                                    <h5 class="text-dark">Pembayaran</h5>
                                    <p style="color: #EA5273;font-size:9pt;">Bank Pembangunan Bali</p>
                                </div>
                                <div class="collapse" id="collapse-projects">
                                    <p style="margin-bottom: 20px">Mengenai Buku</p>
                                    <p style="margin-bottom: 20px">Tentang Penulis</p>
                                    <p style="margin-bottom: 20px">Whitelist</p>
                                </div>
                            </li>
                        </ul>
                        <span class="navbar-text text-right" style="margin-top: -10px;">
                            <div>
                                <img src="img/bankBPD.svg" class="photo" alt="..." width="60%" />
                                <!-- <i class="fa fa-chevron-up text-danger" aria-hidden="true" data-toggle="collapse" data-target="#collapse-projects" aria-expanded="false" aria-controls="collapse-projects"></i> -->
                            </div>
                        </span>
                    </div>
                </div>





                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        <div style="display: flex">
                            <div>
                                <p>Nomor Rekening</p>
                                <div class="copy-text" style="display: flex">
                                    <h3 class="mr-3" id="text2" style="color: #EA5273;"><?= $data_bpd['account'] ?></h3>
                                    <div class="btn d-flex flex-row">
                                        <button id="copy-text-btn2" style="border: none; background: #ffffff; margin-top: -10px"><img src="img/copy.svg" alt="">Salin</button>
                                        <span class="tooltip2">Tersalin!</span>
                                    </div>
                                </div>
                                <p style="color:#EA5273">a/n Baliola</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-6 text-left">
                        <p>Total Pembayaran</p>
                        <h5 style="color: #EA5273;">Rp. <?php echo number_format($_SESSION['amount']); ?></h5>
                    </div>

                </div>

                <!-- <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <div>
                                <p>Nomor Rekening</p>
                                <h3>7455165892312</h3>
                                <p>a/n Baliola</p>
                            </div>
                            Salin
                        </div>
                        <div>
                            <p>Total Pembayaran</p>
                            <h3>Rp. 500,000</h3>
                        </div>
                    </div> -->
                <h5>Metode Pembayaran</h5>
                <!-- Collapse payment method -->
                <div class="accordion mb-3" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left d-flex justify-content-between p-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="mt-2">BPD Mobile</div>
                                    <span class="navbar-text mr-4">
                                        <div>
                                            <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#collapse-projects7" aria-expanded="false" aria-controls="collapse-projects3"></i>
                                        </div>
                                    </span>

                                    <div class="collapse" id="collapse-projects7">

                                    </div>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <li>
                                    <ol>1. Buka BPD mobile.</ol>
                                    <ol>2. Masukkan Kode Akses.</ol>
                                    <ol>3. Pilih menu m-Transfer.</ol>
                                    <ol>4. Klik Antar Rekening di Daftar Transfer.</ol>
                                    <ol>5. Daftarkan Nomor Rekening Tujuan.</ol>
                                    <ol>6. Periksa informasi rekening atas nama Baliola . Jika benar pilih Ya.</ol>
                                    <ol>7. Pilih Daftar Rekening.</ol>
                                    <ol>8. Masukkan nominal transfer BPD sebesar Rp. <b style="color:#EA5273;"><?php echo number_format($_SESSION['amount']); ?></b></ol>
                                    <ol>9. Klik Send.</ol>
                                    <ol>10. Masukkan PIN Mobile BPD. Tunggu pop up transfer BPD berhasil.</ol>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left d-flex justify-content-between p-0" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="mt-2">ATM BPD</div>
                                    <span class="navbar-text mr-4">
                                        <div>
                                            <i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#collapse-projects8" aria-expanded="false" aria-controls="collapse-projects3"></i>
                                        </div>
                                    </span>

                                    <div class="collapse" id="collapse-projects8">

                                    </div>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <li>
                                    <ol>1. Masukkan Kartu ATM BPD Anda.</ol>
                                    <ol>2. Masukan PIN ATM Anda.</ol>
                                    <ol>3. Pilih Menu Transaksi Lainnya.</ol>
                                    <ol>4. Pilih menu Transfer dan Ke Rek BPD.</ol>
                                    <ol>5. Masukkan no rekening BPD yang dituju.</ol>
                                    <ol>6. Masukkan Nominal Jumlah Uang yang akan di transfer sebesar Rp. <b style="color:#EA5273;"><?php echo number_format($_SESSION['amount']); ?></b>.</ol>
                                    <ol>7. Layar ATM akan menampilkan data transaksi anda.</ol>
                                    <ol>8. Jika data sudah benar pilih “YA” (OK).</ol>
                                    <ol>9. Selesai (struk akan keluar dari mesin ATM).</ol>
                                    <ol>10. Ambil Kartu ATM anda.</ol>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 style="color: #EA5273;"><b>Note: Nominal pembayaran sudah termasuk dengan tiga angka kode unik dibelakang</b></h6>
                <div class="row mt-4">
                    <div class="col-sm-12 text-center">
                        <form action="" method="post">
                            <input type="submit" name="back" value="Kembali" class="btn-close-modal text-secondary mr-3">
                            <input type="submit" name="next" value="Kirim Bukti Transfer" class="btn-close-modal text-white p-2" style="background-color: #EA5273;color:white">
                        </form>
                        <!-- <button type="submit" class="btn-whitelist p-2">Lanjutkan</button> -->
                    </div>
                </div>

            </div>

        </div>
    <?php } elseif ($_SESSION['choose_bank'] == 'qris') { ?>

        <div class="col-sm-12 mt-3 laptop">
            <div class="card text-left p-5">

                <div class="row">
                    <div class="col-sm-6">
                        <div style="display: flex">
                            <h3>Pembayaran</h3><br>
                        </div>
                        <p style="color: pink;">Quick Response Indonesia Standard (QRIS)</p>
                    </div>

                    <div class="col-sm-6 text-right">
                        <img src="img/qris.svg" class="photo" alt="..." width="20%" />
                    </div>

                </div>

                <hr>


                <div class="row">
                    <div class="col-sm-12 text-right">
                        <p>Total Pembayaran</p>
                        <h3 style="color: #EA5273;">Rp. <?php echo number_format($_SESSION['amount']); ?></h3>
                    </div>
                    <div class="col-sm-12 text-center">
                        <div style="display: center">
                            <div class="justify-center mb-3">
                                <img src="img/<?= $data_qris['account'] ?>" class="photo" alt="..." width="70%" />
                            </div>
                        </div>
                        <h5 style="color: #EA5273;"><b>Note: Nominal pembayaran sudah termasuk dengan tiga angka kode unik dibelakang</b></h5>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-12 text-center">
                        <form action="" method="post">
                            <input type="submit" name="back" value="Kembali" class="btn-close-modal text-secondary mr-3">
                            <input type="submit" name="next" value="Kirim Bukti Transfer" class="btn-close-modal text-white p-2" style="background-color: #EA5273;color:white">
                        </form>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-xs-12 mt-3 handphone">
            <div class="card p-3">
                <div class="col-sm-12">
                    <div class="row">
                        <ul class="navbar-nav mr-auto text-default">
                            <li class="nav-item active">
                                <div>
                                    <h5 class="text-dark">Pembayaran</h5>
                                    <p style="color: #EA5273;font-size:9pt;">Quick Response Indonesia Standard (QRIS)</p>
                                </div>
                                <div class="collapse" id="collapse-projects">
                                    <p style="margin-bottom: 20px">Mengenai Buku</p>
                                    <p style="margin-bottom: 20px">Tentang Penulis</p>
                                    <p style="margin-bottom: 20px">Whitelist</p>
                                </div>
                            </li>
                        </ul>
                        <span class="navbar-text text-right" style="margin-top: -10px;">
                            <div>
                                <img src="img/qris.svg" class="photo" alt="..." width="20%" />
                            </div>
                        </span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12 text-left">
                            <p>Total Pembayaran</p>
                            <h5 style="color: #EA5273;">Rp. <?php echo number_format($_SESSION['amount']); ?></h5>
                        </div>
                        <div class="col-sm-12 text-center">
                            <div style="display: center">
                                <div class="justify-center mb-3">
                                    <img src="img/<?= $data_qris['account'] ?>" class="photo" alt="..." width="95%" />
                                </div>
                            </div>
                            <h6 style="color: #EA5273;"><b>Note: Nominal pembayaran sudah termasuk dengan tiga angka kode unik dibelakang</b></h6>
                        </div>
                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-sm-12 text-center">
                        <form action="" method="post">
                            <input type="submit" name="back" value="Kembali" class="btn-close-modal text-secondary mr-3">
                            <input type="submit" name="next" value="Kirim Bukti Transfer" class="btn-close-modal text-white p-2" style="background-color: #EA5273;color:white">
                        </form>
                    </div>
                </div>

            </div>

        </div>
    <?php } ?>

    </div>



    </div>
</section>



<?php
include "include/footer.php";
?>