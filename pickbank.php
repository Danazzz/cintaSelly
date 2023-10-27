<?php
include "include/header.php";
error_reporting(0);

if ($_SESSION['count'] == "") {
    echo "<script>alert('fill the nft count')</script>";
    header('Location: order.php');
}

if ($_POST) {
    if ($_POST["bank"] == 'bca') {
        $_SESSION["choose_bank"] = "bca";
        $_SESSION["count"] = $_POST["jml"];
        $_SESSION["amount"] = $_POST["amount"];
        header('Location: paybank.php');
    } else if ($_POST["bank"] == 'bpd') {
        $_SESSION["choose_bank"] = "bpd";
        $_SESSION["count"] = $_POST["jml"];
        $_SESSION["amount"] = $_POST["amount"];
        header('Location: paybank.php');
    } else if ($_POST["bank"] == 'qris') {
        $_SESSION["choose_bank"] = "qris";
        $_SESSION["count"] = $_POST["jml"];
        $_SESSION["amount"] = $_POST["amount"];
        header('Location: paybank.php');
    } else if (isset($_POST['back'])) {
        unset($_SESSION['count']);
        header('Location: order.php');
    }
    // $_SESSION["choose_bank"] = "1";
    // $_SESSION["count"] = $_POST["jmltxt"];
    // header('Location: pickbank.php');
    // echo $_SESSION["favcolor"];
}
?>

<section id="order" class="mb-5">
    <div class="container">
        <div class="row p-4">
            <div class="col-sm-12 mt-5">
                <h3>Pilih bank tujuan</h3>
                <p>Pilih salah satu bank yang akan anda gunakan untuk membayar NFT Warna Warni Cinta Selly Fajarini. Teknis pembayaran NFT akan dijelaskan lebih lanjut pada halaman berikutnya</p>
            </div>
            <div class="col-sm-12 row justify-content-around">
                <div class="col-sm-3 mt-3 text-center" style="border: 1px solid #CACBCC; padding: 50px">
                    <img src="img/bankBCA.svg" alt="" />
                    <h5 class="mt-5">Transfer Bank BCA</h5>
                    <p>
                        Bank Central Asia <br />
                        a/n Baliola
                    </p>
                    <form action="" method="post">
                        <div class="">
                            <div>
                                <input type="hidden" value="bca" name="bank">
                                <input type="hidden" value="<?php echo $_SESSION['count'] ?>" name="jml">
                                <input type="hidden" value="<?php echo $_SESSION['amount'] ?>" name="amount">
                            </div>
                            <br>
                            <div class="">
                                <button type="submit" class="btn-whitelist">Pilih</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3 mt-3 text-center" style="border: 1px solid #CACBCC; padding: 50px">
                    <img src="img/qris.svg" alt="" />
                    <h5 class="mt-5">Scan QRIS</h5>
                    <p>
                        Quick Response Indonesia Standard <br />
                        a/n Warna Warni Cinta
                    </p>
                    <form action="" method="post">
                        <input type="hidden" value="qris" name="bank">
                        <input type="hidden" value="<?php echo $_SESSION['count'] ?>" name="jml">
                        <input type="hidden" value="<?php echo $_SESSION['amount'] ?>" name="amount">
                        <br>
                        <button type="submit" class="btn-whitelist">Pilih</button>
                    </form>
                </div>
                <div class="col-sm-3 mt-3 text-center" style="border: 1px solid #CACBCC; padding: 50px">
                    <img src="img/bankBPD.svg" alt="" />
                    <h5 class="mt-5">Transfer Bank BPD</h5>
                    <p>
                        Bank Pembangunan Daerah Bali <br />
                        a/n Baliola
                    </p>
                    <form action="" method="post">
                        <input type="hidden" value="bpd" name="bank">
                        <input type="hidden" value="<?php echo $_SESSION['count'] ?>" name="jml">
                        <input type="hidden" value="<?php echo $_SESSION['amount'] ?>" name="amount">
                        <button type="submit" class="btn-whitelist">Pilih</button>
                    </form>
                </div>
            </div>
            <div class="mx-auto mt-5">
                <form action="" method="post">
                    <input type="submit" name="back" value="Kembali" class="btn-close-modal text-secondary">
                </form>
            </div>
        </div>
    </div>
</section>





<?php
include "include/footer.php";
?>