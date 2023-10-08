<div class="wrap">
        <h1>Creation Forms COD Adcombo CPA</h1>
        <div class="alert alert-success fst-italic" role="alert">
        Para recuperar los datos dinamicamente pega en la seccion de shortcode <span class="fs-5 text-dark fst-normal">[shortcode_cod_succes_form]</span>
</div>
        <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Añadir Formulario</button>
        <div class="collapse" id="collapseExample">
  <div class="border border-warning-subtle rounded p-3 mt-3">
  <div class="container">
  <div class="row align-items-start">
    <div class="col">
      One of three columns
      
<div class="personalizar-form-cod">
<label for="name-form-cod">Nombre del Formulario</label>
<input type="text" id="name-form-cod" name="name-form-cod" value="">
    <h3>Personalizar Estilos</h3>

    <label for="color">Color de fondo:</label>
    <input type="color" id="color" name="color" value="#ffffff">
    <br>
    <label for="border">Borde:</label>
    <input type="text" id="border" name="border" placeholder="Ejemplo: 1px solid #ccc">
    <br>
    <label for="border-radius">Radio de borde:</label>
    <input type="text" id="border-radius" name="border-radius" placeholder="Ejemplo: 5px">
    <br>
    <label for="padding">Padding:</label>
    <input type="text" id="padding" name="padding" placeholder="Ejemplo: 10px">
    <br>
    <label for="label-align">Alineación de labels:</label>
    <select id="label-align" name="label-align">
        <option value="left" selected>Izquierda</option>
        <option value="center">Centro</option>
        <option value="right">Derecha</option>
    </select>
    <br>
    <label for="input-align">Alineación de inputs:</label>
    <select id="input-align" name="input-align">
        <option value="left" selected>Izquierda</option>
        <option value="center">Centro</option>
        <option value="right">Derecha</option>
    </select>
    <br>
    <label for="button-align">Alineación del botón:</label>
    <select id="button-align" name="button-align">
        <option value="left">Izquierda</option>
        <option value="center" selected>Centro</option>
        <option value="right">Derecha</option>
    </select>
    <br>
    <label for="label-color">Color del texto de los labels:</label>
    <input type="color" id="label-color" name="label-color">
    <br>
    <label for="name-label">Texto de la etiqueta Nombre:</label>
<input type="text" id="name-label" name="name-label" placeholder="Texto de la etiqueta Nombre" value="Nombre:">
<br>
<label for="email-label">Texto de la etiqueta Correo:</label>
<input type="text" id="email-label" name="email-label" placeholder="Texto de la etiqueta Correo" value="Correo:">
<br>
<label for="phone-label">Texto de la etiqueta Teléfono:</label>
<input type="text" id="phone-label" name="phone-label" placeholder="Texto de la etiqueta Teléfono" value="Teléfono:">

    <label for="background-opacity">Opacidad de fondo:</label>
    <input type="range" id="background-opacity" name="background-opacity" min="0" max="1" step="0.1" value="1">
    <br>
    <label for="button-color">Color del botón:</label>
    <input type="color" id="button-color" name="button-color" value="#007bff">
    <br>
    <label for="button-text-color">Color de texto del botón:</label>
    <input type="color" id="button-text-color" name="button-text-color" value="#ffffff">
    <br>
    <label for="button-text">Texto del botón:</label>
    <input type="text" id="button-text" name="button-text" placeholder="Texto del botón" value="Enviar">
    <br>
    <label for="button-size">Tamaño del botón:</label>
    <input type="text" id="button-size" name="button-size" placeholder="Ejemplo: 16px">
    <br>
    <label for="button-border-radius">Radio del borde del botón:</label>
    <input type="text" id="button-border-radius" name="button-border-radius" placeholder="Ejemplo: 5px">
    <br>
    <label for="button-animation">Animación del botón:</label>
    <select id="button-animation" name="button-animation">
        <option value="none" selected>Ninguna</option>
        <option value="pulse">Pulso</option>
        <option value="bounce">Rebote</option>
        <option value="rotate">Rotación</option>
        <option value="flash">Destello</option>
        <option value="shake">Sacudida</option>
        <option value="zoom">Zoom</option>
        <option value="swing">Balanceo</option>
        <option value="tada">Tada</option>
        <option value="wobble">Tambalear</option>
    </select>
    <br>
    <label for="name-placeholder">Texto del placeholder de Nombre:</label>
    <input type="text" id="name-placeholder" name="name-placeholder" placeholder="Texto del placeholder de Nombre" value="Ingrese su nombre">
    <br>
    <label for="email-visual">Visualizacion del Email:</label>
    <select name="email-visual" id="email-visual"><option value="1">Mostrar</option><option value="2">Ocultar</option></select>
    <label for="email-placeholder">Texto del placeholder de Correo:</label>
    <input type="text" id="email-placeholder" name="email-placeholder" placeholder="Texto del placeholder de Correo" value="Ingrese su correo electronico">
    <br>
    <label for="phone-placeholder">Texto del placeholder de Teléfono:</label>
    <input type="text" id="phone-placeholder" name="phone-placeholder" placeholder="Texto del placeholder de Teléfono" value="Ingrese su numero de teléfono">
    <h3>Config Adcombo</h3>
