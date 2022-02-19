<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Video
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/videos">Videos</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/admin/videos/create" class="btn btn-success">Cadastrar Video</a>
            </div>

            <div class="box-body no-padding">
              <table class="table table-striped">
                <?php $counter1=-1;  if( isset($videos) && ( is_array($videos) || $videos instanceof Traversable ) && sizeof($videos) ) foreach( $videos as $key1 => $value1 ){ $counter1++; ?>

                <div class="card">
                  <div class="card-body">           
                    <p class="tituloCards"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    <p class="card-text">
                      <iframe width="560" height="315" src="<?php echo htmlspecialchars( $value1["urlvideo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </p>
                    <a class="btn btn-primary" href="<?php echo htmlspecialchars( $value1["despdf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button">PDF</a>
                    <a href="/admin/videos/<?php echo htmlspecialchars( $value1["idvideo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                  </div>
                </div>
                <?php } ?>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->