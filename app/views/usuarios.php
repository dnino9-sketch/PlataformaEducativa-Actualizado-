<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Gestión de Usuarios</h2>

        <a href="/PlataformaEducativa/index.php?action=registro"
           class="btn btn-success">
            Nuevo Usuario
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    <?php if (!empty($usuarios)): ?>

                        <?php foreach ($usuarios as $usuario): ?>

                            <tr>

                                <td>
                                    <?php echo $usuario->id; ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($usuario->nombre); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($usuario->email); ?>
                                </td>

                                <td>

                                    <?php
                                    switch ($usuario->rol) {

                                        case 'admin':
                                            echo '<span class="badge bg-danger">Administrador</span>';
                                            break;

                                        case 'docente':
                                            echo '<span class="badge bg-primary">Docente</span>';
                                            break;

                                        case 'alumno':
                                            echo '<span class="badge bg-success">Alumno</span>';
                                            break;

                                        case 'padre':
                                            echo '<span class="badge bg-warning text-dark">Padre</span>';
                                            break;

                                        default:
                                            echo '<span class="badge bg-secondary">Sin rol</span>';
                                    }
                                    ?>

                                </td>

                                <td>
                                    <?php echo $usuario->fecha_creacion; ?>
                                </td>

                                <td>

                                    <a href="/PlataformaEducativa/index.php?action=editar_usuario&id=<?php echo $usuario->id; ?>"
                                       class="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <a href="/PlataformaEducativa/index.php?action=eliminar_usuario&id=<?php echo $usuario->id; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                        Eliminar
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>