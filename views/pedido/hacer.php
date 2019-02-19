
<?php if(isset($_SESSION['identified'])): ?>
    <h1>Hacer pedido</h1>
    <p>
        <a href="<?=baseUrl?>Carrito/index">Ver los productos y el precio de pedido</a>
    </p>
    <br>
    <h3>A donde te mandamos tu pedido?</h3>
    <form action="<?=baseUrl?>Pedido/add" method="POST" class="formContainer">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" required>

        <label for="localidad">Ciudad</label>
        <input type="text" name="localidad" required>

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" required>

        <input type="submit" value="Confirmar" required>
    </form>
<?php else: ?>
    <h1>Identificate!!</h1>
    <p>Necesitas estar logueado para realizar pedidos</p>
<?php endif;?>