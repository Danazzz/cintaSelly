<?php
include "include/header.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// include library phpmailer
include('plugins/PHPMailer/src/Exception.php');
include('plugins/PHPMailer/src/PHPMailer.php');
include('plugins/PHPMailer/src/SMTP.php');

if (isset($_POST['submit'])) {
  $name = trim(mysqli_real_escape_string($con, $_POST['name']));
  $email = trim(mysqli_real_escape_string($con, $_POST['email']));
  $message = $_POST['message'];
  $currentDateTime = date('Y-m-d H:i:s');

  $result = mysqli_query($con, "INSERT INTO message ( name, email, message, created_at) VALUES ( '$name', '$email', '$message', '$currentDateTime')") or die(mysqli_error($con));
  if ($result) {
    $mail_sender = 'warnawarnicintasm@gmail.com'; // email sender
    $name_sender = 'Warna-warni'; // sender name
    $recipient = 'warnawarnicintasm@gmail.com'; // mail recipient
    $subject = 'Incoming Message From a Customer!'; // mail subject

    $body = "<h3> From $name, $email</h3>
             <pre style='font-size: 12pt;'>
              $message
             </pre>
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
      echo "<script>window.location='index.php';</script>";
    }
  }
}

?>

<section id="contact">
  <div class="row col-sm-10 mx-auto mt-5 mb-5" id="contact-us">
    <div class="col-sm-6">
      <h2><b>Contact&nbsp;Us</b></h2>
      <div class="d-flex flex-row mb-2">
        <img src="img/location.svg" class="mr-4" alt="" />
        <p style="line-height: 40px">
          Dharma Negara Alaya (DNA Art & Creative Hub Denpasar) <br />
          Jl. Mulawarman, Dauh Puri Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80231
        </p>
      </div>
      <div class="d-flex flex-row mt-2">
        <img src="img/call-calling.svg" class="mr-4" alt="" />
        <p style="line-height: 40px">
          0821-4686-8211 (Gung Yoni) <br />
          0823-3944-7329 (Gung Ary) <br />
          0821-4443-0392 (Desy)
        </p>
      </div>
    </div>
    <div class="col-sm-6">
      <h2><b>Tinggalkan&nbsp;Pesan</b></h2>
      <p class="text-justify" style="line-height: 40px; color: #ea5273">Punya pertanyaan? Menemukan Bug? Kami sangat senang mendengar dan menerimanya dari Anda!</p>
      <form action="" method="post">
        <div class="form-row">
          <div class="col-md-12 mb-3">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name" id="name" required />
          </div>
          <div class="col-md-12 mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" required />
          </div>
          <div class="col-md-12 form-group">
            <label for="message">Pesan</label>
            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
          </div>
          <input type="submit" name="submit" value="Kirim&nbsp;Pesan" class="btn-whitelist" />
        </div>
      </form>
    </div>
  </div>
</section>

<?php
include "include/footer.php";
?>  