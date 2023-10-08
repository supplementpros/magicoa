<?php
// Incluir el archivo wp-load.php
require_once("../../../wp-load.php");

// Verificar si se ha proporcionado el ID en la URL
if (isset($_GET['id'])) {
    // Obtener el ID de la URL
    $id = $_GET['id'];

    // Obtener la instancia global de la clase $wpdb
    global $wpdb;

    // Nombre de la tabla
    $tabla = $wpdb->prefix . 'cod_custon_form';

    // Consulta para borrar los datos de la tabla según el ID
    $query = $wpdb->prepare("DELETE FROM $tabla WHERE id = %d", $id);
    $wpdb->query($query);

    // Redirigir al usuario a la página principal o a la página del plugin
    wp_redirect(admin_url('admin.php?page=cod-menu'));
    exit;
} else {
    echo "ID no proporcionado.";
}
?>
