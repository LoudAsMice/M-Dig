<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../assets/vendor/PHPMailer/src/Exception.php';
require '../assets/vendor/PHPMailer/src/PHPMailer.php';
require '../assets/vendor/PHPMailer/src/SMTP.php';
    $header = "Permohonan pembuatan surat anda telah diterima";
    $body = '<!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <!--[if mso]>
    <noscript>
        <xml>
        <o:OfficeDocumentSettings>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        table, td, div, h1, p {font-family: Arial, sans-serif;}
    </style>
    </head>
    <body style="margin:0;padding:0;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
        <td align="center" style="padding:0;">
            <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
            <tr>
                <td align="center" style="padding:40px 0 30px 0;background:#70bbd9;">
                <img src="https://i.ibb.co/mHBzxyz/h1.png" alt="" width="300" style="height:auto;display:block;" />
                </td>
            </tr>
            <tr>
                <td style="padding:36px 30px 42px 30px;">
                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                    <tr>
                    <td style="padding:0 0 36px 0;color:#153643;">
                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Hallo '.$login[0]['nama'].',</h1>
                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Saat ini permintaan pembuatan surat kamu sudah kami diterima. Silahkan tunggu info selanjutnya ya</p>
                        <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><p>Apa yang harus dilakukan selanjutnya? Simak yuk</p></p>
                    </td>
                    </tr>
                    <tr>
                    <td style="padding:0;">
                        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                        <tr>
                            <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                            <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://assets.codepen.io/210284/left.gif" alt="" width="260" style="height:auto;display:block;" /></p>
                            <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Surat kamu akan diproses oleh aparatur desa, dalam waktu yang telah ditentukan.</p>
                            <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"></p>
                            </td>
                            <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                            <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                            <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://assets.codepen.io/210284/right.gif" alt="" width="260" style="height:auto;display:block;" /></p>
                            <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Apabila waktunya telah tiba, maka kamu akan diinfokan melalui email untuk mengambil Surat yang telah dicetak ke Kelurahan.</p>
                            <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"></p>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td style="padding:30px;background:#ee4c50;">
                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                    <tr>
                    <td style="padding:0;width:50%;" align="left">
                        <a href="https://hollateam.site" style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                        &reg; HollaTeam 2022<br/>
                        </a>
                    </td>
                    <td style="padding:0;width:50%;" align="right">
                        <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                        <tr>
                            <td style="padding:0 0 0 10px;width:38px;">
                            <a href="https://instagram.com/hollateam.id" style="color:#ffffff;">Instagram</a>
                            </td>
                            <td style="padding:0 0 0 10px;width:38px;">
                            <a href="https://hollateam.site/" style="color:#ffffff;">Website</a>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            </table>
        </td>
        </tr>
    </table>
    </body>
    </html>';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'mail.hollateam.site';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'info@hollateam.site';
$mail->Password = 'informasi@123#';
$mail->setFrom('info@hollateam.site', 'Informasi M-Dig');
$mail->addReplyTo('jangan-dibalas@hollateam.site', 'Jangan Dibalas');
$mail->addAddress($login[0]['email']);
$mail->Subject = $header;
$mail->msgHTML($body);

if (!$mail->send()) {
return 'Mailer Error: ' . $mail->ErrorInfo;
} else {
return 'The email message was sent.';
}
?>