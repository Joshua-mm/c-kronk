
<?php if (isset($categoria)): ?>
    <h1><?= $categoria->nombre ?></h1>
    <?php if ($entradas->num_rows == 0): ?>
        <h3>There are no songs to show</h3>
    <?php else: ?>
        <div class="all_entradas">
        <?php while ($ent = $entradas->fetch_object()): ?>
            <?php Utils::getCategoriaById($ent->categoria_id) ?>
            <?php $cat = $_SESSION['category_by_id'] ?>
            <div class="entradas">
                <a href="<?= base_url ?>entrada/view_one&id=<?= $ent->id ?>">
                    <h4><?= $ent->titulo ?> - <?= $ent->artista ?></h4>
                    <span><?= $ent->fecha ?> | <?= $cat->nombre ?></span>
                    <p><?= substr($ent->descripcion, 0, 580) ?></p>
                </a><br><br>
            </div>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>
<?php else: ?>
    <h1>The category doesn´t exist</h1>
<?php endif; ?>

