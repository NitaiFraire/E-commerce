<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>

    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Estamos procesando tu pedido, una vez realizada la transferencia bancaria con el coste del
        pedido, será procesado y enviado.
    </p>

    <br>

    <?php if(isset($pedido)):?>
        <h3>Datos del pedido:</h3>
            Número de pedido: <strong><?=$pedido->id?></strong> <br>
            Total a pagar: <strong><?=$pedido->coste?></strong> <br>
            Productos:           
            <table>
            <tr>
                <th>Imagen</th>
                <th>Nosotros</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>
             <?php while($producto = $productos->fetch_object()):?>
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
                        <?=$producto->unidades?>
                    </td>
                </tr>
             <?php endwhile;?>
            </table>              
    <?php endif;?>

<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>

    <h1>Tu pedido no ha podido procesarse =( intenta de nuevo ;)</h1>
<?php endif;?>