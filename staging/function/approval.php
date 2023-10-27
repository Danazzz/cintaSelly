<?php
require_once "../config/conn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// include library phpmailer
include('../../plugins/PHPMailer/src/Exception.php');
include('../../plugins/PHPMailer/src/PHPMailer.php');
include('../../plugins/PHPMailer/src/SMTP.php');

$id = @$_GET['id'];
$sql = "SELECT * FROM form
WHERE id = '$id'
";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);
$currentDateTime = date('Y-m-d H:i:s');

if ($data['status'] == 'pending') {
  $result = mysqli_query($con, "UPDATE form SET status = 'approved', confirmed_at = '$currentDateTime' WHERE id = '$id'") or die(mysqli_error($con));
  if ($result) {
    $mail_sender = 'warnawarnicintasm@gmail.com'; // email sender
    $name_sender = 'Warna-warni'; // sender name
    $recipient = $data['email']; // mail recipient
    $subject = 'Warna-warni Cinta Selly Fajarini | Konfirmasi Pembayaran Diterima!'; // mail subject

    $date = $data['confirmed_at'];
    $uniqueCode = substr($data['priceUnique'], -3);
    $name = $data['name'];
    $amountNFT = $data['book_amount'];
    $total = number_format($data['priceUnique']);

    $body = "
        <div align='center'>
          <div style='position: relative;display: -ms-flexbox;display: flex;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.125);border-radius: 0.25rem; width:800px;'>
            <table>
              <thead>
                <a href='https://baliola.com/ target=_blank'>
                  <img alt='header' src='https://warnawarni.baliola.com/img/newsletter_header.png' style='width:100%; display: flex; margin: 0 auto;'>
                </a>
              </thead>
              <tbody>
                <div style='padding: 20px'>
                  <br>
                  <h1 style='color: black'>Om Swastiastu,</h1>
                  <h2 style='color: black'>Hai Kak <b style='color: #ea5273'>$name</b> !</h2>
                  <p style='color: black ; font-size: 12pt;'>Berikut ini adalah informasi pembayaran yang telah Anda lakukan di Website https://warnawarni.baliola.com</p>
                  <p style='color: black; font-size: 12pt;'> Tanggal : <b style='color: black'>$date</b></p>
                  <p style='color: black; font-size: 12pt;'>Kode Unik : <b>$uniqueCode</b></p>
                  <hr>
                  <p style='color: black; font-size: 12pt;'>Nama : <b>$name</b></p>
                  <p style='color: black; font-size: 12pt;'>Jumlah NFT Buku : <b>$amountNFT</b></p>
                  <p style='color: black; font-size: 12pt;'>Nominal : Rp. <b style='color: #ea5273'><span style='font-size: 14pt'>$total</span></b></p>
                  <p style='color: black; font-size: 12pt;'>Telah berhasil melakukan Transaksi dan berhak mendapatkan NFT Buku “<b style='color: #ea5273'>Warna-warni Cinta Selly Fajarini</b>” dalam program <i>charity</i> kepada Rumah Berdaya Denpasar. </p>
                  <h1 style='color: black'>Terimakasih.</h1>
                  <br>
                </div>
              </tbody>
              <tfoot>
                <a href= 'https://instagram.com/warnawarni.cinta' target='_blank'>
                  <img alt='footer' src='https://warnawarni.baliola.com/img/newsletter_footer.png' style='width:100%; display: flex; margin: 0 auto;'>
                </a>
              </tfoot>
            </table>
          </div>
        </div>
                ";

    $mail = new PHPMailer;
    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';
    $mail->Username = $mail_sender;
    $mail->Password = 'gzblmmcrwcghycsp'; //password application in gmail
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';

    $mail->setFrom($mail_sender, $name_sender);
    $mail->addAddress($recipient);
    $mail->isHTML(true); //activate when the email type is html
    $mail->Subject = $subject;
    $mail->Body = $body;

    $send = $mail->send(); //send email
    if ($send) {
      echo "<script>alert('Confirmation mail sent!');</script>";
    } else {
      echo "<script>alert('Failed to send confirmation mail!');</script>";
    }
    echo "<script>alert('Customer approved!');window.location='../index.php';</script>";
  }
} elseif ($data['status'] == 'approved') {
  mysqli_query($con, "UPDATE form SET status = 'pending' WHERE id = '$id'") or die(mysqli_error($con));
  echo "<script>alert('Customer unapproved!');window.location='../index.php';</script>";
}
