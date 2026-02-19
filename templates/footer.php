<?php
$items_footer = [];
if ($config["footer"]["copyright_text"]) {
    $items_footer[] = $config["footer"]["copyright_text"];
}
if ($config["privacy_policy"]["display"]) {
    $items_footer[] = "<a href=\"politica-de-privacidad.php\">" . $config["privacy_policy"]["link_text"] . "</a>";
}
?>
<footer>
    <div id="data-contact" class="row">
        <?php if($config["footer"]["whatsapp"]["display"]) { ?>
            <div class="col-lg-4 col-sm-6 col-xs-12 text-center">
                <a href="https://wa.me/<?php echo $config["footer"]["whatsapp"]["link_number"]; ?>" class="btn mb-3 <?php echo $config["footer"]["whatsapp"]["class"]; ?>" target="_blank">
                    <table>
                        <tr>
                            <td><?php echo $config["footer"]["whatsapp"]["icon"]; ?></td>
                            <td rowspan="3">
                                <?php echo $config["footer"]["whatsapp"]["qr_code"] ? '<img src="aux_files/img_site/' . $config["footer"]["whatsapp"]["qr_code"] . '" class="rounded ml-2" />' : ""; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $config["footer"]["whatsapp"]["display_number"]; ?></td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                    </table>
                </a>
            </div>
        <?php }?>

        <?php if($config["footer"]["location"]["display"]) { ?>
            <div class="col-lg-4 col-sm-6 col-xs-12 text-center">
                <a href="<?php echo $config["footer"]["location"]["link"]; ?>"
                    class="btn mb-3 <?php echo $config["footer"]["location"]["class"]; ?>" target="_blank">
                    <table>
                        <tr>
                            <td><?php echo $config["footer"]["location"]["icon"]; ?></td>
                            <td rowspan="3">
                                <?php echo $config["footer"]["location"]["qr_code"] ? '<img src="aux_files/img_site/' . $config["footer"]["location"]["qr_code"] . '" class="rounded ml-2" />' : ""; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $config["footer"]["location"]["display_text"]; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $config["footer"]["location"]["display_number"]; ?></td>
                        </tr>
                    </table>
                </a>
            </div>
        <?php } ?>

        <?php if($config["footer"]["email_ventas"]["display"]) { ?>
            <div class="col-lg-4 col-sm-6 col-xs-12 text-center">
                <a href="<?php echo $config["footer"]["email_ventas"]["link"]; ?>" class="btn <?php echo $config["footer"]["email_ventas"]["class"]; ?> mb-3" target="_blank">
                    <?php echo $config["footer"]["email_ventas"]["icon"]; ?> <br />
                    <?php echo $config["footer"]["email_ventas"]["display_text"]; ?>
                </a>
            </div>
        <?php }?>

    </div>
    <div class="text-center">
        <?php
        echo implode(" | ", $items_footer);
        ?>
    </div>
</footer>
