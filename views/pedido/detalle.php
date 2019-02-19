<h1>Detalle del pedido</h1>

<?php if(isset($pedido)):?>

    <?php if(isset($_SESSION['admin'])):?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?=baseUrl?>Pedido/estado" method="POST">
        <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
            <select name="estado">
                <option value="confirm" <?=$pedido->estado == 'confirm' ? 'selected' : '';?>>Pendiente</option>
                <option value="preparation" <?=$pedido->estado == 'preparation' ? 'selected' : '';?>>En preparacion</option>
                <option value="ready" <?=$pedido->estado == 'ready' ? 'selected' : '';?>>Listo para enviar</option>
                <option value="sended" <?=$pedido->estado == 'sended' ? 'selected' : '';?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado">
        </form>
        <br>
    <?php endif;?>

        <h3>Detalles del envio</h3>
            Provincia: <strong><?=$pedido->provincia?></strong> <br>
            Ciudad: <strong><?=$pedido->localidad?></strong> <br>
            Direccion: <strong><?=$pedido->direccion?></strong> <br><br>

        <h3>Datos del pedido:</h3>
            Estado: <strong><?=Utils::showStatus($pedido->estado)?></strong> <br>
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