<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Projetos
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Projeto</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/projects/<?php echo htmlspecialchars( $projects["idprojects"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="title">Titulo do Projeto</label>
              <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars( $projects["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="description">Descrição do Projeto</label>
              <textarea class="form-control" id="description" name="description" rows="10" cols="190"><?php echo htmlspecialchars( $projects["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
            </div>
            <div class="form-group">
              <label for="begin">Data de Inicio</label>
              <input type="date" class="form-control" id="begin" name="begin" value="<?php echo htmlspecialchars( $projects["begin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="end">Data de Termino</label>
              <input type="date" class="form-control" id="end" name="end" value="<?php echo htmlspecialchars( $projects["end"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="despdf">PDF<a href="<?php echo htmlspecialchars( $pdf, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $pdf, ENT_COMPAT, 'UTF-8', FALSE ); ?></label>
              <input type="file" class="form-control" id="despdf" name="despdf">
            </div>
            <div class="form-group">
              <label for="file">Foto</label>
              <input type="file" class="form-control" id="file" name="file" value="<?php echo htmlspecialchars( $projects["participants"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              <div class="box box-widget">
                <div class="box-body">
                  <img class="img-responsive" id="image-preview" src="<?php echo htmlspecialchars( $projects["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Photo">
                </div>
              </div>
            </div>
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
<script>
document.querySelector('#file').addEventListener('change', function(){
  
  var file = new FileReader();

  file.onload = function() {
    
    document.querySelector('#image-preview').src = file.result;

  }

  file.readAsDataURL(this.files[0]);

});
</script>