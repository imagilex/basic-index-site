<?php
$config = [
    // Imagenes del banner principal, ruta dentro de aux_files
    "banner_files_dir" => "index_banner",

    // Configuración general del sitio
    "site" => [
        "name" => "..:: SITE NAME ::..",
        // favicon, ruta dentro de aux_files/img_site
        "favicon" => "favicon.png",
    ],

    // Encabezado de la Página
    "header" => [
        // Ruta dentro de aux_files/img_site
        "logo" => false, // "logo.png"
        "nav_item_class" => "btn-outline-secondary",
        "nav_links" => [
            [
                "type" => "link|contact_button",
                "text" => 'LINK TEXT',
                "href" => "LINK URL",
            ],
        ],
    ],

    // Pie de Página
    "footer" => [
        "whatsapp" => [
            "display" => true,
            "link_number" => "+521NUMEBR", // Número en formato internacional sin espacios ni guiones
            "display_number" => "(MX) NUMEBR", // Número en formato legible para mostrar
            "icon" => '<i class="fa-brands fa-whatsapp fa-2xl"></i>',
            "class" => "btn-outline-success",
            // Ruta dentro de aux_files/img_site
            "qr_code" => "qr_whats.png",
        ],
        "location" => [
            "display" => true,
            "link" => "GOOGLE MAPS LINK",
            "display_text" => "LOCATION TEXT",
            "icon" => '<i class="fa-solid fa-map-location-dot fa-2xl"></i>',
            "class" => "btn-outline-danger",
            // Ruta dentro de aux_files/img_site
            "qr_code" => "qr_loc.png",
            "display_number" => "(MX) NUMEBR", // Número en formato legible para mostrar
        ],
        "email_ventas" => [
            "display" => true,
            "link" => "mailto:MAIL_ADDRESS",
            "display_text" => "MAIL_ADDRESS",
            "icon" => '<i class="fa-solid fa-envelope fa-2xl"></i>',
            "class" => "btn-outline-primary",
        ],
        "copyright_text" => "&copy; EMPRESA",
    ],

    // Configuración para el envío de correo
    "mail" => [
        "msg_envio_exitoso" => "El mensaje ha sido enviado con éxito. Espera pronto un mensaje de respuesta en tu bandeja de correo",
        "msg_error_envio" => "Error al enviar el mensaje.",
        "msg_error_captcha" => "Error en el código de validación.",
        "to" => "EMAIL_ADDRESS",
        "subject" => "EMAIL SUBJECT",
    ],

    // Política de privacidad.
    "privacy_policy" => [
        "display" => true,
        "link_text" => "Política de privacidad",
        // Ruta al archivo dentro de aux_files
        "file" => "politica-de-privacidad.html",
    ],
];
