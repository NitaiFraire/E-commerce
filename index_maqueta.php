<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tienda de camisetas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Contrail+One" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div id="container">
        <header id="header">
            <div id="logo">
                <img src="assets/img/yokoskull.png">
                <a href="index.php">
                    Nitai's Store 2600
                </a>
            </div>
        </header>
        <nav id="menu">
            <ul>
                <li><a href="">Inicio</a></li>
                <li><a href="">Categoria</a></li>
                <li><a href="">Categoria</a></li>
                <li><a href="">Categoria</a></li>
            </ul>
        </nav>
        <div id="content">
            <aside id="lateral">
                <div id="login" class="block_aside">
                    <h3>Iniciar Sesión</h3>
                    <form action="#" method="POST">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="">

                        <label for="password">Password</label>
                        <input type="password" name="password" id="">
                        
                        <input type="submit" value="Ingresar">
                    </form>
                    <ul>
                        <li><a href="#">Mis pedidos</a></li>
                        <li><a href="#">Gestionar pedidos</a></li>
                        <li><a href="#">Gestionar categorias</a></li>
                    </ul>
                </div>
            </aside>
            <div id="central">
                <h1>Productos destacados</h1>
                <div class="product">
                    <img src="assets/img/camiseta.png">
                    <h2>Camiseta polo</h2>
                    <p>$300</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png">
                    <h2>Camiseta polo</h2>
                    <p>$300</p>
                    <a href="" class="button">Comprar</a>
                </div>   
                <div class="product">
                    <img src="assets/img/camiseta.png">
                    <h2>Camiseta polo</h2>
                    <p>$300</p>
                    <a href="" class="button">Comprar</a>
                </div>   
            </div>
        </div>
        <footer id="footer">
            <p>Developed by n3T6i &copy; <?=date('Y') ?></p>
        </footer>
    </div>
</body>
</html>