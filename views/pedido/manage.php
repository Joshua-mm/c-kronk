<?php Utils::isAdmin() ?>
<?php Utils::getAllOrders() ?>
<?php $pedidos = $_SESSION['all_orders'] ?>
<?php Utils::showAllCategories()?>
<?php $categories = $_SESSION['show_categories']?>

<h1>Manage orders</h1>
<?php if(isset($_SESSION['remove_order']) && $_SESSION['remove_order']):?>
<div class="alerta-ok">Order removed successfully</div>
<?php endif; ?>
<?php if(isset($_SESSION['error_remove_order']) && $_SESSION['error_remove_order']):?>
<div class="alerta-error">There was an error while removing an order</div>
<?php endif; ?>
<?php if(isset($_SESSION['remove_all']) && $_SESSION['remove_all']):?>
<div class="alerta-ok">All orders removed successfully</div>
<?php endif; ?>
<?php if(isset($_SESSION['error_remove_all']) && $_SESSION['error_remove_all']):?>
<div class="alerta-error">There was an error while removing the orders</div>
<?php endif; ?>
<?php if(isset($_SESSION['add_entrada']) && $_SESSION['add_entrada']):?>
<div class="alerta-ok">Song added successfully, please change the state of the song</div>
<?php endif;?>
<?php if(isset($_SESSION['error_add_entrada']) && $_SESSION['error_add_entrada']): ?>
<div class="alerta-error">There was an error while adding a new song</div>
<?php endif; ?>
<table>
    <tr>
        <th>User</th>
        <th>Category</th>
        <th>Title</th>
        <th>Author</th>
        <th>State</th>
        <th>Date</th>
        <th>Manage</th>
    </tr>
    <?php while($ped = $pedidos->fetch_object()):?>
    <?php Utils::getCategoriaById($ped->categoria_id)?>
    <?php $cat = $_SESSION['category_by_id'];?>
    <?php Utils::getUserById($ped->usuario_id)?>
    <?php $us = $_SESSION['user_by_id'];?>
    <tr>
        <td><?=$us->nombre?> <?=$us->apellidos?></td>
        <td><?=$cat->nombre?></td>
        <td><?=$ped->titulo?></td>
        <td><?=$ped->autor?></td>
        <td style="color: green"><?=$ped->estado?></td>
        <td><?=$ped->fecha?></td>
        <td><a href="<?=base_url?>pedido/details&id=<?=$ped->id?>">view order</a> | <a href="<?=base_url?>pedido/removeOneAdmin&id=<?=$ped->id?>" style="color: red">Remove</a></td>
    </tr>
    <?php endwhile; ?>
</table>
<br><br>
<a href="<?=base_url?>pedido/remove_all" style="padding-left: 8px; color: red;" >Remove all orders</a>

<?php Utils::delete_session('remove_order')?>
<?php Utils::delete_session('error_remove_order')?>
<?php Utils::delete_session('remove_all')?>
<?php Utils::delete_session('error_remove_all')?>

<?php Utils::delete_session('add_entrada')?>
<?php Utils::delete_session('error_add_entrada')?>