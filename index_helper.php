<?php
require_once "config.php";

function rand_char(): string {
    return chr(rand(0, 1) ? rand(97, 122) : rand(48, 57));
}
function generate_captcha_txt(): string
{
    $len = random_int(5, 5);
    $captcha = "";
    while( strlen( $captcha ) < $len ) {
        $captcha .= rand_char();
    }
    return $captcha;
}

function generate_captcha(): array {
    $captcha = generate_captcha_txt();
    $img = imagecreatetruecolor(200, 30);
    $rgb_fondo = [rand(180, 200), rand(175, 195), rand(150, 170)];
    $bg = imagecolorallocate($img, $rgb_fondo[0], $rgb_fondo[1], $rgb_fondo[2]);
    $fg = imagecolorallocate($img, 156, 71, 145);
    imagefill($img, 0, 0, $bg);
    $ac = 15;
    for($x = 0; $x <= 5; $x++) {
        imagestring(
            $img, 5, rand(0, 100), rand(0, 35), generate_captcha_txt(),
            imagecolorallocate($img, $rgb_fondo[0] + rand(-$ac, $ac), $rgb_fondo[1] + rand(-$ac, $ac), $rgb_fondo[2] + rand(-$ac, $ac)));
    }
    imagestring($img, 5, rand(5, 70), rand(5, 15), $captcha, $fg);
    return [$captcha, $img];
}

function evaluate_captcha($codigo): bool {
    return $_SESSION["captcha"] == hash("sha256", $codigo);
}

function get_var($var, $default="", $function=null): mixed {
    $value = $default;
    if(isset($_POST[$var]) && $_POST[$var] != "") {
        $value = $_POST[$var];
    } else if(isset($_GET[$var]) && $_GET[$var] != "") {
        $value = $_GET[$var];
    }
    return $function ? $function($value) : $value;
}

function prepare_and_send_mail(): array {
    global $config;
    $nombre = "";
    $email = "";
    $mensaje = "";
    $errores = ['alert_general' => [], 'frmContacto' => []];
    if(get_var("send_message") == "yes") {
        $nombre = get_var("nombre");
        $email = get_var("email");
        $mensaje = get_var("mensaje");
        if(evaluate_captcha(get_var("codigo"))) {
            $msg = <<<MESSAGETEXT
            Nombre: $nombre
            Correo Electrónico: $email

            Mensaje:
            $mensaje
            MESSAGETEXT;
            $archivos = [];
            for($x = 1; $x <= 5; $x++) {
                if(isset($_FILES["archivo$x"]) && count($_FILES["archivo$x"]) > 0 && $_FILES["archivo$x"]['error'] == UPLOAD_ERR_OK) {
                    $archivos[] = $_FILES["archivo$x"];
                }
            }
            if (send_custom_mail($msg, $email, $archivos)) {
                $errores["alert_general"][] = $config["mail"]["msg_envio_exitoso"];
                $nombre = "";
                $email = "";
                $mensaje = "";
            } else {
                $errores["frmContacto"][] = $config["mail"]["msg_error_envio"];
                $err_msg = error_get_last()['message'];
                if ($err_msg != "") {
                    $errores["frmContacto"][] = $err_msg;
                }
            }
        } else {
            $errores["frmContacto"][] = $config["mail"]["msg_error_captcha"];
        }
    }
    return [$nombre, $email, $mensaje, $errores];
}

function send_custom_mail($msg, $from, $attachments): bool {
    global $config;
    if(count($attachments) == 0) {
        return mail(
            $config["mail"]["to"],
            $config["mail"]["subject"], $msg,
            "From: $from");
    }

    $boundary = "PHP-mixed-" . md5(time());
    $boundWithPre = "\n--" . $boundary;

    $headers = "From: $from";
    $headers .= "\nReply-To: $from";
    $headers .= "\nMIME-Version: 1.0\nContent-Type: multipart/mixed; boundary=\"" . $boundary . "\"";


    $message = $boundWithPre;
    $message .= "\n Content-Type: text/plain; charset=UTF-8";
    $message .= "\n Content-Transfer-Encoding: 7bit";
    $message .= "\n $msg";

    foreach($attachments as $attachment) {
        $message .= $boundWithPre;
        $message .= "\nContent-Type: application/octet-stream; name=\"" . $attachment['name'] . "\"";
        // $message .= "\nContent-Type: " . $attachment['type'] . "; name=\"" . $attachment['name'] . "\"";
        $message .= "\nContent-Disposition: attachment;\n" . " filename=\"" . $attachment['name'] . "\"";
        $message .= "\nContent-Transfer-Encoding: base64\n\n";
        $message .= chunk_split((base64_encode(file_get_contents($attachment['tmp_name']))));
        $message .= "\n\n";
        unlink($attachment['tmp_name']);
    }
    // $message .= $boundWithPre."--";
    $message .= $boundWithPre;

    return mail(
        $config["mail"]["to"],
        $config["mail"]["subject"], $message,
        "From: $from");
}
