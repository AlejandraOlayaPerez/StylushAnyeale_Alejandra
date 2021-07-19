<?php
require_once 'headGerente.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil</title>
</head>

<body>
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Perfiles disponibles</h3>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>Perfil Empleado</th>
                            <th>Cargo</th>
                            <th>¿Esta habilitado?</th>
                            <th><a class="btn btn-info" href=""><i class="fas fa-user-plus"></i> Nuevo Perfil</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a>...</a><br /><small>Created 01.01.2019</small></td>
                            <td>...</td>
                            <td>...</td>
                            <td>
                                <a href="" class="btn btn-success"><i class="fas fa-eye"></i> Ver perfil</a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick=""><i class="fas fa-trash-alt"></i> Eliminar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</body>

</html>