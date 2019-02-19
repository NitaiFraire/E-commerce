<h1>Carrito de compra</h1>

<table id="carritoTab">
    <tr>
        <th>Imagen</th>
        <th>Nosotros</th>
        <th>Precio</th>
        <th>Unidades</th>
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
            </td>
        </tr>
    <?php endforeach;?>
</table>
<br>

<div class="totalCarrito">
    <?php $stats = Utils::statsCarrito()?>
    <h3>Precio total: $<?=$stats['total']?></h3>
    <a href="<?=baseUrl?>Pedido/hacer" class="button button-small ">Realizar pedido</a>
</div>