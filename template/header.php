<!DOCTYPE html>
<html lang="en">

<head>
    <title>App web Manufactura</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/HarryStyles.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- <script src="../js/bootstrap.min.js"></script> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <?php
    include_once '../includes/databaseconnect.php';
    ?>

    <div id="Encabezado">
        <header>
            <div class="col-lg-12">
                <h1><a href="../template/index.php">Sakila</a>
                </h1>
            </div>
            <nav class="navbar navbar-dark bg-dark  navbar-expand-xl sticky-top">
                <div class="container-fluid">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <a class="nav-item nav-link " id="customers" href="../customers/tabla.php" style="color: rgb(255, 250, 183)">Clientes</a>
                            <a class="nav-item nav-link " id="inventory" href="../inventory/tabla.php" style="color: rgb(255, 250, 183)">Inventario</a>
                            <a class="nav-item nav-link " id="rentals" href="../rental/tabla.php" style="color: rgb(255, 250, 183)">Rentas</a>
                        </ul>

                    </div>
                </div>
            </nav>
        </header>

    </div>
    <script src="../js/bootstrap.min.js"></script>
    <!-- <script src="../js/bootstrap.bundle.min.js"></script> -->
    <script src="../js/jquery-3.6.1.min.js"></script>
    <script src="../js/index_header.js?v=<?php echo (rand()); ?>"></script>
</body>

</html>