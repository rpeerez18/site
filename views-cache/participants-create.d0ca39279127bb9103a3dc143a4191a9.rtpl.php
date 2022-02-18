<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Participantes
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/participants">Participantes</a></li>
    <li class="active"><a href="/admin/participants/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo participantes</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/participants/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="descategory">Nome do Participante</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do participante">
              <label for="descategory">Sobrenome do Participante</label>
              <input type="text" class="form-control" id="surname" name="surname" placeholder="Digite o sobrenome do participante">
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