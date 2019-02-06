<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Editar producto <?=$pro->nombre ?></h1>
    <?php $urlAction = baseUrl . 'Producto/save&id=' . $pro->id;?>
<?php else:?>
    <h1>Crear nuevos productos</h1>
    <?php $urlAction =  baseUrl . 'Producto/save'; ?>
<?php endif;?>

<form action="<?=$urlAction?>" method="POST" class="formContainer" enctype="multipart/form-data">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required value="<?= isset($edit) ? $pro->nombre : '' ;?>">
    
    <label for="descripcion">Descripcion</label>
    <textarea name="descripcion" cols="48" required><?= isset($edit) ? $pro->descripcion : ''; ?></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" required value="<?= isset($edit) ? $pro->precio : ''; ?>">

    <label for="stock">Stock</label>
    <input type="number" name="stock" required value="<?= isset($edit) ? $pro->stock : '' ?>">

    <label for="categoria">Categoria</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria">
        <?php while ($cat = $categorias->fetch_object()) : ?>
            <option value="<?= $cat->id ?>" <?= isset($edit) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                <?= $cat->nombre ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="imagen">Imagen</label>
    <?php if(isset($edit) && !empty($pro->imagen)): ?>
        <img src="<?=baseUrl?>/uploads/images/<?= $pro->imagen ?>" class="thumb" alt="Imagen no disponible">
    <?php else:?>
        <p class="alertError alertErrorP">Imagen no disponible</p>
    <?php endif;?>
    <input type="file" name="imagen">

    <input type="submit" value="Guardar">
</form>