

<?php if (!is_dir('assets/img')): ?>
    <p class="error">No tenemos imágenes disponibles.</p>
<?php else: ?>
    <div class="cartas">
        <?php if (isset($cartaSacada)): ?>
            <div class="carta-sacada">
                <h3>Carta extraída:</h3>
                <?php
                    $image = "assets/img/" . $cartaSacada->getPalo() . "_" . $cartaSacada->getNumero() . ".jpg";
                    if (file_exists($image)):
                ?>
                    <img src="<?= $image ?>" alt="Carta extraída" class="carta grande">
                <?php else: ?>
                    <p class="error">No tenemos la imagen de esta carta</p>
                <?php endif; ?>
            </div>
            <hr>
        <?php endif; ?>

        <h3>Cartas restantes:</h3>
        <div class="mazo">
            <?php foreach ($mazo as $carta): ?>
                <?php
                    $image = "assets/img/" . $carta->getPalo() . "_" . $carta->getNumero() . ".jpg";
                    if (file_exists($image)):
                ?>
                    <img src="<?= $image ?>" alt="Carta del mazo" class="carta">
                <?php else: ?>
                    <p class="error">No tenemos la imagen de esta carta</p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

