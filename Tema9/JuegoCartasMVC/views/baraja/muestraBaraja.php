<?php if (!is_dir('assets/img')): ?>
    <p class="error">No tenemos imágenes disponibles.</p>
<?php else: ?>
    <div class="cartas">
        <?php foreach ($mazo as $carta): ?>
            <?php
                $image = "assets/img/" . $carta->getPalo() . "_" . $carta->getNumero() . ".jpg";
                if (file_exists($image)):
            ?>
                <img src="<?= $image ?>" alt="<?= $carta ?>" class="carta">
            <?php else: ?>
                <p class="error">No tenemos la imagen de <?= $carta ?></p>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
