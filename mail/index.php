<?php

    require ("mail/phpmailer/PHPMailerAutoload.php");
    $mail = new PHPMailer();
    if(isset($_POST['submit'])){
        $name=$_POST['w31Name']; // Get Name value from HTML Form
        $mobile=$_POST['w31Number'];  // Get Mobile No
        $email=$_POST['w31Sender'];  // Get Email Value
        $message=$_POST['w3lMessage']; // Get Message Value




        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com"; // Your Domain Name

        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Username = "golu.ramkrishnanagar@gmail.com"; // Your Email ID
        $mail->Password = "Goluneha#143; // Password of your email id

        $mail->From=($_POST['w3lSender']);
        $mail->FromName =($_POST['w31Name']);
        $mail->AddAddress ("apurva143N@gmail.com"); // On which email id you want to get the message
        $mail->AddCC ($email);

        $mail->IsHTML(true);

        $mail->Subject = "Enquiry from Website submitted by $w31Name"; // This is your subject

        // HTML Message Starts here

        $mail->Body = "
        <html>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Name: </strong></td>
                            <td style='width:400px'>$w31Name</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email ID: </strong></td>
                            <td style='width:400px'>$w31Sender</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Mobile No: </strong></td>
                            <td style='width:400px'>$w31Number</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Message: </strong></td>
                            <td style='width:400px'>$w31Message</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </html>
        ";
        // HTML Message Ends here


        if(!$mail->Send()) {
            // Message if mail has been sent
            echo "<script>
                alert('Submission failed.');
            </script>";
        }
        else {
            // Message if mail has been not sent
            echo "<script>
                alert('Email has been sent successfully.');
            </script>";
        }

    }
?>
