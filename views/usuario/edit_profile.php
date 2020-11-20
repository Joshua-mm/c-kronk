<?php Utils::isLoged() ?>
<?php $identity = $_SESSION['identity']?>
<?php Utils::showAllDataFromUsuario($identity->id)?>
<h1>Edit profile</h1>
<?php if (isset($_SESSION['edit']) && $_SESSION['edit'] == 'complete'): ?>
    <div class="alerta-ok">Edit completed successfully</div>
<?php endif; ?>
<?php if (isset($_SESSION['edit']) && $_SESSION['edit'] == 'failed'): ?>
    <div class="alerta-error">There was an error editing registration</div>
<?php endif; ?>
    <?php $id = $_SESSION['show_data_usuario']?>
    <!-- Aqui pongo 2 form porque por alguna extraña razon se come el primer form-->
<form action="<?= base_url ?>usuario/edit&id=<?=$identity->id?>" method="POST" enctype="multipart/form-data">

    
</form>

    <form action="<?=base_url?>usuario/edit&id=<?=$id->id?>" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name" value="<?=$id->nombre?>">
        <input type="text" name="lastname" placeholder="Last name" value="<?=$id->apellidos?>">
        <input type="email" name="email" placeholder="Email" value="<?=$id->email?>">
        <label for="about">About</label>
        <textarea name="about"><?=$id->about?></textarea>
        <label for="img">Picture</label>
        <input type="file" name="img">
        <br><br>
        <input type="submit" value="Edit">
    </form>
    

<?php Utils::delete_session('edit') ?>
