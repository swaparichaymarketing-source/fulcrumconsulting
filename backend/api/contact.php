<?php
header("Access-Control-Allow-Origin: https://fulcrumconsulting.in");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../phpmailer/src/Exception.php";
require "../phpmailer/src/PHPMailer.php";
require "../phpmailer/src/SMTP.php";

$data = json_decode(file_get_contents("php://input"), true);

$name    = trim($data["name"] ?? "");
$email   = trim($data["email"] ?? "");
$message = trim($data["message"] ?? "");

if (!$name || !$email || !$message) {
  echo json_encode(["status" => "error", "message" => "Missing fields"]);
  exit;
}

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = "smtp.zoho.in";
    $mail->SMTPAuth   = true;
    $mail->Username   = "amrit@fulcrumconsulting.in";
    $mail->Password   = "QPcb88zbbjr1";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

  $mail->SMTPKeepAlive = false;  // prevents connection reuse issue
  $mail->Timeout = 15;           // prevents hanging

  $mail->setFrom("amrit@fulcrumconsulting.in", "Fulcrum Consulting");
  $mail->addReplyTo($email, $name);
  $mail->addAddress("geet@fulcrumconsulting.in");

  $mail->Subject = "New Website Query";
  $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$message";


$mail->SMTPDebug = 2;
$mail->Debugoutput = function($str, $level) {
    error_log("SMTP DEBUG: $str");
};
  $mail->send();
  $mail->smtpClose(); // 🔥 important

  echo json_encode(["status" => "success"]);

} catch (Exception $e) {
  echo json_encode([
    "status" => "error",
    "errorInfo" => $mail->ErrorInfo,
    "exception" => $e->getMessage()
  ]);
}