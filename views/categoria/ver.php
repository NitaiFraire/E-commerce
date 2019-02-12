<?php if(isset($categoria)):?>
    <h1><?=$categoria->nombre?></h1>

    <?php if($productos->num_rows == 0):?>
        <p>No hay productos para mostrar</p>
    <?php else:?>
    <?php while($pro = $productos->fetch_object()): ?>
                <div class="product">
                    <a href="<?=baseUrl?>Producto/ver&id=<?=$pro->id?>">
                        <?php if($pro->imagen != null): ?>
                            <img src="<?=baseUrl?>uploads/images/<?=$pro->imagen?>">
                        <?php else:?>
                    </a>
                        <img src="<?=baseUrl?>assets/img/camiseta.png" alt="">
                    <?php endif;?>
                    <h2><?= $pro->nombre?></h2>
                    <p><?= $pro->precio?></p>
                    <a href="" class="button">Comprar</a>
                </div>
<?php endwhile;?>
    <?php endif;?>
<?php else:?>
    <h1>La categoria no existe</h1>
<?php endif;?>