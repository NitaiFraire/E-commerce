
            <aside id="lateral">

                <div id="miCarrito" class="block_aside">
                    <h3>Mi carrito</h3>
                    <ul>
                        <?php $stats = Utils::statsCarrito();?>
                        <li><a href="<?=baseUrl?>Carrito/index">Productos (<?=$stats['count']?>)</a></li>
                        <li><a href="<?=baseUrl?>Carrito/index">Total $<?=$stats['total']?></a></li>
                        <li><a href="<?=baseUrl?>Carrito/index">Ver carrito</a></li>
                    </ul>
                </div>

                <div id="login" class="block_aside">

                <?php if(isset($_SESSION['identified'])): ?>

                    <h3><?=$_SESSION['identified']->nombre . ' ' . $_SESSION['identified']->apellidos?></h3>

                <?php elseif(isset($_SESSION['error_login'])): ?>

                    <p class="alertErrorP alertError"><?=$_SESSION['error_login']?></p>

                    <?php 
                        Utils::deleteSession('error_login');
                        endif;
                     ?>
                
                <?php if(!isset($_SESSION['identified'])): ?>
                    <h3>Iniciar Sesión</h3>
                    <form action="<?=baseUrl?>Usuario/login" method="POST">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="">

                        <label for="password">Password</label>
                        <input type="password" name="password" id="">
                        
                        <input type="submit" value="Ingresar">
                    </form>
                <?php endif;?>

                    <ul>
                        <?php if(isset($_SESSION['admin'])):?>
                            <li><a href="<?=baseUrl?>Categoria/index">Gestionar categorias</a></li>
                            <li><a href="<?=baseUrl?>Producto/gestion">Gestionar producto</a></li>
                            <li><a href="<?=baseUrl?>Pedido/gestion">Gestionar pedidos</a></li>
                        <?php endif;?>
                        <?php if(isset($_SESSION['identified'])):?>
                            <li><a href="<?=baseUrl?>Pedido/misPedidos">Mis pedidos</a></li>
                            <li><a href="<?=baseUrl?>Usuario/logout">Cerrar sesión</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </aside>
            <div id="central">


            <?php
