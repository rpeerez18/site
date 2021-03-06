<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Video
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
          <h3 class="box-title">Novo Video</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/videos/create" enctype="multipart/form-data" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="title">Nome do Video</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Digite o nome do video">
            </div>
            <div class="form-group">
              <label for="urlvideo">url</label>
              <input type="text" class="form-control" id="urlvideo" name="urlvideo" placeholder="Digite a url do video">
            </div>
            <div class="form-group">
              <label for="despdf">PDF</label>
              <input type="file" class="form-control" id="despdf" name="despdf">
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