<label for="id-oferta">ID Oferta:</label>
<input type="text" id="id-oferta-cod" name="id-oferta-cod" value="" placeholder="Ingrese solo numeros">
<br>
<label for="country-code-cod">Codigo Zip Pais: ejemplo PE, BO , ES, MX</label>
<input type="text" id="country-code-cod" name="country-code-cod" value="" oninput="this.value = this.value.toUpperCase()">
<br>
<label for="price-ofert-cod">Precio Producto:</label>
<input type="text" id="price-ofert-cod" name="price-ofert-cod" value="" pattern="[0-9]*" title="Ingrese solo números" placeholder="Ingrese solo numeros,no se permite el simbolo de la moneda">
<br>
<label for="trafic-url-cod">Fuente de Trafico:</label>
<input type="text" id="trafic-url-cod" name="trafic-url-cod" value="" placeholder="Ejemplo: facebook, google, bing...">
<br>
<label for="url-confirmation-cod">URL Pagina Gracias:</label>
<?php mostrar_paginas_select(); ?> <!-- Mostrar el select con las páginas -->

</div>
    </div>
    <div class="col sidebar-cod">
 
<form id="myForm" class="cod-cpa-form" method="post">
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" placeholder="Ingrese su nombre" required>
    </div>
    <div class="form-group">
        <label for="phone">Teléfono:</label>
        <input type="tel" id="phone" name="phone" placeholder="Ingrese su número de teléfono" required>
    </div>
    <div class="form-group" id="email-group">
        <label for="email">Correo:</label>
        <input type="email" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
    </div>
    <input type="hidden" id="offer-id" name="offer-id" value="">
    <input type="hidden" id="country-code" name="country-code" value="">
    <input type="hidden" id="price-offer" name="price-offer" value="">
    <input type="hidden" id="url-trafic" name="url-trafic" value="">
    <input type="hidden" id="url-confirmation" name="url-confirmation" value="">
    <input type="hidden" id="name-form" name="name-form" value="">
    <div class="button-container">
        <button type="submit">Enviar</button>
    </div>
</form>



    </div>
  </div>
</div>
<div class="success-message-cod-form" id="success-message-cod-form"></div>


<form method="post">
<input type="hidden" id="conten_cod_html" name="conten_cod_html" value="">
<input type="hidden" id="conten_cod_name" name="conten_cod_name" value="">
<input type="hidden" id="url_cod_confirmation" name="url_cod_confirmation" value="">
<center><button type="submit" class="btn btn-success" name="cod-guardar" id="cod-guardar">Guardar</button></center>
</form>
  </div>
</div>

<?php

if (isset($_POST['cod-guardar'])) {
  // Obtener los datos enviados por el formulario
  $nombre = wp_unslash($_POST['conten_cod_html']);
  $email = ($_POST['conten_cod_name']);
  $url_cod_confirmation = ($_POST['url_cod_confirmation']);

  // Guardar los datos en la base de datos
  global $wpdb;
  $tabla = $wpdb->prefix . 'cod_custon_form';
  $datos = array(
      'content_shortcode_cod' => $nombre,
      'name_form_cod' => $email,
      'ulr_confirmation' => $url_cod_confirmation
  );
  $wpdb->insert($tabla, $datos);

  // Obtener el ID del último registro insertado
  $id = $wpdb->insert_id;

  // Generar el shortcode
  $shortcode = "[shortcode_cod id='$id']";

  // Actualizar la columna shortcode_cod_form con el shortcode generado
  $wpdb->update($tabla, ['shortcode_cod_form' => $shortcode], ['id' => $id]);

  echo '<div class="notice notice-success"><p>Formulario creado correctamente.</p></div>';
}
?>

<table id="tabla-dinamica" class="table table-bordered mt-3">
  <thead>
    <tr>
      <th>Nombre del Formulario</th>
      <th>Shortcode</th>
      <th>Edición</th>
      <th>Borrado</th>
    </tr>
  </thead>
  <tbody>
  <?php
// Obtener la instancia global de la clase $wpdb
global $wpdb;

// Nombre de la tabla
$tabla = $wpdb->prefix . 'cod_custon_form';

// Consulta para obtener los datos de la tabla
$query = "SELECT id, content_shortcode_cod, name_form_cod, shortcode_cod_form FROM $tabla ORDER BY id DESC";
$resultado = $wpdb->get_results($query);

// Verificar si se encontraron resultados
if ($resultado) {
    // Generar filas de la tabla con los datos obtenidos
    foreach ($resultado as $fila) {
        echo "<tr>";
        echo "<td>" . $fila->name_form_cod . "</td>";
        echo "<td>" . $fila->shortcode_cod_form . "</td>";
        echo "<td><a href='#' type='button' class='btn btn-warning btn-sm'>Editar</a></td>";
        echo "<td><a href='" . plugins_url('../delete.php', __FILE__) . "?id=" . $fila->id . "' type='button' class='btn btn-danger btn-sm'>Borrar</a></td>";
        echo "</tr>";
    }
} else {
    echo "No se encontraron resultados.";
}
?>

  </tbody>
</table>


    </div>