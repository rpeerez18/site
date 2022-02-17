<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipe de robótica IFPR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/res/site/css/style.css">
    <link rel="shortcut icon" href="imagens/icons8-glasses-100.png" type="image/x-icon">
</head>

<div class="alert alert-success" role="alert">
    <div class="text-center">
    <h4 class="alert-heading">Ultimas noticia de Robótica!</h4>
</div>

</div>
<div class="card-group">
    <div class="card">
 
      <div class="card-body">
        <div class="row"> 
       <?php $counter1=-1;  if( isset($news) && ( is_array($news) || $news instanceof Traversable ) && sizeof($news) ) foreach( $news as $key1 => $value1 ){ $counter1++; ?>
       <div class=" col-md-4">
        <h1><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
        <h3><?php echo htmlspecialchars( $value1["subtitle"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
        <img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"width="400px">
        <p class="textonoticias"><?php echo htmlspecialchars( $value1["textNews"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <p class="tituloCards">Nome Autor <?php echo htmlspecialchars( $value1["nameAuthor"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["surname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
       
      </div>
        <?php } ?>
     </div>
    </div>
  </div>
</div>