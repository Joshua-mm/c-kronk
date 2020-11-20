<?php error_reporting(~E_NOTICE); ?>
<?php Utils::isAdmin() ?>
<h1>Manage Categories</h1>
<?php $category = $_SESSION['categories'] ?>
<?php if ($_SESSION['error_add_category']): ?>
    <div class="alerta-error">There was an error while adding a new category</div>
<?php elseif ($_SESSION['add_category']): ?>
    <div class="alerta-ok">Category added successfully</div>
<?php endif; ?>

<?php if ($_SESSION['error_delete_category']): ?>
    <div class="alerta-error">There was an error while deleting a new category</div>
<?php elseif ($_SESSION['delete_category']): ?>
    <div class="alerta-ok">Category deleted successfully</div>
<?php endif; ?>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Functions</th>
    </tr>
    <?php while ($cat = $category->fetch_object()): ?>
        <tr>
            <td><?= $cat->id ?></td>
            <td><?= $cat->nombre ?></td>
            <td><a href="<?= base_url ?>categoria/edit&id=<?= $cat->id ?>">Edit</a> | <a href="<?= base_url ?>categoria/delete&id=<?= $cat->id ?>" style="color: red">Delete</a></td>     
        </tr>
    <?php endwhile; ?> 
</table>
<br><br>
<a class="boton" href="<?= base_url ?>categoria/add">Add new category</a>

<?php Utils::delete_session('error_add_category') ?>
<?php Utils::delete_session('add_category') ?>

<?php Utils::delete_session('error_delete_category') ?>
<?php
Utils::delete_session('delete_category')?>