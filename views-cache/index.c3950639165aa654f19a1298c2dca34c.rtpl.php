<?php if(!class_exists('Rain\Tpl')){exit;}?><!--teste de alerta-->
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Equipe de robótica IFPR do campus Assis Chateaubriand</h4>
  <p>Seja bem vindo ao nosso site! Nosso ambiente virtual foi implementado e modelado para equipe de robotica do IFPR campus Assis Chateaubriand para aplicação de conteúdos que eles desenvolvem e oferecer a comunidade a conhecer mais sobre a robótica do campus.</p>
  <hr>
  
</div>
<!--fim de teste de alerta-->
<!--area dos cards-->
<!--card 1-->
<div class="card-group">
  <div class="card">

    <div class="card-body">

      <h3>Tutoriais de Robô Lego</h3>
      <p class="card-text">
      <img src="/res/site/img/tutorial.png" alt=""  width="300px"></p>
      <a class="btn btn-primary" href="tutorial" role="button">Tutoriais</a>
    </div>
  </div>
  <!--fim do card 1-->
  <!--card 2-->
  <div class="card">

    <div class="card-body">
   
      <h3>Notícias</h3>
     <?php $counter1=-1;  if( isset($news) && ( is_array($news) || $news instanceof Traversable ) && sizeof($news) ) foreach( $news as $key1 => $value1 ){ $counter1++; ?>

      <img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt=""  width="300px">
      <p class="noticias"><?php echo htmlspecialchars( $value1["textNews"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
      <?php } ?>

    </div>
  </div>
  <!-- fim do card 2-->
  <!--card 3-->
  <div class="card">
    
    <h3>Projetos</h3>
    <div class="card-body">
      <?php $counter1=-1;  if( isset($projects) && ( is_array($projects) || $projects instanceof Traversable ) && sizeof($projects) ) foreach( $projects as $key1 => $value1 ){ $counter1++; ?>

      <p class="card-text"><?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p> 
         <?php } ?>

         <a class="btn btn-primary" href="projetos" role="button">Projetos</a>
    </div>
  </div>
</div>
<!--fim do card3-->
<!--fim da area dos cards-->
<!--barra das redes sociais-->
<div class="redessociais">
  <ul>
      <li><a href=""><img src="res/site/img/face.png"></a></li>
      <li><a href=""><img src="res/site/img/tw.png"></a></li>
      <li><a href=""><img src="res/site/img/rss.png"></a></li>
  </ul>
</div>
<!--fim da barra das redes sociais-->
