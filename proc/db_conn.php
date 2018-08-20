<?php
function db_conn() {
    $config = parse_ini_file('config.ini');
    $conn = new mysqli($config['servername'],$config['username'],$config['password'],$config['dbname']);

    // Si la conexion no se logra:
    if($conn->connect_error) {
        // Handle error
        header("Location: ../index.php?errno=500");
        exit;
    }
    return $conn;
}
?>
