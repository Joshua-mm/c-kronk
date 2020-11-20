<?php Utils::isAdmin() ?>
<?php $identity = $_SESSION['all_users'] ?>
<h1>Manage users</h1>
<?php if(isset($_SESSION['remove_usuario']) && $_SESSION['remove_usuario']):?>
<div class="alerta-ok">User removed successfully</div>
<?php endif; ?>
<?php if(isset($_SESSION['error_remove_usuario']) && $_SESSION['error_remove_usuario']):?>
<div class="alerta-error">There was an error while removing an user</div>
<?php endif; ?>
<table>
    <tr>
        <th>User ID</th>
        <th>Picture</th>
        <th>Name</th>
        <th>Last name</th>
        <th>Email</th> 
        <th>Register date</th>
        <th>Manage</th>
    </tr>
    <?php while ($id = $identity->fetch_object()): ?>

    <tr>
            <td><?= $id->id ?></td>
            <?php if (!empty($id->imagen)): ?>
                <td><img src="<?= base_url ?>uploads/images/<?= $id->imagen ?>" height="40px"></td>
            <?php else: ?>
                <td><img src="<?= base_url ?>uploads/images/user.png" height="35px"></td>
            <?php endif; ?>
            <td><?= $id->nombre ?></td>
            <td><?= $id->apellidos ?></td>
            <td><?= $id->email ?></td>

            <td><?= $id->fecha ?></td>
            <td><a href="<?=base_url?>usuario/profile&id=<?=$id->id?>">View profile</a> | <a href="<?=base_url?>usuario/remove_one&id=<?=$id->id?>" style="color: red !important">Remove</a></td>
        </tr>
    <?php endwhile; ?>
</table>

<?php Utils::delete_session('remove_usuario')?>
<?php Utils::delete_session('error_remove_usuario')?>