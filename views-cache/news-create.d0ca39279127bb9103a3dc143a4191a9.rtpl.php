<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Notícias
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/categories">Categorias</a></li>
    <li class="active"><a href="/admin/categories/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Nova Notícia</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/news/create" enctype="multipart/form-data" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="title">Titulo da Noticia</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Digite o titulo da noticia">
            </div>
            <div class="form-group">
              <label for="subtitle">Subtítulo da Notícia</label>
              <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Digite o subtítulo da notícia">
            </div>
            <div class="form-group">
              <label for="nameAuthor">Nome Autor</label>
              <input type="text" class="form-control" id="nameAuthor" name="nameAuthor" placeholder="Digite o nome do autor">
            </div>
            <div class="form-group">
              <label for="surname">Sobrenome Autor</label>
              <input type="text" class="form-control" id="surname" name="surname" placeholder="Digite o sobrenome do autor">
            </div>
            <div class="form-group">
              <label for="textNews">Noticia</label>
            </div>
            <textarea class="form-control" id="textNews" name="textNews" rows="10" cols="190" placeholder="Digite o corpo da noticia"></textarea>
            <div class="form-group">
              <label for="textNews">Fotos</label>
              <input type="file" class="form-control" id="desphoto" name="desphoto">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->