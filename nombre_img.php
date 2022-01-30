<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <title>Inicio</title>
</head>

<body>
    <header>
        <a href="inicio.php">
            <h1>El laboratorio</h1>
        </a>
        <nav>
            <ul>
                <li>
                    <a href="subir_img.php">Subir archivos</a>
                </li>
                <li>
                    <a href="ver_imagenes.php">Ver imágenes</a>
                </li>
                <li>
                    <a href="nombre_img.php">Ver nombre de la imagen</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>NOMBRE DE IMÁGENES</h2>
        <?php

        require 'metodo.php';

        $controlador = new Metodo();

        /* Extrae y muestra los nombres de las imágenes del directorio */
        $controlador->nombres();
        ?>
    </main>
    <footer>

    </footer>
</body>

</html>