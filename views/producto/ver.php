<?php if (isset($pro)) : ?>
    <h1><?= $pro->nombre ?></h1>
    <div class="detailProduct">
        <div class="image">
            <?php if ($pro->imagen != null) : ?>
                <img src="<?= baseUrl ?>uploads/images/<?= $pro->imagen ?>">
            <?php else : ?>
                <img src="<?= baseUrl ?>assets/img/camiseta.png" alt="">
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="description"><?= $pro->descripcion ?></p>
            <p class="price">$<?= $pro->precio ?></p>
            <a href="" class="button">Comprar</a>
        </div>
    </div>
<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif; ?>