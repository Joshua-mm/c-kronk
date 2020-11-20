<?php Utils::isAdmin()?>
<h1>Create a new category</h1>
<p>Create a category, so the users can add songs to your new category</p>
<br>
<form action="<?=base_url?>categoria/agregar" method="POST">

</form>

<form action="<?=base_url?>categoria/agregar" method="POST">
    <input type="text" name="name" placeholder="Name of the new category" required><br><br>
    <input type="submit" value="Add" class="btn">
</form>