<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--font--> 
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"/>
        <!-- Css -->
        <link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/css/style.css">
        <!--js-->
        <!-- title -->
        <title>Music Chord</title>
    </head>
    <body>
        <!-- Container -->
        <div id="container">
            <!-- header -->
            <div class="menu-f">
            <header id="header">
                <div id="logo">
                    <img src="<?= base_url ?>assets/img/guitarra.png" alt="Logo - Guitarra">
                    <a href="">Music Chord</a>
                </div>
            </header>

            <!--nav-->
            <nav id="nav">
                <ul>
                    <li class="menu"><a href="<?= base_url ?>">Home</a></li>
                    <?php Utils::showAllCategories() ?>
                    <?php $categorias = $_SESSION['show_categories']; ?>
                    <?php while ($cat = $categorias->fetch_object()): ?>
                        <li class="menu"><a href="<?= base_url ?>categoria/view&id=<?= $cat->id ?>"><?= $cat->nombre ?></a></li>
                    <?php endwhile; ?>
                    <li class="menu"><a href="">About me</a></li>
                    <li class="menu"><a href="">Support</a></li>

                </ul>

            </nav>
            
            </div>