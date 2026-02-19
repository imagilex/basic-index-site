<header>
    <nav class="navbar navbar-light">
        <div class="container">
            <?php if(isset($config["header"]["logo"]) && $config["header"]["logo"]): ?>
            <a class="navbar-brand" href="/">
                <img src="aux_files/img_site/<?php echo $config["header"]["logo"]; ?>" alt="<?php echo $config["site"]["name"]; ?>" />
            </a>
            <?php endif; ?>
            <div></div>
            <div class="d-flex">
                <div id="link-nav-bar" class="btn-group">
                    <?php foreach($config["header"]["nav_links"] as $link): ?>
                        <?php if(isset($link["type"]) && $link["type"] == "link"): ?>
                            <a href="<?php echo $link["href"]; ?>" class="btn <?php echo $config["header"]["nav_item_class"]; ?>">
                                <?php echo $link["text"]; ?>
                            </a>
                        <?php endif; if(isset($link["type"]) && $link["type"] == "contact_button"): ?>
                            <button type="button" class="btn <?php echo $config["header"]["nav_item_class"]; ?>"
                                data-bs-toggle="collapse" data-bs-target="#frmContacto"
                                aria-expanded="<?php echo (isset($errors["frmContacto"]) && count($errors["frmContacto"]) > 0) ? "true" : "false"; ?>"
                                aria-controls="collapseFrmContacto" title="Contacto">
                                <?php echo $link["text"]; ?>
                            </button>
                        <?php endif; ?>
                    <?php endforeach?>
                </div>
            </div>
        </div>
    </nav>
</header>
