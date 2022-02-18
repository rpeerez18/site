<?php if(!class_exists('Rain\Tpl')){exit;}?><head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Equipe de robótica IFPR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="/res/site/css/style.css">
  <link rel="shortcut icon" href="imagens/icons8-glasses-100.png" type="image/x-icon">
</head>

    <div class="card-group">
      <div class="card">
   
        <div class="card-body">
          <div class="row"> 
         <?php $counter1=-1;  if( isset($projects) && ( is_array($projects) || $projects instanceof Traversable ) && sizeof($projects) ) foreach( $projects as $key1 => $value1 ){ $counter1++; ?>

         <div class=" col-md-4">
          <h1><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
          <img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"width="400px">
          <p text-align: justify class="card-text"><?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
          <p class="tituloCards">Participantes <?php echo htmlspecialchars( $value1["participants"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
          <p>Inicio do Projeto <?php echo date('d /m /Y', strtotime($value1["begin"])); ?></p>
          <p>Fim do Projeto <?php echo date('d /m /Y', strtotime($value1["end"])); ?></p>
          <a class="btn btn-primary" href="<?php echo htmlspecialchars( $value1["despdf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">PDF</a>
        </div>
          <?php } ?>

       </div>
      </div>
    </div>
  </div>
