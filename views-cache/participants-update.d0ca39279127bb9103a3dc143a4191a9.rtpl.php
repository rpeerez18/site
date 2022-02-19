<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Participantes
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Participantes</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/participants/<?php echo htmlspecialchars( $participants["idparticipants"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="descategory">Nome do Participante</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do Participante" value="<?php echo htmlspecialchars( $participants["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              <label for="descategory">Sobrenome do Participante</label>
              <input type="text" class="form-control" id="surname" name="surname" placeholder="Digite o sobrenome do Participante" value="<?php echo htmlspecialchars( $participants["surname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

              <select name="idprojects" class="form-control" id="projects"> 
                <?php $counter1=-1;  if( isset($projects) && ( is_array($projects) || $projects instanceof Traversable ) && sizeof($projects) ) foreach( $projects as $key1 => $value1 ){ $counter1++; ?>

                <option value="<?php echo htmlspecialchars( $value1["idparticipants"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>>
                <?php } ?>

              </select>

            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->