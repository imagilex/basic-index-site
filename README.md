# basic-index-site
Index base para sitios básicos estaticos

## Implementación dev/local

### Ubuntu

#### LAMP:

1. Abre el archivo de configuración con privilegios:

```bash
sudo nano /opt/lampp/etc/httpd.conf
```

2. Ve al final del archivo y pega el siguiente bloque de código:

```Apache
Alias /basic-index-site "/ruta/al/proyecto/basic-index-site"

<Directory "/ruta/al/proyecto/basic-index-site">
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```
3. Ajustar Permisos de Carpeta

Apache necesita permiso para "entrar" en tu carpeta del proyecto (usualmente carpetas personales).

Ejecuta esto para dar permisos de lectura y ejecución a otros usuarios (solo en las carpetas necesarias). En caso de que las carpetas no tengas ya el permiso de ejecución:

Suponiendo que la carpeta del proyecto esta en `/home/user/dev/basic-index-site`

```Bash
chmod 755 /home/user
chmod 755 /home/user/dev
chmod -R 755 /home/user/dev/basic-index-site
```

4. Reiniciar Apache

Para que los cambios surtan efecto, reinicia los servicios:

```Bash
sudo /opt/lampp/lampp restart
```

El sitio quedará disponible en http://localhost/basic-index-site/

## Implementación en producción

1. Mover archivos base al servidor

2. Crear el archivo de configuraciones `config.php` con base en `config.example.php`

1. Colocar en el directorio `aux_files` archivos propios del proyecto, que no deben tener seguimiento para con el proyecto

* `aux_files/img_site` para archivos en formato imagen del proyecto.
* `aux_files/index_banner` para archivos en formato imagen banner principal.
* `aux_files/extrastyles.css` para estilos propios del sitio
