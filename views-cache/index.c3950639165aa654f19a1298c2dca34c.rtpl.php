<?php if(!class_exists('Rain\Tpl')){exit;}?><!--banner principal-->
<section>
  <img class="imgInicial" src="res/site/img/Legoroboti.png" width="10%" alt="imgInicial">
</section>
<!--fim do banner principal-->
<!--teste de alerta-->
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
      <p class="card-text">Lorem ipsum donec eu ornare integer orci sit ultrices etiam mauris, fringilla fermentum molestie eget tempor curabitur vitae aliquam in. nullam libero quisque et habitant proin nulla integer egestas tortor ultricies, dapibus molestie rhoncus lobortis et hendrerit consectetur rhoncus aliquet. adipiscing dictum nec phasellus scelerisque donec feugiat mi torquent, morbi iaculis lectus purus consectetur urna non. 
      <button class="buttonPainel"><a class="nav-link" href="tutorial.html">Tutoriais</a></button></p> 
         
    </div>
  </div>
  <!--fim do card 1-->
  <!--card 2-->
  <div class="card">

    <div class="card-body">
   
      <h3>Notícias</h3>
     <?php $counter1=-1;  if( isset($news) && ( is_array($news) || $news instanceof Traversable ) && sizeof($news) ) foreach( $news as $key1 => $value1 ){ $counter1++; ?>

      <p class="card-text"><?php echo htmlspecialchars( $value1["textNews"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
      <img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
    
      <?php } ?>

    </div>
  </div>
  <!-- fim do card 2-->
  <!--card 3-->
  <div class="card">
    
    <h3>Projetos</h3>
    <div class="card-body">
     
      <p class="card-text">
          ullamcorper dictum class, facilisis vivamus eros porttitor facilisis tellus. gravida tempus malesuada rhoncus sem semper egestas facilisis blandit morbi mi placerat at accumsan, consectetur metus faucibus tellus eros luctus porttitor nulla ornare ut proin. vel quisque bibendum lacinia, ultrices enim. <button class="buttonPainel"><a class="nav-link" href="projetos.html">Projetos</a></button> </p>
     
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
