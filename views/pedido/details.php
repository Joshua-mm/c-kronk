<?php Utils::isAdmin()?>
<?php Utils::getAllOrders() ?>
<?php $pedido = $_SESSION['order_by_id']?>
<?php Utils::getUserById($pedido->usuario_id)?>
<?php $us = $_SESSION['user_by_id']?>
<?php Utils::getCategoriaById($pedido->categoria_id)?>
<?php $cat = $_SESSION['category_by_id']?>
<?php Utils::getAllOrders()?>
<?php $orders = $_SESSION['all_orders']?>
<h1><?=$pedido->titulo?> - <?=$pedido->autor?></h1>

<pre>
    <b>Order ID: </b> <?=$pedido->id?><br>
    <b>User: </b> <?=$us->nombre?> <?=$us->apellidos?><br>
    <b>Email: </b> <?=$us->email?><br>
    <b>Category: </b> <?=$cat->nombre?><br>
    <b>Title: </b> <?=$pedido->titulo?><br>
    <b>Author: </b> <?=$pedido->autor?><br>
    <b>State: </b> <?=$pedido->estado?><br>
    <b>Order date: </b> <?=$pedido->fecha?>
</pre>
<form></form>
<form action="<?=base_url?>pedido/detalle" method="POST">
    <input type="hidden" name="id" value="<?=$pedido->id?>">
    <select name="state">
        <option value="sent" <?=$pedido->estado == "sent" ? 'selected' : ''?>>Sent</option>
        <option value="ready" <?=$pedido->estado == "ready" ? 'selected' : ''?>>Ready</option>
        <option value="rejected" <?=$pedido->estado == "rejected" ? 'selected' : ''?>>Rejected</option>
    </select><br><br>
    <input type="submit" value="Change state">
</form>
<a href="<?=base_url?>entrada/save_by_id&id=<?=$pedido->id?>">Add song</a>