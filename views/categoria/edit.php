<?php Utils::isAdmin()?>
<h1>Edit a category</h1>

<br>
<form action="<?=base_url?>categoria/agregar" method="POST">

</form>
<?php Utils::showOneCategory()?>
<?php $categories = $_SESSION['show_one_category']?>
<form action="<?=base_url?>categoria/editar&id=<?=$categories->id?>" method="POST">
    <input type="text" name="name" placeholder="Name of the new category" value="<?=$categories->nombre?>"required><br><br>
    <input type="submit" value="Edit" class="btn">
</form>
