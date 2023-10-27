<?php
include "include/header.php";
error_reporting(0);
var_dump($_SESSION["choose_bank"]);

if ($_POST) {
    // session_start();
    // var_dump($_POST);
    // echo "<script>alert('fill the nft count')</script>";
    // die;
    $_SESSION["choose_bank"] = "1";
    $_SESSION["count"] = $_POST["jml"];
   
    //Unique Code
    $amount = $_POST['jml'];
    $total_amount = ($amount * 500000) + rand(100, 999);

    //validasi
    $i = 1;
    while ($i >= 1) {
        $sql = "SELECT * FROM uniq_code WHERE total = '$total_amount'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $i++;
        } else {
            $query = mysqli_query($con, "INSERT INTO uniq_code (total) VALUE ('$total_amount')");
            if ($query) {
                $query2 = mysqli_query($con, "SELECT * FROM uniq_code
            WHERE total ='$total_amount'");
                if (mysqli_num_rows($query2) > 0) {
                    $_SESSION["amount"] = $total_amount;
                    $i = 0;
                }
            } else {
                echo "Something went wrong";
                $i = 0;
            }
        }
    }
  
}
 else {
    //  var_dump($_POST);
    echo "<script>alert('fill the nft count')</script>";
}
?>

<section id="order" class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-5">
                <h3>Jumlah NFT</h3>
                <p>Masukan nominal NFT Buku Warna Warni Cinta Selly Fajarini yang ingin anda beli</p>

                <div class="d-flex align-items-center">
                    <img src="img/book3.svg" alt="" style="margin-right: 20px;" />
                    <div>
                        <h5>Warna Warni Cinta Selly Fajarini</h5>
                        <p style="color: #ea5273">Rp. 500,000 / NFT</p>
                    </div>
                </div>
                <form action="" method="post">
                    <label for="amount">Jumlah NFT yang dibeli</label>
                    <!-- <input type="number" onkeydown="return true" max="999" min="0" name="amount" class="form-control" id="input_amount" value="getCurrentAmount()" onchange="onAmountChange(this.value)" required /> -->
                    <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jml" id="jml" min="1" value="1" required>
                    <!-- <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jmltxt" id="jmltxt" min="1" value="1"> -->
                    <input type="text" class="form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jmltxt" placeholder="Konversi (RP)" id="jmltxt" readonly><br>


                    <p class="mt-2" id="msg">Total yang harus dibayar sebesar</p>
                    <!-- <div id="msg"></div> -->
                    <h3 style="color: #ea5273" id="msg2">Rp. 500,000</h3>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="index.php" class="btn-close-modal text-secondary">Kembali ke beranda</a>
                <button type="submit" class="btn-whitelist">Lanjutkan</button>
            </div>
        </div>

        </form>

    </div>
    </div>
</section>





<?php
include "include/footer.php";
?>


<script>
    $('#jml').keyup(function() {
        $('#jmltxt').val(rubah($(this).val() * 500000));
        // $("#msg").appendTo($(this).val() * 500000);
        // $("#msg").val($(this).val() * 500000);
        $("#msg2").text("Rp " + rubah($(this).val() * 500000));
        // $("Rp " + " " + rubah($(this).val() * 500000)).appendTo('#msg');
        // $('<p>' + $(this).val() * 500000) + '</p>'.appendTo('#msg');
    });

    function rubah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join(',').split('').reverse().join('');
        return ribuan;
    }
</script>