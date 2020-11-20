

<?php $ent = $_SESSION['one_entrada']?>
<?php Utils::getCategoriaById($ent->categoria_id)?>
<?php $cat = $_SESSION['category_by_id']?>
<?php Utils::getUserById($ent->usuario_id)?>
<?php $us = $_SESSION['user_by_id']?>
<h1><?=$ent->artista?> - <?=$ent->titulo?> </h1>
<?php if(isset($_SESSION['identity'])):?>
<?php $identity = $_SESSION['identity']?>

<a href="<?=base_url?>favorito/add&entrada_id=<?=$ent->id?>&usuario_id=<?=$identity->id?>&categoria_id=<?=$cat->id?>">Añadir a favoritos</a><br><br><?php endif; ?>    <div class="datos_entrada"><span><a class="texto-span">Date:</a> <?=$ent->fecha?></span>  <span><a class="texto-span">Category:</a> <?=$cat->nombre?></span> <span><a class="texto-span">User:</a> <?=$us->nombre?> <?=$us->apellidos?></span></div>
<div class="entrada_pre">
<pre>                                                                                 
    <?=$ent->descripcion?>                              
</pre>
</div>