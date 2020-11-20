<?php Utils::isAdmin()?>
<?php Utils::showAllCategories()?>
<?php $identity = $_SESSION['identity']?>
<?php $categories = $_SESSION['show_categories']?>
<h1>Add new song</h1>

<form></form>
<form action="<?=base_url?>entrada/save&id=<?=$identity->id?>" method="POST">
    <input type="text" name="titulo" placeholder="Title">
    <input type="text" name="artista" placeholder="Author">
<!--    <input type="text" name="letra" placeholder="Lyrics">-->
    <textarea name="letra">
        
    </textarea>
    <select name="categoria">
        <?php while($cat = $categories->fetch_object()):?>
            <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
        <?php endwhile;?>
    </select><br><br>
    <input type="submit" value="Add">
</form>