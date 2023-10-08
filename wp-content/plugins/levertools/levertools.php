<?php
/*
Plugin Name: Levertools
Description: Levertools, plugin para crear y diseñar formualrios dinamicos, conectado a una red de CPA Marketing <a href="https://adcombo.com">Adcombo</a> dedicado para las ofertas de COD.
Author:  <a href="https://levertools.com">Levertools.com</a>
Version: 1.0.0
*/




// Acción que se ejecuta al activar el plugin
register_activation_hook(__FILE__, 'cod_activar');

// Acción que se ejecuta al desactivar el plugin
register_deactivation_hook(__FILE__, 'cod_desactivar');

// Acción que se ejecuta al desinstalar el plugin
register_uninstall_hook(__FILE__, 'cod_desinstalar');

// Función para activar el plugin
function cod_activar() {
    // Crear la tabla en la base de datos al activar el plugin
    global $wpdb;
    $tabla_nombre_1 = $wpdb->prefix . 'cod_custon_form';
    $tabla_nombre_2 = $wpdb->prefix . 'api_key_levertools';
    $charset_collate = $wpdb->get_charset_collate();

    $consulta_sql_1 = "CREATE TABLE $tabla_nombre_1 (
        id INT NOT NULL AUTO_INCREMENT,
        content_shortcode_cod LONGTEXT NOT NULL,
        name_form_cod VARCHAR(100) NOT NULL,
        shortcode_cod_form VARCHAR(100) NOT NULL,
        ulr_confirmation VARCHAR(250) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    $consulta_sql_2 = "CREATE TABLE $tabla_nombre_2 (
        id INT NOT NULL,
        key_levertools VARCHAR(100) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($consulta_sql_1);
    dbDelta($consulta_sql_2);

    // Insertar un registro en la tabla api_key_adcombo si no existe
    $registro_existente = $wpdb->get_var("SELECT COUNT(*) FROM $tabla_nombre_2");
    if (!$registro_existente) {
        $wpdb->insert($tabla_nombre_2, array(
            'id' => 1,
            'key_levertools' => 'no-key-empty'
        ));
    }
}

// Función para desactivar el plugin
function cod_desactivar() {
    // Realizar acciones al desactivar el plugin (si es necesario)
}

// Función para desinstalar el plugin
function cod_desinstalar() {
    // Eliminar las tablas de la base de datos al desinstalar el plugin (si es necesario)
    global $wpdb;
    $tabla_nombre_1 = $wpdb->prefix . 'cod_custon_form';
    $tabla_nombre_2 = $wpdb->prefix . 'api_key_adcombo';

    $wpdb->query("DROP TABLE IF EXISTS $tabla_nombre_1");
    $wpdb->query("DROP TABLE IF EXISTS $tabla_nombre_2");
}




// Función para agregar el menú
function cod_agregar_menu() {
    add_menu_page(
        'Levertools',   // Título de la página
        'Levertools',   // Nombre del menú
        'manage_options',  // Capacidad requerida para acceder al menú
        'levertools-custom-form-cod',        // ID único del menú
        'cod_menu_pagina', // Función para mostrar la página del menú
        plugin_dir_url( __FILE__ ) . 'img/icon_levertools.svg', // Ruta al archivo de imagen del icono personalizado dentro del complemento
        30                 // Posición del menú en el panel
    );
    
    

    add_submenu_page(
        'levertools-custom-form-cod',  // ID del menú principal
        'Config-Levertools',  // Título de la página del submenú
        'Configuración',  // Nombre del submenú
        'manage_options',  // Capacidad requerida para acceder al submenú
        'levertools-cod-config',  // ID único del submenú
        'cod_config_pagina'  // Función para mostrar la página del submenú
    );

    // Eliminar el submenú "Page_Gracias"
    remove_submenu_page('cod-menu', 'cod-gracias');
}
add_action('admin_menu', 'cod_agregar_menu');



// Función para mostrar el select con las páginas de WordPress
function mostrar_paginas_select() {
    $paginas = get_pages(); // Obtener todas las páginas de WordPress
    
    if (!empty($paginas)) {
        echo '<select name="pagina_id" id="url-confirmation-cod">';
        echo '<option value="">Seleccionar página</option>'; // Opción predeterminada
        
        foreach ($paginas as $pagina) {
            $option_value = $pagina->ID;
            $option_label = $pagina->post_title;
            
            echo '<option value="' . $option_value . '">' . $option_label . '</option>';
        }
        
        echo '</select>';
    } else {
        echo 'No se encontraron páginas.';
    }
}



