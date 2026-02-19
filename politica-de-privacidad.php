<?php
session_start();
require_once "config.php";
require_once "index_helper.php";

[$nombre, $email, $mensaje, $errors] = prepare_and_send_mail();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $config["site"]["name"]; ?></title>
    <link rel="icon" type="image/png" href="<?php echo "aux_files/img_site/" . $config["site"]["favicon"]; ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="aux_files/extrastyles.css" />
</head>

<body>
    <main class="container position-relative">

        <?php include "templates/header.php" ?>

        <?php echo readfile("aux_files/" . $config["privacy_policy"]["file"]); ?>

    </main>

    <div class="container">
        <?php include "templates/footer.php" ?>
    </div>

    <?php include "templates/mensaje.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php
    if(isset($errors["alert_general"]) && count($errors["alert_general"]) > 0) {
        foreach($errors["alert_general"] as $msg) {
            ?><script type="text/javascrip">alert(`<?php echo $msg; ?>`);</script><?php
        }
    }
    ?>
</body>

</html>
