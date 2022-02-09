<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="titulos">
<h2>Robô Legos</h2>

</div>
<div class="card-group">
    <div class="card">
 
      <div class="card-body">
       <?php $counter1=-1;  if( isset($videos) && ( is_array($videos) || $videos instanceof Traversable ) && sizeof($videos) ) foreach( $videos as $key1 => $value1 ){ $counter1++; ?>

        <p class="tituloCards"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        <iframe width="430" height="430" src=<?php echo htmlspecialchars( $value1["urlvideo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    
      </div>
      <?php } ?>

    </div>
  