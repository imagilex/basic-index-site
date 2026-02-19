<?php
session_start();
require_once "config.php";
require_once "index_helper.php";

$banner_files_dir = "aux_files/" . $config["banner_files_dir"];

[$nombre, $email, $mensaje, $errors] = prepare_and_send_mail();

$banner_files = array();
foreach (scandir($banner_files_dir) as $f) {
    if ($f != "." && $f != "..") {
        $banner_files[] = $f;
    }
}
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

        <?php
        if(count($banner_files) == 0){
            ?>
            <div class="alert alert-warning" role="alert">
                No se han encontrado imágenes para el banner principal.
            </div>
            <?php
        }
        else if(count($banner_files) == 1){
            ?>
            <div class="mb-3">
                <img src="<?php echo $banner_files_dir . "/" . $banner_files[0]; ?>" class="d-block w-100" />
            </div>
            <?php
        }
        else{
            ?>
            <div id="main-banner" class="carousel slide mb-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    foreach ($banner_files as $i => $f) {
                    ?>
                        <div class="carousel-item <?php echo ($i == 0 ? 'active' : ''); ?>">
                            <img src="<?php echo $banner_files_dir . "/" . $f; ?>" class="d-block w-100" />
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#main-banner" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#main-banner" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
            <?php
        }
        ?>

    </main>

    <div class="container">
        <?php include "templates/footer.php" ?>
    </div>

    <?php include "templates/mensaje.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <?php
    if (isset($errors["alert_general"]) && (count($errors["alert_general"]) > 0)) {
        foreach ($errors["alert_general"] as $msg) {
            ?><script type="text/javascript">alert(`<?php echo $msg; ?>`);</script><?php
        }
    }
    ?>
</body>

</html>
