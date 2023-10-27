<?php
include "include/header.php";
error_reporting(0);

if ($_SESSION['count'] == "") {
    echo "<script>alert('fill the nft count')</script>";
    header('Location: order.php');
}
if ($_SESSION['choose_bank'] == "") {
    echo "<script>alert('please choose bank first')</script>";
    header('Location: pickbank.php');
}
if ($_SESSION['paybank'] == "") {
    header('Location: paybank.php');
}

if ($_POST) {

    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    $name = trim(mysqli_real_escape_string($con, $_POST['name']));
    $phone_number = trim(mysqli_real_escape_string($con, $_POST['phone_number']));
    $amount = $_SESSION['count'];
    $price = $_SESSION['amount'];
    $bank = $_SESSION['choose_bank'];
    $path = "storage/img/";
    $image = upload($path);
    if (!$image) {
        return false;
    }
    $currentDateTime = date('Y-m-d H:i:s');

    $result = mysqli_query($con, "INSERT INTO form ( name, wallet, email, phone_number, book_amount, hide, receive_book, status, image, priceUnique, bank, created_at, confirmed_at) VALUES ( '$name','0', '$email', '$phone_number', '$amount', 'no', 'no', 'pending', '$image', '$price', '$bank', '$currentDateTime','$currentDateTime')") or die(mysqli_error($con));

    if ($result) {
        if (file_exists($path . $image)) {
            unset($_SESSION['choose_bank']);
            unset($_SESSION['count']);
            unset($_SESSION['amount']);
            unset($_SESSION['paybank']);

            echo "<script>alert ('Coba lagi untuk upload gambarnya')</script>";
            header('Location: thanks.php');
        } else {
            echo "<script>alert ('Coba lagi untuk upload gambarnya')</script>";
        }
    } else {
        header('Location: konfirmasi.php');
    }
}

?>

<section id="order" class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-5">
                <h3>Konfirmasi Pembayaran</h3>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="phone_number">Nomor Telepon</label>
                                <input type="tel" class="form-control" name="phone_number" placeholder="+62xxxxxxxxxxx" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="amount">Nominal NFT yang dibeli</label>
                                <input type="number" class="form-control" name="amount" id="amount" value="<?php echo $_SESSION["count"] ?>" min="1" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="price">Total Pembayaran</label>
                                <br>
                                <!-- <input type="hidden" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="" min="1" value="1"> -->
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="price" min="1" value="Rp. <?php echo number_format($_SESSION['amount']) ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-5 custom-file">
                                <label for="image">Upload Bukti Pembayaran</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <a href="index.php" class="btn-close-modal text-secondary p-2">Kembali ke beranda</a>
                                <input type="submit" name="add" value="Pilih" class="btn-whitelist" onsubmit="resetForm(this.form)"></input>
                                <!-- <button type="submit" class="btn-whitelist p-2">Lanjutkan</button> -->
                            </div>
                        </div>

                        <!-- <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jml" id="jml" min="1" value="1" required>
                        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jmltxt" id="jmltxt" min="1" value="1">
                        <input type="text" class="form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jmltxt" placeholder="Konversi (RP)" id="jmltxt" readonly><br> -->

                        <!-- 
                        <p class="mt-2" id="msg">Total yang harus dibayar sebesar</p> -->
                        <!-- <div id="msg"></div> -->
                        <!-- <h3 style="color: #ea5273" id="msg2">Rp. 500.000</h3> -->


                    </div>
                </form>
            </div>
        </div>
    </div>
</section>





<?php
include "include/footer.php";
?>


<script>
    $('#jml').keyup(function() {

        $('#jmltxt2').val(rubah($(this).val() * 500000));
        $('#jmltxt').val($(this).val() * 500000);
        // $("#msg").appendTo($(this).val() * 500000);
        // $("#msg").val($(this).val() * 500000);
        $("#msg2").text("Rp " + rubah($(this).val() * 500000));
        // $("Rp " + " " + rubah($(this).val() * 500000)).appendTo('#msg');
        // $('<p>' + $(this).val() * 500000) + '</p>'.appendTo('#msg');
    });

    function rubah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }
</script>