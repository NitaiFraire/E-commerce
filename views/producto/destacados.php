<h1>Algunos de mis productos</h1>

<?php while($pro = $productos->fetch_object()): ?>
                <div class="product">
                    <?php if($pro->imagen != null): ?>
                        <img src="<?=baseUrl?>uploads/images/<?=$pro->imagen?>">
                    <?php else:?>
                        <img src="assets/img/camiseta.png" alt="">
                    <?php endif;?>
                    <h2><?= $pro->nombre?></h2>
                    <p><?= $pro->precio?></p>
                    <a href="" class="button">Comprar</a>
                </div>
<?php endwhile;?>

