<?php Utils::isLoged()?>
<?php $identity = $_SESSION['identity']?>
<?php $favorito = $_SESSION['show_fav']?>
<h1>Favorite songs</h1>

<?php if(isset($_SESSION['remove_favoritos_id']) && $_SESSION['remove_favoritos_id']): ?>
<div class="alerta-ok">Song removed from favorite successfully</div>
<?php endif;?>
<?php if(isset($_SESSION['error_remove_favoritos_id']) && $_SESSION['error_remove_favoritos_id']): ?>
<div class="alerta-error">There was an error while removing a song from favorite</div>
<?php endif;?>
<table>
    <tr>
        <th>Category</th>
        <th>Title</th>
        <th>Author</th>
        <th>Date</th>
        <th>Functions</th>
    </tr>
    <?php while($fav = $favorito->fetch_object()):?>
    <?php Utils::getCategoriaById($fav->categoria_id)?>
    <?php $cat = $_SESSION['category_by_id']?>
    
    <tr>
        <td><?=$cat->nombre?></td>
        <td><?=$fav->titulo?></td>
        <td><?=$fav->autor?></td>
        <td><?=$fav->fecha?></td>
        <td><a href="<?=base_url?>entrada/view_one&id=<?=$fav->entrada_id?>">View song</a> | <a href="<?=base_url?>favorito/remove_one&id=<?=$fav->id?>&user_id=<?=$identity->id?>" style="color: red">Remove</a></td>
    </tr>
    </a>
    <?php endwhile; ?>
</table>

<?php Utils::delete_session('remove_favoritos_id');?>
<?php Utils::delete_session('error_remove_favoritos_id');?>