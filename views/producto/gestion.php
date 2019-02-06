<h1>Gestion de productos</h1>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <strong class="alertSucces">El producto creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'):?>
    <strong class="alertError">Erro al crear producto</strong>
<?php endif;?>
<?php Utils::deleteSession('producto');?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alertSucces">Producto borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alertError">Error al eliminar producto</strong>
<?php endif; ?>

<?php Utils::deleteSession('delete'); ?>

<table id="productos">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
    <?php while($pro = $productos->fetch_object()): ?>
    <tr>
        <td><?= $pro->id; ?></td>
        <td><?= $pro->nombre; ?></td>
        <td><?= $pro->precio; ?></td>
        <td><?= $pro->stock; ?></td>
        <td>
            <a href="<?=baseUrl?>Producto/eliminar&id=<?=$pro->id?>" class="button button-gestion-eliminar button-small">Eliminar</a>
            <a href="<?=baseUrl?>Producto/editar&id=<?=$pro->id?>" class="button button-gestion-editar button-small">Editar</a>
        </td>
    </tr>    
    <?php endwhile;?>
</table>

<a href="<?=baseUrl?>Producto/crear" class="button button-small">Crear producto</a>