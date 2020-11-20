<?php Utils::isLoged()?>

<h1>My Profile</h1>


<?php $identity = $_SESSION['identity_2'];?>
<?php while($id = $identity->fetch_object()):?>
    <div class="mp_img">
    <?php if(!empty($id->imagen)): ?>
    <img src="<?=base_url?>uploads/images/<?=$id->imagen?>" alt="Profile picture" title="<?=$id->nombre?> <?=$id->apellidos?>">
    <?php endif;?>
    <?php if(empty($id->imagen)):?>
    <img src="<?=base_url?>uploads/images/user.png" alt="Profile picture" title="<?=$id->nombre?> <?=$id->apellidos?>">
    <?php endif; ?>
    <h3><?=$id->nombre?> <?=$id->apellidos?></h3>
</div>
<div class="aboutme"> 
    <p>
        <?=$id->about?>
    </p>
</div>
<?php endwhile;?>


