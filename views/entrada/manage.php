<?php Utils::isAdmin()?>
<?php $entradas = $_SESSION['all_entradas']?>
<?php $ide = $_SESSION['identity']?>
<h1>Manage songs</h1>
<br>
<br>
<?php if(isset($_SESSION['add_entrada']) && $_SESSION['add_entrada']):?>
<div class="alerta-ok">Song added successfully</div>
<?php endif;?>
<?php if(isset($_SESSION['error_add_entrada']) && $_SESSION['error_add_entrada']): ?>
<div class="alerta-error">There was an error while adding a new song</div>
<?php endif; ?>

<?php if (isset($_SESSION['remove_entrada_id']) && $_SESSION['remove_entrada_id']): ?>
<div class="alerta-ok">Song removed successfully</div>
<?php endif;?>
<?php if (isset($_SESSION['error_remove_entrada_id']) && $_SESSION['error_remove_entrada_id']): ?>
<div class="alerta-error">There was an error while removing a song</div>
<?php endif;?>
<a href="<?=base_url?>entrada/add&id=<?=$ide->id?>" class="boton">Add new song</a><br><br>
<table>
    <tr>
        <th>Song ID</th>
        <th>User</th>
        <th>Category</th>
        <th>Title</th>
        <th>Author</th>
        <th>Date</th>
        <th>Manage</th>
    </tr>
            <?php while($ent = $entradas->fetch_object()):?>
    <tr>

            <?php Utils::getUserById($ent->usuario_id)?>
            <?php $us = $_SESSION['user_by_id']?>
            <?php Utils::getCategoriaById($ent->categoria_id);?>
            <?php $cat = $_SESSION['category_by_id']?>
            <td><?=$ent->id?></td>
            <td><?=$us->nombre?></td>
            <td><?=$cat->nombre?></td>
            <td><?=$ent->titulo?></td>
            <td><?=$ent->artista?></td>
            <td><?=$ent->fecha?></td>
            <td><a href="<?=base_url?>entrada/view_one&id=<?=$ent->id?>">View song</a> | <a href="<?=base_url?>entrada/remove_one&id=<?=$ent->id?>" style="color:  red"> Remove</a></td>       
    </tr>
            <?php endwhile;?>
</table>

<?php Utils::delete_session('add_entrada')?>
<?php Utils::delete_session('error_add_entrada')?>
<?php Utils::delete_session('remove_entrada_id')?>
<?php Utils::delete_session('error_remove_entrada_id')?>