// Función para mostrar la página de configuración del submenú
// Función para mostrar la página de configuración del submenú
function cod_config_pagina() {
    global $wpdb;
    $tabla_nombre = $wpdb->prefix . 'api_key_levertools';

    // Obtener el registro con id=1 y la columna key_levertools
    $registro = $wpdb->get_row("SELECT key_levertools FROM $tabla_nombre WHERE id = 1");

    if (isset($_POST['submit'])) {
        $api_key = sanitize_text_field($_POST['api_key']); // Sanitizar el valor del formulario
        if (!empty($api_key)) {
            $wpdb->update(
                $tabla_nombre,
                array('key_levertools' => $api_key),
                array('id' => 1),
                array('%s'),
                array('%d')
            );
            $registro = (object) array('key_levertools' => $api_key); // Actualizar el objeto $registro con la nueva clave
        }
    }
    ?>
    <div class="wrap cod-plugin">
<br>
        <h1>Configuración de API</h1>
        <hr>
        <?php if (!$registro || $registro->key_levertools === 'no-key-empty') { ?>
            <!-- Mostrar formulario para agregar la API Key -->
            <form method="post" action="">
                <label for="api_key">Ingresa tu clave de API de Levertools:</label>
                <input type="text" id="api_key" name="api_key" value=""  required/>
                <input type="submit" name="submit" value="Conectar" />
            </form>
        <?php } else { ?>
            <!-- Mostrar contenido con la API Key existente y el formulario colapsable para editarla -->
            <p>Tu clave de API es: <span><?php echo esc_html($registro->key_levertools); ?></span></p>
            <button onclick="toggleCollapse()">Editar</button>
            <div class="collapse" id="myCollapse">
                <div class="collapse-content">
                    <form method="post" action="">
                        <input type="text" id="api_key" name="api_key" value="" placeholder="Ingresa tu clave API para modificar" required/>
                        <input type="submit" name="submit" value="Conectar"  />
                    </form>
                </div>
            </div>
        <?php } ?>
        <br>
        <hr>
        <center><img width="200px" src="https://princi.levertools.com/public/img/levertools_logo.png" alt="" srcset=""></center>
       <center><p>*Ingrese a su cuenta de levertools para obtener la clave de API  de Levertools en el apartado de configuracion</p></center>
       <br>
       <center><a href="https://levertools.com" target="_blank">Acceder a Levertools</a></center>
    </div>
    <style>
        /* Estilo general */
        .cod-plugin {
            font-family: Arial, sans-serif;
        }

        .cod-plugin .wrap {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .cod-plugin h1 {
            color: #000;
        }

        /* Estilo para el formulario de agregar API Key */
        .cod-plugin form {
            margin-top: 20px;
        }

        .cod-plugin label {
            display: block;
            font-size: 15px;
            margin-bottom: 5px;
            color: #000;
        }

        .cod-plugin input[type="text"] {
            width: 250px;
            padding: 1px;
            font-size: 15px;
            font-style: italic;
            border: 1px solid #000;
        }
        .cod-plugin input[type="text"]:focus {
            border-color: #000;
            box-shadow: none;
        }

        

        .cod-plugin input[type="submit"] {
            padding: 10px 20px;
            background-color: #ffd700; /* Color amarillo oro */
            border-radius: 5px;
            border: none;
            color: #000;
            cursor: pointer;
        }

        /* Estilos para el contenido con la API Key existente y el formulario colapsable */
        .cod-plugin p {
            margin-bottom: 10px;
            font-size: 16px;
            color: #000;
        }

        .cod-plugin p span{
            font-size: 15px;
            font-style: italic;
            font-weight: bold;
            color: #000;
            padding: 10px;
            background-color: #ffbf00c2;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .cod-plugin button {
            background-color: #000;
            border-radius: 5px;
            color: #fff;
            border: none;
            padding: 10px 25px 10px 25px;
            cursor: pointer;
        }

        .cod-plugin a {
            text-decoration: none;
            background-color: #3D1B6C;
            border-radius: 5px;
            color: #fff;
            border: none;
            padding: 10px 25px 10px 25px;
            cursor: pointer;
        }

        .cod-plugin .collapse {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }

        .cod-plugin .collapse.is-open {
            max-height: 500px; /* Altura máxima para mostrar el contenido colapsable */
        }

        .cod-plugin .collapse-content {
            background-color: #ffff; /* Color amarillo oro */
            border-radius: 15px;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
    <script>
        function toggleCollapse() {
            var collapse = document.getElementById("myCollapse");
            collapse.classList.toggle("is-open");
        }
    </script>
    <?php
}






// Función para mostrar la página del menú principal
function cod_menu_pagina() {
    // Código adicional o contenido antes de incluir las librerías y estilos

    wp_enqueue_style('form-cod-style', plugins_url('style/style-form.css', __FILE__));
    wp_enqueue_style('form-cod-bootstrap', plugins_url('bootstrap/bootstrap.min.css', __FILE__));
    wp_enqueue_script('form-cod-bootstrap', plugins_url('bootstrap/bootstrap.bundle.min.js', __FILE__), array('jquery'));
    wp_enqueue_script('form-cod-jquery', plugins_url('ap-form-cod/jquery-3.6.0.min.js', __FILE__));
    wp_enqueue_script('form-cod-ap-cod-custon', plugins_url('ap-form-cod/ap-cod-custon.js', __FILE__));
    wp_enqueue_script('form-cod-ap-input-hidden-adcombo', plugins_url('ap-form-cod/ap-input-hidden-adcombo.js', __FILE__));
    wp_enqueue_script('form-cod-ap-content-load', plugins_url('ap-form-cod/content-load.js', __FILE__));

    require plugin_dir_path(__FILE__) . 'tmp-sousure/form-cod-register.php';

    // Código adicional o contenido después de incluir el archivo
}







function enqueue_jquery() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');





add_action('init', 'my_validation_start_wp_session');
function my_validation_start_wp_session() {
    if (!session_id()) {
        session_start();
    }
}






function shortcode_cod($atts) {
    // Obtener el ID del atributo del shortcode
    $atts = shortcode_atts(array(
        'id' => '',
    ), $atts);

    // Verificar si se proporcionó un ID
    if (empty($atts['id'])) {
        return 'Debes especificar un ID válido para el shortcode.';
    }

    // Obtener el registro correspondiente al ID proporcionado
    global $wpdb;
    $tabla_nombre = $wpdb->prefix . 'cod_custon_form';

    $registro = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tabla_nombre WHERE id = %d", $atts['id']));

    // Verificar si se encontró un registro
    if (!$registro) {
        return 'No se encontró ningún registro con el ID especificado.';
    }

    // Construir la salida con la información del registro
    $output = '<div> <style>
    

.cod-cpa-form .form-group {
    margin-bottom: 20px;
  }
  .cod-cpa-form label {
    display: block;
    font-weight: bold;
    text-align: left;
  }
  .cod-cpa-form  input[type="text"],
  input[type="email"],
  input[type="tel"] {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    text-align: left;
  }
  .cod-cpa-form button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    text-align: center;
  }
  .cod-cpa-form .personalizar {
    /* Estilos personalizados */
  }
  .cod-cpa-form .input-container {
    width: 100%;
    max-width: 300px;
  }
  .cod-cpa-form .button-container {
    text-align: center;
  }
  
  
  
  .cod-cpa-form .button-container button.pulse {
  animation: pulse 1s infinite;
  }
  
  .cod-cpa-form .button-container button.bounce {
  animation: bounce 1s infinite;
  }
  
  .cod-cpa-form .button-container button.rotate {
  animation: rotate 1s infinite;
  }
  
  .cod-cpa-form .button-container button.flash {
  animation: flash 1s infinite;
  }
  
  .cod-cpa-form .button-container button.shake {
  animation: shake 1s infinite;
  }
  
  .cod-cpa-form .button-container button.zoom {
  animation: zoom 1s infinite;
  }
  
  .cod-cpa-form .button-container button.swing {
  animation: swing 1s infinite;
  }
  
  .cod-cpa-form .button-container button.tada {
  animation: tada 1s infinite;
  }
  
  .cod-cpa-form .button-container button.wobble {
  animation: wobble 1s infinite;
  }
  
  @keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.2); }
  100% { transform: scale(1); }
  }
  
  @keyframes bounce {
  0% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
  100% { transform: translateY(0); }
  }
  
  @keyframes rotate {
  0% { transform: rotate(0); }
  100% { transform: rotate(360deg); }
  }
  
  @keyframes flash {
  0% { opacity: 1; }
  50% { opacity: 0; }
  100% { opacity: 1; }
  }
  
  @keyframes shake {
  0% { transform: translateX(0); }
  25% { transform: translateX(-5px); }
  50% { transform: translateX(5px); }
  75% { transform: translateX(-5px); }
  100% { transform: translateX(0); }
  }
  
  @keyframes zoom {
  0% { transform: scale(1); }
  50% { transform: scale(1.2); }
  100% { transform: scale(1); }
  }
  
  @keyframes swing {
  0% { transform: rotate(0); }
  50% { transform: rotate(15deg); }
  100% { transform: rotate(0); }
  }
  
  @keyframes tada {
  0% { transform: scale(1); }
  25% { transform: scale(0.8) rotate(-10deg); }
  50% { transform: scale(1.2) rotate(10deg); }
  75% { transform: scale(0.9) rotate(-10deg); }
  100% { transform: scale(1) rotate(0); }
  }
  
  @keyframes wobble {
  0% { transform: translateX(0%); }
  15% { transform: translateX(-25%) rotate(-5deg); }
  30% { transform: translateX(20%) rotate(3deg); }
  45% { transform: translateX(-15%) rotate(-3deg); }
  60% { transform: translateX(10%) rotate(2deg); }
  75% { transform: translateX(-5%) rotate(-1deg); }
  100% { transform: translateX(0%); }
  }
    </style>' . $registro->content_shortcode_cod . ' </div> <script>
    // Obtén la URL actual del proyecto
    var currentUrl = window.location.href;

    // Actualiza el atributo "action" del formulario con la URL actual
    document.getElementById("myForm").action = currentUrl;
