<?php 
    use PHPMailer\PHPMailer\PHPMailer;

    require_once "PHPMailer.php";
    require_once "SMTP.php";
    require_once "Exception.php";

    $mail = new PHPMailer;

    $email =  $emails;
    $names = "INQUIRE UNIFORM";

    //SMTP Settings
    $mail->SMTPDebug = 0; 

    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "pedepartment2@gmail.com";
    $mail->Password = "agvelodddtufzvgy";
    $mail->Port = 587; //465 for ssl and 587 for tls
    $mail->SMTPSecure = "tls";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $names);
    $mail->addAddress($emails);
    $mail->Subject = "TUPC - P.E DEPARTMENT";
    $mail->Body = 'Good day,'.' '.'We would like to Inform you that you have successfully submitted your request in inquiring uniform. We will email you for the later updates. Thank you have nice day.';


    if ($mail->send())
        // echo "Mail Sent";

?>