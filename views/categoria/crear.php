<h1>Crear categoria</h1>

<form action="<?=baseUrl?>Categoria/save" method="POST" class="registro">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>

    <input type="submit" value="Crear">
</form>