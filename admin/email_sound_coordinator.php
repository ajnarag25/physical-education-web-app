<?php 
    use PHPMailer\PHPMailer\PHPMailer;

    require_once "PHPMailer.php";
    require_once "SMTP.php";
    require_once "Exception.php";

    $mail = new PHPMailer;

    $email =  $emails;
    $names = "APPROVAL FOR ".$student_names;

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
    $mail->Body = 'Good day,'.' '.'We would like to inform you that this student:'." ".$student_names." ".'. Will reserving a particular facility inside the campus and they need a sound system. We would like to know if you are approving or declining the request. Here is the link for the approval: '.'http://localhost/physical_education_web_app/admin/confirmationsound.php?id='.$ids.'&email='.$emails;


    if ($mail->send())
        // echo "Mail Sent";

?>