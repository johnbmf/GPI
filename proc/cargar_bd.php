<?php
    $config = parse_ini_file('config.ini');
    $conn = new mysqli($config['servername'],$config['username'],$config['password']);

    if ($conn->connect_error) {
        die("Fallo en la conexion a la base de datos");
    }
    //DROP DATABASE IF EXIST
    $sql = "DROP DATABASE IF EXISTS gpi";
    $conn->query($sql);

    // Create database
    $sql = "CREATE DATABASE gpi CHARACTER SET utf8 COLLATE utf8_spanish_ci";
    if ($conn->query($sql) === TRUE) {
        if ($conn->select_db("gpi") === TRUE){
            $templine = '';
            $lines = file('gpi.sql');

            foreach($lines as $line){
                // Skip it if it's a comment
                if (substr($line, 0, 2) == '--' || $line == '')
                    continue;

                $templine .= $line;
                // If it has a semicolon at the end, it's the end of the query
                if (substr(trim($line), -1, 1) == ';')
                {
                    // Perform the query
                    $conn->query($templine);
                    // Reset temp variable to empty
                    $templine = '';
                }
            }
            echo 'Importacion finalizada';
          }

          else{
            $conn->close();
            echo "Fallo al seleccionar base de datos gpi";
          }
        }

    else {
        $conn->close();
        echo "Fallo al crear la base de datos gpi";
    }
?>
