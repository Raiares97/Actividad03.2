<?php
$id = $title = $content = $imagen= "";

if ($dataToView["data"]->getId() !== null) {
    $id = $dataToView["data"]->getId();
}
if ($dataToView["data"]->getTitulo() !== null) {
    $titulo = $dataToView["data"]->getTitulo();
}
if ($dataToView["data"]->getContenido() !== null) {
    $contenido = $dataToView["data"]->getContenido();
}
if ($dataToView["data"]->getImagen() !== null) {
    $imagen = $dataToView["data"]->getImagen();
}
?>
<div class="row">
    <!--Solo se establece un campo "error" si se ha realizado un (save) exitoso o no-->
    <?php
    if ($dataToView["data"]->getEstado() === Util::OPERATION_OK):
        ?>
        <div class="alert alert-success">
            Operación realizada correctamente. <a href="FrontController.php?controller=nota&action=list">Volver al listado</a>
        </div>
        <?php
    elseif ($dataToView["data"]->getEstado() === Util::OPERATION_NOK):
        ?>
        <div class="alert alert-danger">
            Ha ocurrido algún problema y no se ha podido guardar la nota. <a href="FrontController.php?controller=nota&action=list">Volver al listado</a>
        </div>
        <?php
    elseif ($dataToView["data"]->getEstado() === Util::NO_OPERATION):
        ?>
        <form class="form" action="FrontController.php?controller=Nota&action=save" 
              method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div class="form-group">
                <label>Título</label>
                <input class="form-control" type="text" name="title" value="<?php echo $titulo; ?>" required />
            </div>
            <div class="form-group mb-2">
                <label>Contenido</label>
                <textarea class="form-control" style="white-space: pre-wrap;" name="content" required><?php echo $contenido; ?> </textarea>
            </div>
            <div class="form-group mb-2">
                <label>Contenido</label>
                <input type="file" class="form-control" style="white-space: pre-wrap;" name="image" accept="image/png, image/jpg, image/gif">
            </div>
            <input type="submit" value="Guardar" class="btn btn-primary"/>
            <a class="btn btn-outline-danger" href="FrontController.php?controller=Nota&action=list">Cancelar</a>
        </form>

    <?php endif; ?>
</div>