<!-- Central and aside-->

<div id="block-aside">

    <!-- aside-->
    <aside id="aside">
        <form action="<?= base_url ?>usuario/login" method="POST">
            <?php if (!isset($_SESSION['identity'])): ?>
                <h3>Sign in</h3>
                <?php if (isset($_SESSION['error_login']) && $_SESSION['error_login']): ?>
                    <div class="alerta-error">Login failed</div>
                <?php endif; ?>
                <?php Utils::delete_session('error_login') ?>
                <!--<label for="email">Email</label>-->
                <input type="email" name="email" placeholder="Email" required>

                <!--<label for="password">Password</label>-->
                <input type="password" name="password" placeholder="Password" required>
                <br><br>
                <input type="submit" value="Log in" class="button">
            </form>
            <br>
            
            <div class="choose">
                <ul>
                    <li><img src="<?= base_url ?>assets/img/signup.png" alt="signup" height="20px"><a href="http://localhost/music-chord/usuario/sign_up">Sign up</a></li>
                </ul>
            </div>
            <br><br>
            <div class="box">
                <form></form>
                <form action="<?=base_url?>entrada/result" method="POST">
                    <input type="text" name="search" placeholder="Search...">
                    <input type="submit" value="Search" class="btn">
                </form>
            </div>
        <?php endif; ?>


        <?php if (isset($_SESSION['identity'])): ?>
            <?php $ide = $_SESSION['identity'] ?>
            <?php Utils::showAllDataFromUsuario($ide->id) ?>
            <?php $id = $_SESSION['show_data_usuario'] ?>
            <div class="profile">
                <?php if (!empty($id->imagen)): ?>
                    <img src="<?= base_url ?>uploads/images/<?= $id->imagen ?>" height="80px">

                <?php else: ?>
                    <img src="<?= base_url ?>uploads/images/user.png" height="80px">

                <?php endif; ?>
                <h4><?= $id->nombre ?> <?= $id->apellidos ?></h4>
            </div>

            <div class="box">
                <form></form>
                <form action="<?=base_url?>entrada/result" method="POST">
                    <input type="text" name="search" placeholder="Search...">
                    <input type="submit" value="Search">
                </form>
            </div>
            <br>
            <div class="choose">
                <ul>
                    <li><img src="<?= base_url ?>assets/img/favorites.png" alt="favorites" height="20px"><a href="<?= base_url ?>favorito/index&id=<?= $id->id ?>">Favorite</a></li> 
                </ul>
                <ul>
                    <li><img src="<?= base_url ?>assets/img/order.png" alt="Ask for" height="20px"><a href="<?= base_url ?>pedido/orders">Ask for a song</a></li>
                </ul>
                <ul>
                    <li><img src="<?= base_url ?>assets/img/orders.png" alt="orders" height="20px"><a href="<?= base_url ?>pedido/songs&id=<?= $id->id ?>">My orders</a></li>
                </ul>
                <ul>
                    <li><img src="<?= base_url ?>assets/img/usuario.png" alt="profile" height="20px"><a href="<?= base_url ?>usuario/profile&id=<?= $id->id ?>">My profile</a></li>
                </ul>
                <ul>
                    <li><img src="<?= base_url ?>assets/img/edit.png" alt="Edit" height="20px"><a href="<?= base_url ?>usuario/edit_profile&id=<?= $id->id ?>">Edit profile</a></li>
                </ul>

                <ul>
                    <li><img src="<?= base_url ?>assets/img/cerrar-sesion.png" alt="Log out" height="20px"><a href="<?= base_url ?>usuario/logout" style="color: red !important">Log out</a></li>
                </ul>
            </div>
        <?php endif; ?>
        <br>
        <?php if (isset($_SESSION['admin'])): ?>
            <h3>Management</h3><br>
            <div class="choose">
                <ul>
                    <li><img src="<?= base_url ?>assets/img/revision.png" alt="Manage" height="20px"><a href="<?= base_url ?>pedido/manage">Manage orders</a></li>
                </ul>
                <ul>
                    <li><img src="<?= base_url ?>assets/img/revision.png" alt="Manage" height="20px"><a href="<?= base_url ?>entrada/manage">Manage songs</a></li>
                </ul>
                <ul>
                    <li><img src="<?= base_url ?>assets/img/revision.png" alt="Manage" height="20px"><a href="<?= base_url ?>categoria/gestionar">Manage categories</a></li>
                </ul>
                <ul>
                    <li><img src="<?= base_url ?>assets/img/revision.png" alt="Manage" height="20px"><a href="<?= base_url ?>usuario/manage">Manage users</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </aside>

    <!-- central -->
    <div id="central">




