<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMAILER;
use PHPMailer\PHPMailer\Exception;
use App\Models\egresado;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function email()
    {

        $egresado = new egresado();
        $user_id = Auth::user()->id;


        if (egresado::where('user_id', $user_id)->exists()) {
            return view("app.emailcv");
        } else {
            return view('app.egresado');
        }
    }


    // ========== [ Compose Email ] ================
    public function composeEmail(Request $request)
    {
        $user_id = Auth::user()->id;
        $egresado = egresado::where('user_id', '=', $user_id)->first();

        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);

        try {

            // Email server settings
            $mail->SMTPDebug = 1;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'octubersky2@gmail.com';   //  sender username
            $mail->Password = 'Juni2015';       // sender password contrasena bien? si
            $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
            $mail->Port = 465;                          // port - 587/465

            $mail->setFrom('octubersky2@gmail.com', 'Yo');
            $mail->addAddress('octubersky2@gmail.com');
            $mail->addCC('octubersky2@gmail.com');
            $mail->addBCC('octubersky2@gmail.com');

            $mail->addReplyTo('octubersky2@gmail.com', 'Tu');

            if (isset($_FILES['emailAttachments'])) {
                for ($i = 0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = 'ID: ' . $egresado->id;
            $mail->Body    =  'Nombre: ' . $egresado->nombre .  ' Apellido: ' . $egresado->apellido . ' Cedula: ' . $egresado->cedula;

            // $mail->AltBody = plain text version of email body;

            if (!$mail->send()) {
                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            } else {
                return back()->with("success", "Email has been sent.");
            }
        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent.');
        }
    }
}
