<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container-fluid">

    <!-- ENCABEZADO -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h2 class="fw-bold mb-2">

                        <i class="bi bi-people-fill text-primary me-2"></i>
                        Gestión de Usuarios

                    </h2>

                    <p class="text-muted mb-0">

                        Administra alumnos, docentes, padres y administradores.

                    </p>

                </div>

                <!-- BOTON -->
                <div class="mt-3 mt-md-0">

                    <a href="/PlataformaEducativa/index.php?action=registro"
                       class="btn btn-success px-4 py-2">

                        <i class="bi bi-person-plus-fill me-2"></i>
                        Nuevo Usuario

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- TABLA -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Usuario
                            </th>

                            <th>
                                Correo
                            </th>

                            <th>
                                Rol
                            </th>

                            <th>
                                Fecha
                            </th>

                            <th class="text-center">
                                Acciones
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php if (!empty($usuarios)): ?>

                        <?php foreach ($usuarios as $usuario): ?>

                            <tr>

                                <!-- ID -->
                                <td>

                                    <span class="fw-semibold text-muted">

                                        #<?php echo $usuario->id; ?>

                                    </span>

                                </td>

                                <!-- USUARIO -->
                                <td>

                                    <div class="d-flex align-items-center gap-3">

                                        <div class="avatar-circle">

                                            <i class="bi bi-person-fill"></i>

                                        </div>

                                        <div>

                                            <span class="fw-semibold d-block">

                                                <?php echo htmlspecialchars($usuario->nombre); ?>

                                            </span>

                                        </div>

                                    </div>

                                </td>

                                <!-- EMAIL -->
                                <td>

                                    <span class="text-muted">

                                        <?php echo htmlspecialchars($usuario->email); ?>

                                    </span>

                                </td>

                                <!-- ROL -->
                                <td>

                                    <?php
                                    switch ($usuario->rol) {

                                        case 'admin':
                                            echo '
                                            <span class="badge bg-danger px-3 py-2">
                                                <i class="bi bi-shield-fill me-1"></i>
                                                Administrador
                                            </span>';
                                            break;

                                        case 'docente':
                                            echo '
                                            <span class="badge bg-primary px-3 py-2">
                                                <i class="bi bi-mortarboard-fill me-1"></i>
                                                Docente
                                            </span>';
                                            break;

                                        case 'alumno':
                                            echo '
                                            <span class="badge bg-success px-3 py-2">
                                                <i class="bi bi-person-workspace me-1"></i>
                                                Alumno
                                            </span>';
                                            break;

                                        case 'padre':
                                            echo '
                                            <span class="badge bg-warning text-dark px-3 py-2">
                                                <i class="bi bi-people-fill me-1"></i>
                                                Padre
                                            </span>';
                                            break;

                                        default:
                                            echo '
                                            <span class="badge bg-secondary px-3 py-2">
                                                Sin rol
                                            </span>';
                                    }
                                    ?>

                                </td>

                                <!-- FECHA -->
                                <td>

                                    <span class="text-muted small">

                                        <?php echo $usuario->fecha_creacion; ?>

                                    </span>

                                </td>

                                <!-- ACCIONES -->
                                <td>

                                    <div class="d-flex justify-content-center gap-2 flex-wrap">

                                        <!-- EDITAR -->
                                        <a href="/PlataformaEducativa/index.php?action=editar_usuario&id=<?php echo $usuario->id; ?>"
                                           class="btn btn-warning btn-sm text-dark">

                                            <i class="bi bi-pencil-square me-1"></i>
                                            Editar

                                        </a>

                                        <!-- ELIMINAR -->
                                        <a href="/PlataformaEducativa/index.php?action=eliminar_usuario&id=<?php echo $usuario->id; ?>"
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">

                                            <i class="bi bi-trash-fill me-1"></i>
                                            Eliminar

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="6"
                                class="text-center py-5">

                                <i class="bi bi-inbox fs-1 text-muted"></i>

                                <h5 class="mt-3 text-muted">

                                    No hay usuarios registrados

                                </h5>

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<style>

.avatar-circle {

    width: 50px;

    height: 50px;

    border-radius: 50%;

    background: linear-gradient(135deg, #0d6efd, #0b5ed7);

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 1.2rem;
}

.card {

    border-radius: 20px;
}

.table tbody tr {

    transition: 0.2s ease;
}

.table tbody tr:hover {

    transform: scale(1.003);

    background-color: rgba(13,110,253,0.03);
}

.badge {

    border-radius: 10px;

    font-weight: 500;
}

.btn {

    border-radius: 10px;
}

</style>

<?php require_once __DIR__ . '/templates/footer.php'; ?>