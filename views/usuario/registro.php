<h1>Registrate</h1>

<?php

if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>

    <strong class="alertSucces">Registro completado</strong>

<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>

    <strong class="alertError">Registro fallido</strong>
<?php endif; ?> 
    
<?php Utils::deleteSession('register'); ?>



<div class="registroContainer">
    <form action="<?=baseUrl?>Usuario/save" class="registro" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" >
    
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" >
    
        <label for="email">Email</label>
        <input type="text" name="email" >
    
        <label for="password">Password</label>
        <input type="password" name="password" >
    
        <input type="submit" value="Registrar">
    </form>
</div>