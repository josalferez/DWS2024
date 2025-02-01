<form method="POST" action="<?= BASE_URL ?>index.php?accion=repartirCartas">
    <label for="jugadores">¿Cuántos jugadores?</label>
    <input type="number" name="jugadores" id="jugadores" min="1" required>
    <button type="submit">Repartir</button>
</form>

<?php if (isset($montones)): ?>
    <h2>Cartas repartidas a <?= $jugadores ?> jugadores:</h2>
    <div class="montones">
        <?php foreach ($montones as $indice => $monton): ?>
            <div class="monton">
                <h3>Jugador <?= $indice + 1 ?></h3>
                <?php foreach ($monton as $carta): ?>
                    <?php
                        $image = "assets/img/" . $carta->getPalo() . "_" . $carta->getNumero() . ".jpg";
                        if (file_exists($image)):
                    ?>
                        <img src="<?= $image ?>" alt="Carta de jugador <?= $indice + 1 ?>">
                    <?php else: ?>
                        <p>No tenemos la imagen de esta carta</p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
