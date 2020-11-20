
<?php if (isset($entradas) && $entradas->num_rows != 0): ?>
    <h1>Results for '<?=$search?>'</h1>
    <div class="all_entradas">
    <?php while ($ent = $entradas->fetch_object()): ?>
        <?php Utils::getCategoriaById($ent->categoria_id) ?>
        <?php $cat = $_SESSION['category_by_id'] ?>
        <div class="entradas">
            <a href="<?= base_url ?>entrada/view_one&id=<?= $ent->id ?>">
                <h4><?= $ent->artista ?> - <?= $ent->titulo ?></h4>
                <span><?= $ent->fecha ?> | <?= $cat->nombre ?></span>
                <p><?= substr($ent->descripcion, 0, 580) ?></p>
            </a><br><br>
        </div>


    <?php endwhile; ?>
    </div>
<?php else: ?>
    <h1>There are no results to show</h1>
<?php endif; ?>


