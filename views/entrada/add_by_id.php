<?php Utils::isAdmin()?>


<?php $ped = $_SESSION['order_by_id']?>
<?php Utils::getUserById($ped->id) ?>
<?php  $us = $_SESSION['user_by_id'] ?>
<?php Utils::getCategoriaById($ped->categoria_id)?>
<?php $cate = $_SESSION['category_by_id'];?> 
<?php Utils::showAllCategories()?>
<?php $categorias = $_SESSION['show_categories']?>
<h1><?=$ped->autor?> - <?=$ped->titulo?></h1>


<form></form>
<form action="<?=base_url?>entrada/save&id=<?=$us->id?>&edit=true" method="POST">
    <input type="text" value="<?=$us->nombre?> <?=$us->apellidos?>" disabled>
    <input type="text" name="titulo" placeholder="Title" value="<?=$ped->titulo?>">
    <input type="text" name="artista" placeholder="Author" value="<?=$ped->autor?>">
    <textarea name="letra"></textarea>
    <select name="categoria">
        <?php while($cat = $categorias->fetch_object()):?>
            <option value="<?=$cat->id?>" <?=$cate->nombre == $cat->nombre ? 'selected' : ''?>><?=$cat->nombre?></option>
        <?php endwhile;?>
    </select><br><br>
    <input type="submit" value="Add">
</form>
