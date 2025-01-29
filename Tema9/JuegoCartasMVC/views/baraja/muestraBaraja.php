<?php if (!is_dir('assets/img')): ?>
    <p>No se encontraron imágenes.</p>
<?php else: ?>
    <?php foreach ($mazo as $carta): ?>
        <?php $imagePath = "assets/img/{$carta->getPalo()}_{$carta->getNumero()}.jpg"; ?>
        <?php if (file_exists($imagePath)): ?>
            <img src="<?= $imagePath ?>" alt="<?= $carta ?>">
        <?php else: ?>
            <p>Imagen para <?= $carta ?> no encontrada.</p>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>