</script>';



    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate form fields
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);

        if (empty($name) || empty($email) || empty($phone)) {
            // Handle validation errors
            $output .= '<div class="error">Por favor, completa todos los campos.</div>';
        } else {
            // Perform additional actions with the form data
            // For example, send an email

            // Store form data in session variables
            $_SESSION['form_name'] = $name;
            $_SESSION['form_email'] = $email;
            $_SESSION['form_phone'] = $phone;

            // Display success message
            $output .= '<div class="success">Formulario enviado correctamente.</div>';
        }

        // Process and validate the form
        my_validation_process_form();
    }

    return $output;
}


add_shortcode('shortcode_cod', 'shortcode_cod');







// Function to get LeverTools API key from the database
function get_levertools_api_key() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'api_key_levertools';

    $api_key = $wpdb->get_var($wpdb->prepare("SELECT key_levertools FROM $table_name WHERE id = %d", 1));

    return $api_key;
}

// Process and validate the form
add_action('init', 'my_validation_process_form');
function my_validation_process_form() {
    // Initialize the output variable
    $output = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate form fields
        $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
        $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
        $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
        $offer_id = isset($_POST['offer-id']) ? sanitize_text_field($_POST['offer-id']) : '';
        $country_code = isset($_POST['country-code']) ? sanitize_text_field($_POST['country-code']) : '';
        $price_offer = isset($_POST['price-offer']) ? floatval($_POST['price-offer']) : '';
        $url_trafic = isset($_POST['url-trafic']) ? esc_url_raw($_POST['url-trafic']) : '';
        $name_form = isset($_POST['name-form']) ? sanitize_text_field($_POST['name-form']) : '';

        if (empty($name) || empty($email) || empty($phone) || empty($offer_id) || empty($country_code) || empty($price_offer)) {
            // Handle validation errors
            $output .= '<div class="error">Por favor, completa todos los campos.</div>';
        } else {
            // Perform additional actions with the form data
            // Store form data in session variables
            $_SESSION['form_name'] = $name;
            $_SESSION['form_email'] = $email;
            $_SESSION['form_phone'] = $phone;

            // Get the URL of the previous page (where the form was filled)
            if (isset($_SERVER['HTTP_REFERER'])) {
                $referer_url = esc_url_raw(wp_unslash($_SERVER['HTTP_REFERER']));
                $landing_url = filter_var($referer_url, FILTER_VALIDATE_URL) ? $referer_url : '';
            } else {
                $landing_url = '';
            }

            // Prepare the data to be sent as JSON
            $api_data = array(
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'id_oferta' => $offer_id,
                'pais' => $country_code,
                'precio' => $price_offer,
                'url_landing' => $landing_url,
                'url_trafic' => $url_trafic,
                'name_form' => $name_form,
                'ip' => $_SERVER['REMOTE_ADDR']
            );

            // Convert data to JSON
            $api_json_data = json_encode($api_data);

            // Get the LeverTools API key from the database
            $api_key = get_levertools_api_key();

            // Check if the API key is available and not empty
            if (!$api_key) {
                // Handle the case when the API key is not available
                // For example, show an error message or log the issue
                // You may want to stop the process here or take appropriate actions
                return;
            }

            // Combine the API key with the URL of LeverTools API
            $api_url = 'https://api.levertools.com/v1/api/v1/?api_key=' . urlencode($api_key);

            // Send data to LeverTools API via POST request
            $api_response = wp_remote_post($api_url, array(
                'method' => 'POST',
                'headers' => array('Content-Type' => 'application/json'),
                'body' => $api_json_data
            ));

            // Check if the API request was successful (you may need to adjust this based on the API response format)
if (!is_wp_error($api_response) && wp_remote_retrieve_response_code($api_response) === 200) {
    // API request was successful, you can process the response if needed

    // Get the page ID from the POST data
    $page_id = isset($_POST['url-confirmation']) ? intval($_POST['url-confirmation']) : 0;

    if ($page_id > 0) {
        // Obtain the slug of the page using the ID
        $page_slug = get_post_field('post_name', $page_id);

        if ($page_slug) {
            // Generate the redirect URL
            $gracias_url = get_permalink($page_id);
            wp_redirect($gracias_url); // Redirect to the thank you page
            exit; // It's important to exit the script after the redirection
        }
    }
} else {
    // API request failed, handle the error if needed
    $error_message = 'Hubo un problema al enviar el formulario. Por favor, inténtalo de nuevo más tarde.';
    
    if (is_wp_error($api_response)) {
        // If the API response is a WP_Error object, get the error message
        $error_message .= ' Error: ' . $api_response->get_error_message();
    } else {
        // If the API response is not a WP_Error object, get the response body
        $response_body = wp_remote_retrieve_body($api_response);
        if ($response_body) {
            // Decode the response body if it's in JSON format
            $response_data = json_decode($response_body, true);
            if (is_array($response_data) && isset($response_data['error'])) {
                $error_message .= ' Detalles: ' . $response_data['error'];
            }
        }
    }

    // Append the error message to the output variable
    $output .= '<div class="error">' . $error_message . '</div>';
}


            // Print the output
            echo $output;
        }
    }
}




// Display success message, form data, and the return to form link
add_shortcode('shortcode_cod_succes_form', 'my_validation_display_success_page');
function my_validation_display_success_page() {
    // Get form data from session variables
    $name = isset($_SESSION['form_name']) ? $_SESSION['form_name'] : '';
    $email = isset($_SESSION['form_email']) ? $_SESSION['form_email'] : '';
    $phone = isset($_SESSION['form_phone']) ? $_SESSION['form_phone'] : '';

    // Clear session variables
    unset($_SESSION['form_name']);
    unset($_SESSION['form_email']);
    unset($_SESSION['form_phone']);

    // Display success message and form data
    $message = '¡Formulario enviado correctamente!';
    $data = "Nombre: $name<br>";

    // Check if email is not "not-mail@levertools.com" before including it in the data
    if ($email !== 'not-mail@levertools.com') {
        $data .= "Correo electrónico: $email<br>";
    }

    $data .= "Telefono: $phone<br>";

    // Get the URL of the previous page (where the form was filled)
    $form_page_url = wp_get_referer();
    $return_link = '<a href="' . $form_page_url . '" class="button">Volver al formulario</a>';

    return "$message<br>$data<br>$return_link";
}

