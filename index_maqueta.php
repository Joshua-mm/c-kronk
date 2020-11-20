<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--font--> 
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"/>
        <!-- Css -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <!-- title -->
        <title>Music Chord</title>
    </head>
    <body>
        <!-- Container -->
        <div id="container">
            <!-- header -->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/guitarra.png" alt="Logo - Guitarra">
                    <a href="">Music Chord</a>
                </div>
            </header>

            <!--nav-->
            <nav id="nav">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Category 1</a></li>
                    <li><a href="">Category 2</a></li>
                    <li><a href="">Category 3</a></li>
                    <li><a href="">About me</a></li>
                    <li><a href="">Support</a></li>
                </ul>
            </nav>

            <!-- Central and aside-->
            <div id="block-aside">
                <!-- aside-->
                <aside id="aside">
                    <form action="" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email" required>

                        <label for="password">Password</label>
                        <input type="password" name="password" required>
                        <br><br>
                        <input type="submit" value="Log in" class="button">
                    </form>
                    <br>
                    <ul>
                        <li><a href="">Sign up</a></li>
                    </ul>
                    
                </aside>
                <!-- central -->
                <div id="central">
                    
                </div>
            </div>

            <!--footer-->
            <footer id="footer">
                <p>&copy; Music Chord <?= date('Y') ?></p>
            </footer>
        </div>
    </body>
</html>
