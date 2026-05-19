<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container-fluid">

    <!-- ENCABEZADO -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h2 class="fw-bold mb-2">

                        <i class="bi bi-person-circle text-primary me-2"></i>
                        Mi Perfil

                    </h2>

                    <p class="text-muted mb-0">

                        Consulta la información de tu cuenta dentro de la plataforma.

                    </p>

                </div>

                <div class="mt-3 mt-md-0">

                    <?php
                    $rol = $_SESSION['usuario']['rol'];

                    switch ($rol) {

                        case 'admin':
                            $badge = 'bg-danger';
                            $icon = 'bi-shield-fill';
                            $texto = 'Administrador';
                            break;

                        case 'docente':
                            $badge = 'bg-primary';
                            $icon = 'bi-mortarboard-fill';
                            $texto = 'Docente';
                            break;

                        case 'alumno':
                            $badge = 'bg-success';
                            $icon = 'bi-person-workspace';
                            $texto = 'Alumno';
                            break;

                        case 'padre':
                            $badge = 'bg-warning text-dark';
                            $icon = 'bi-people-fill';
                            $texto = 'Padre';
                            break;

                        default:
                            $badge = 'bg-secondary';
                            $icon = 'bi-person';
                            $texto = 'Usuario';
                    }
                    ?>

                    <span class="badge <?php echo $badge; ?> fs-6 px-4 py-3">

                        <i class="bi <?php echo $icon; ?> me-2"></i>

                        <?php echo $texto; ?>

                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- PERFIL -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-5">

            <div class="row align-items-center">

                <!-- AVATAR -->
                <div class="col-md-4 text-center mb-4 mb-md-0">

                    <div class="profile-avatar mx-auto">

                        <i class="bi bi-person-fill"></i>

                    </div>

                    <h4 class="fw-bold mt-4">

                        <?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?>

                    </h4>

                    <p class="text-muted">

                        Usuario activo en la plataforma

                    </p>

                </div>

                <!-- INFORMACION -->
                <div class="col-md-8">

                    <div class="row g-4">

                        <!-- NOMBRE -->
                        <div class="col-md-6">

                            <div class="info-card">

                                <div class="info-icon bg-primary">

                                    <i class="bi bi-person-fill"></i>

                                </div>

                                <div>

                                    <small class="text-muted d-block">
                                        Nombre
                                    </small>

                                    <h5 class="fw-bold mb-0">

                                        <?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?>

                                    </h5>

                                </div>

                            </div>

                        </div>

                        <!-- EMAIL -->
                        <div class="col-md-6">

                            <div class="info-card">

                                <div class="info-icon bg-success">

                                    <i class="bi bi-envelope-fill"></i>

                                </div>

                                <div>

                                    <small class="text-muted d-block">
                                        Correo
                                    </small>

                                    <h5 class="fw-bold mb-0">

                                        <?php echo htmlspecialchars($_SESSION['usuario']['email']); ?>

                                    </h5>

                                </div>

                            </div>

                        </div>

                        <!-- ROL -->
                        <div class="col-md-6">

                            <div class="info-card">

                                <div class="info-icon bg-warning">

                                    <i class="bi bi-shield-fill"></i>

                                </div>

                                <div>

                                    <small class="text-muted d-block">
                                        Rol
                                    </small>

                                    <h5 class="fw-bold mb-0">

                                        <?php echo ucfirst($_SESSION['usuario']['rol']); ?>

                                    </h5>

                                </div>

                            </div>

                        </div>

                        <!-- ESTADO -->
                        <div class="col-md-6">

                            <div class="info-card">

                                <div class="info-icon bg-danger">

                                    <i class="bi bi-check-circle-fill"></i>

                                </div>

                                <div>

                                    <small class="text-muted d-block">
                                        Estado
                                    </small>

                                    <h5 class="fw-bold mb-0 text-success">

                                        Activo

                                    </h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- BOTONES -->
                    <div class="d-flex flex-wrap gap-3 mt-5">

                        <a href="/PlataformaEducativa/index.php?action=inicio"
                           class="btn btn-primary px-4 py-2">

                            <i class="bi bi-house-door-fill me-2"></i>
                            Ir al Inicio

                        </a>

                        <a href="/PlataformaEducativa/index.php?action=logout"
                           class="btn btn-outline-danger px-4 py-2">

                            <i class="bi bi-box-arrow-right me-2"></i>
                            Cerrar Sesión

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

.profile-avatar {

    width: 150px;

    height: 150px;

    border-radius: 50%;

    background: linear-gradient(135deg, #0d6efd, #0b5ed7);

    display: flex;

    align-items: center;

    justify-content: center;

    color: white;

    font-size: 4rem;

    box-shadow: 0 10px 25px rgba(13,110,253,0.3);
}

.info-card {

    display: flex;

    align-items: center;

    gap: 18px;

    background: #f8f9fa;

    padding: 20px;

    border-radius: 18px;

    height: 100%;
}

.info-icon {

    width: 60px;

    height: 60px;

    border-radius: 16px;

    display: flex;

    align-items: center;

    justify-content: center;

    color: white;

    font-size: 1.5rem;
}

.card {

    border-radius: 22px;
}

.btn {

    border-radius: 12px;

    font-weight: 600;
}

</style>

<?php require_once __DIR__ . '/templates/footer.php'; ?>