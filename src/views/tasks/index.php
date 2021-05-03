<?php
include_once 'views/includes/header.php';
?>

<div class="container p-4">
    <div id="editTaskModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar tarea</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php constant('URL') ?>tasks/editTask" method="POST">
                    <div class="modal-body">

                        <div class="d-none">
                            <input id="modal_id_input" type="text" name="id" class="hidden">
                        </div>

                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input id="modal_title_input" type="text" name="title" class="form-control"
                                placeholder="Type here">
                        </div>

                        <div class="form-group ">
                            <label for="description">Descripcion</label>
                            <textarea id="modal_description_input" name="description" class="form-control" rows="2"
                                placeholder="Escriba aqui"></textarea>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary w-10" type="submit" name="edit_task" value="Guardar">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="alert-fixed">
        <?php $this->showMessages(); ?>
    </div><!-- Para borrar todos los datos de la sesion-->
    <div class="row">

        <div class="col-md-4">

            <div class="card card-body">
                <form action="<?php constant('URL'); ?>/tasks/saveTask" method="POST">

                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" name="title" class="form-control" placeholder="Escriba aqui" autofocus>
                    </div>

                    <div class="form-group ">
                        <label for="description">Descripcion</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Escriba aqui"></textarea>
                    </div>
                    <input class="btn btn-success btn-block" type="submit" name="save_task" value="Crear tarea">

                </form>
            </div>

        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha de creacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION['tasks'] as $task){ ?>
                    <tr>
                        <td><?= $task->getTitle(); ?></td>
                        <td><?= $task->getDescription(); ?></td>
                        <td><?= $task->getCreatedAt(); ?></td>

                        <!-- Pasando por parametro los datos de la tarea para poder mostrarlos al editarla -->
                        <td class="">
                            <div class="buttons">
                                
                                <a onclick="showModal(<?php echo $task->getId();?>, '<?= $task->getTitle();?>', '<?= $task->getDescription();?>')"
                                    class="btn btn-info" aria-label="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn btn-danger" href="<?php constant('URL') ?>tasks/deleteTask?id=<?php echo $task->getId();?>"
                                    aria-label="Eliminar">
                                    <i class="fas fa-backspace"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php
include_once 'views/includes/footer.php';
?>