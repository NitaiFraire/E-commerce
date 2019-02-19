<h1>Carrito de compra</h1>
<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
    <table id="carritoTab">
        <tr>
            <th>Imagen</th>
            <th>Nosotros</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
        <?php 
            foreach($carrito as $i => $elemento): 

            $producto = $elemento['producto'];
        ?>
            <tr>
                <td>
                    <?php if($producto->imagen != null): ?>
                        <img src="<?=baseUrl?>uploads/images/<?=$producto->imagen?>" class="imgCarrito"
                    <?php else:?>
                        <img src="<?=baseUrl?>assets/img/camiseta.png" class="imgCarrito">
                    <?php endif;?>
                </td>
                <td>
                    <a href="<?=baseUrl?>Producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
                    
                </td>
                <td>
                    <?=$producto->precio?>
                </td>
                <td>
                    <?=$elemento['unidades']?>
                    <div class="updownUnidades">
                        <a class="button " href="<?=baseUrl?>Carrito/up&index=<?=$i?>">+</a>
                        <a class="button " href="<?=baseUrl?>Carrito/down&index=<?=$i?>">-</a>
                    </div>
                </td>
                <td>
                <a href="<?=baseUrl?>Carrito/remove&index=<?=$i?>" class="button button-gestion-eliminar">Eliminar producto</a>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
    <br>
    <div class="totalCarrito">
        <?php $stats = Utils::statsCarrito()?>
        <h3>Precio total: $<?=$stats['total']?></h3>
        <a href="<?=baseUrl?>Pedido/hacer" class="button button-small ">Realizar pedido</a>
        <a href="<?=baseUrl?>Carrito/deleteAll" class="button button-small button-gestion-eliminar">Vaciar carrito</a>
    </div>
    <?php else:?>
    <p>El carrito esta vacio =( </p>
<?php endif;?>