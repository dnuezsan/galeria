<?php

require 'conexion.php';

class Metodo extends Conexion
{

    protected $controlador;

    function __construct()
    {
        $this->controlador = new Conexion();
    }

    function galeriaImagenes()
    {  
        $directorio = 'img';
        /* Crea una instancia de la clase directorio */
        $objetoDir = dir($directorio);
        if ($objetoDir) {
            echo "<table>";
            echo "<tr>";
            /* Lee todos losarchivos del directorio */
            while ($archivo = $objetoDir->read()) {
                /* Evita que tenga en cuenta el '.' y '..' */
                if ($archivo != '.' && $archivo != '..') {
                    echo "<td><div><img src=img/" . $archivo . " alt='" . $archivo . "'></div></td>";
                }
            }
            echo "</tr>";
            echo "</table>";
            /* Cierra el directorio */
            $objetoDir->close();
        } else {
            echo 'No se ha podido acceder a las imágenes';
        }
    }

    function nombres()
    {
        $directorio = 'img';
        /* Crea una instancia de la clase directorio */
        $objetoDir = dir($directorio);
        if ($objetoDir) {
            echo "<table>";
            echo "<tr>";
            /* Lee el nombre de los archivos del directorio */
            while ($archivo = $objetoDir->read()) {
                if ($archivo != '.' && $archivo != '..') {
                    echo "<td><span>" . $archivo . "</span></td>";
                }
            }
            echo "</tr>";
            echo "</table>";
            /* Cierra el directorio */
            $objetoDir->close();
        } else {
            echo 'No se ha podido acceder a las imágenes';
        }
    }

    function subida_archivo()
    {
        /* echo print_r($_FILES['archivo']); */
        /* Devuelve el tamaño del archivo */
        $tamaño = $_FILES['archivo']['size'];

        /* basename() devuelve el último nombre de una ruta */
        $archivo = 'img/' . basename($_FILES['archivo']['name']);
        
        /* Cambia los espacios en blanco por guiones */
        $arreglado = str_replace(' ', '_', $archivo);

        /* Obtener el tipo de archivo */
        $tipo_archivo = pathinfo($archivo, PATHINFO_EXTENSION);

        /* Comprueba que el tamaño sea menor de 5Mb */
        if ($tamaño < 5000000) {
            /* Condiciona el formato a jpg o pdf */
            if ($tipo_archivo == 'jpg' || $tipo_archivo == 'pdf') {

                /* Sube un archivo a un directorio */
                if (move_uploaded_file($_FILES['archivo']['tmp_name'], $arreglado)) {
                    echo '<h3>Se ha guardado el archivo</h3>';
                } else {
                    echo '<h3>Se produjo un error al subir el archivo</h3>';
                }
            } else {
                echo '<h3>El archivo debe ser un pdf o jpg</h3>';
            }
        } else {
            echo '<h3>El archivo es demasiado grande. Debe tener como máximo 5Mb</h3>';
        }
    }


}
