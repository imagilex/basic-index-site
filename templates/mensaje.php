<form action="" autocomplete="off" method="post" enctype="multipart/form-data"
    class="<?php echo (isset($errors["frmContacto"]) && count($errors["frmContacto"]) > 0) ? "" : "collapse"; ?> position-fixed bottom-0 end-0 m-3 p-3"
    id="frmContacto" tabindex="-1" aria-hidden="<?php echo (isset($errors["frmContacto"]) && count($errors["frmContacto"]) > 0) ? "false" : "true"; ?>">
    <input type="hidden" name="send_message" value="yes" />
    <div class="frmContactoHeader">
        <h5 class="text-light p-3" id="frmContactoLabel">
            <button type="button" class="btn btn-outline-light btn-sm float-end border-0" data-bs-toggle="collapse" data-bs-target="#frmContacto" aria-label="Cerrar">
                <i class="fa-solid fa-xmark"></i>
            </button>
            Enviar un Mensaje
        </h5>
    </div>
    <div class="frmContactoBody">
        <div>
            <?php
            if(isset($errors["frmContacto"]) && count($errors["frmContacto"]) > 0) {
                foreach($errors["frmContacto"] as $msg) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $msg; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" name="nombre" required="required" value="<?php echo $nombre; ?>" />
                    <label for="floatingInput">Nombre:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" required="required" value="<?php echo $email; ?>" />
                    <label for="floatingInput">Dirección de Correo Electrónico:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="codigo" name="codigo" required="required" />
                    <label for="floatingInput">Código de Verificación:</label>
                </div>
                <div class="mb-3 text-center"><img src="index_captcha.php?action=create_captcha" alt="captcha" class="rounded" /></div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required="required" onfocus="this.select();"><?php echo $mensaje ? $mensaje : "¿Cómo te podemos ayudar?"; ?></textarea>
                    <!--<label for="floatingInput">¿Cómo te podemos ayudar?</label>-->
                </div>
            </div>
            <div class="col collapse" id="fileFields">
                <fieldset class="p-3 rounded mb-3">
                    <legend>Archivo Adjunto:</legend>
                    <input type="file" class="form-control" id="archivo1" name="archivo1" />
                    <input type="file" class="form-control" id="archivo2" name="archivo2" />
                    <input type="file" class="form-control" id="archivo3" name="archivo3" />
                    <input type="file" class="form-control" id="archivo4" name="archivo4" />
                    <input type="file" class="form-control" id="archivo5" name="archivo5" />
                </fieldset>
            </div>
        </div>
        <div class="text-end">
            <button type="button" class="btn text-light btn-secondary" data-bs-toggle="collapse" data-bs-target="#fileFields" aria-expanded="false" aria-controls="collapseFileFields">
                Adjuntar archivos
            </button>
            <button type="submit" class="btn text-light btn-send">Enviar</button>
        </div>
    </div>
</form>
