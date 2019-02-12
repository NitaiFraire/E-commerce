<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nitai's Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Contrail+One" rel="stylesheet"> 
    <link rel="stylesheet" href="<?=baseUrl?>assets/css/styles.css">
</head>
<body>
    <div id="container">
        <header id="header">
            <div id="logo">
                <img src="<?=baseUrl?>assets/img/yokoskull.png">
                <a href="index.php">
                    Nitai's Store 2600
                </a>
            </div>
        </header>
        <?php $categorias = Utils::showCategorias(); ?>
        <nav id="menu">
            <ul>
                <li><a href="<?=baseUrl?>Usuario/registro">Registrate</a></li>
                <li><a href="<?=baseUrl?>">Inicio</a></li>
                <?php while($cat = $categorias->fetch_object()): ?>
                    <li><a href="<?=baseUrl?>Categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a></li>
                <?php endwhile;?>
            </ul>
        </nav>
        <div id="content">