<?php Utils::isLoged()?>
<?php $pedidos = $_SESSION['pedidos']; ?>
<?php $identity = $_SESSION['identity']; ?>
<h1>Songs requested</h1>
<?php if(isset($_SESSION['add_pedido']) && $_SESSION['add_pedido']):?>
<div class="alerta-ok">Song requested successfully</div>
<?php endif; ?>
<?php if(isset($_SESSION['error_add_pedido']) && $_SESSION['error_add_pedido']):?>
<div class="alerta-error">There was an error while adding a new order</div>
<?php endif; ?>

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

<table>
    <tr>
        <th>Title</th>
        <th>Author</th> 
        <th>State</th>
        <th>Order date</th>
        <th>Functions</th>
    </tr>

   <?php while($ped = $pedidos->fetch_object()):?>
    <tr>
        <td><?=$ped->titulo?></td>
        <td><?=$ped->autor?></td>
        <td style="color: green"><?=$ped->estado?></td>
        <td><?=$ped->fecha?></td>
        <td><a href="<?=base_url?>pedido/removeOne&id=<?=$ped->id?>" style="color: red">Remove</a></td>
    </tr>
    <?php endwhile;?>
</table>
<br><br>
<a href="<?=base_url?>pedido/remove_all_by_user&id=<?=$identity->id?>" style="padding-left: 28px; color: red;" >Remove all orders</a>
<?php Utils::delete_session('add_pedido')?>
<?php Utils::delete_session('error_add_pedido')?>
<?php Utils::delete_session('remove_order')?>
<?php Utils::delete_session('error_remove_order')?>
<?php Utils::delete_session('remove_all')?>
<?php Utils::delete_session('error_remove_all')?>