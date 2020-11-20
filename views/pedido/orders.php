<?php Utils::isLoged()?>
<?php Utils::showAllCategories()?>
<?php $categories = $_SESSION['show_categories'];?>
<?php $identity = $_SESSION['identity']; ?>
<h1>Ask for a song</h1>

<form action="<?=base_url?>pedido/save" method="POST">
</form>
<form action="<?=base_url?>pedido/save&id=<?=$identity->id?>" method="POST">
    <input type="hidden" name="estado" value="sent">
    <input type="text" name="titulo" placeholder="Title">
    <input type="text" name="autor" placeholder="Author"><br><br>
    <label for="category">Category</label>
    <select name="category">
        <?php while($cat = $categories->fetch_object()):?>
        <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
        <?php endwhile;?>
    </select><br><br>
    
    <input type="submit" value="Ask">
</form>