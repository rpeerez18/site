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
<body>
<div class="titulos">
<h2>Robô Legos</h2>

</div>
<div class="card-group">
    <div class="card">
 
      <div class="card-body">
        <div class="row"> 
       <?php $counter1=-1;  if( isset($videos) && ( is_array($videos) || $videos instanceof Traversable ) && sizeof($videos) ) foreach( $videos as $key1 => $value1 ){ $counter1++; ?>

       <div class=" col-md-4">
        <p class="card-text"><iframe width="430" height="430" src="<?php echo htmlspecialchars( $value1["urlvideo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </p>
        <p class="tituloCards"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
      </div>
        <?php } ?>

     </div>
    </div>
  </div>
</div>