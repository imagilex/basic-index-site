<?php
session_start();

require_once "index_helper.php";

if(get_var("action") == "create_captcha") {
    [$ch, $im] = generate_captcha();
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header('Content-type: image/png');
    imagepng($im);
    imagedestroy($im);
    $_SESSION["captcha"] = hash("sha256", $ch);
}
