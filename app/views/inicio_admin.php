<?php

require_once __DIR__ . '/../core/Database.php';

$pdo = Database::getInstance()->getConnection();

/* TOTAL USUARIOS */
$totalUsuarios = $pdo->query("
    SELECT COUNT(*) 
    FROM usuarios
")->fetchColumn();

/* TOTAL TAREAS */
$totalTareas = $pdo->query("
    SELECT COUNT(*) 
    FROM tareas
")->fetchColumn();

/* TOTAL MENSAJES */
$totalMensajes = $pdo->query("
    SELECT COUNT(*) 
    FROM mensajes
")->fetchColumn();

/* TOTAL ENTREGAS */
$totalEntregas = $pdo->query("
    SELECT COUNT(*) 
    FROM entregas
")->fetchColumn();

?>

<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container-fluid">

    <!-- BIENVENIDA -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h2 class="fw-bold mb-2">
                        Bienvenido Administrador 👋
                    </h2>

                    <p class="text-muted mb-0">
                        Gestiona usuarios, tareas y supervisa la plataforma educativa.
                    </p>

                </div>

                <div class="mt-3 mt-md-0">

                    <span class="badge bg-primary fs-6 px-3 py-2">
                        Panel Administrativo
                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- ESTADISTICAS -->
    <div class="row g-4 mb-4">

        <!-- USUARIOS -->
        <div class="col-md-3">

            <div class="card border-0 shadow-sm dashboard-card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Usuarios
                            </small>

                            <h2 class="fw-bold mb-0">
                                <?php echo $totalUsuarios; ?>
                            </h2>

                        </div>

                        <div class="icon-box bg-primary">

                            <i class="bi bi-people-fill"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- TAREAS -->
        <div class="col-md-3">

            <div class="card border-0 shadow-sm dashboard-card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Tareas
                            </small>

                            <h2 class="fw-bold mb-0">
                                <?php echo $totalTareas; ?>
                            </h2>

                        </div>

                        <div class="icon-box bg-success">

                            <i class="bi bi-journal-check"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- MENSAJES -->
        <div class="col-md-3">

            <div class="card border-0 shadow-sm dashboard-card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Mensajes
                            </small>

                            <h2 class="fw-bold mb-0">
                                <?php echo $totalMensajes; ?>
                            </h2>

                        </div>

                        <div class="icon-box bg-warning">

                            <i class="bi bi-envelope-fill"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- ENTREGAS -->
        <div class="col-md-3">

            <div class="card border-0 shadow-sm dashboard-card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Entregas
                            </small>

                            <h2 class="fw-bold mb-0">
                                <?php echo $totalEntregas; ?>
                            </h2>

                        </div>

                        <div class="icon-box bg-danger">

                            <i class="bi bi-upload"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ACCESOS RAPIDOS -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">

                <i class="bi bi-lightning-charge-fill text-warning me-2"></i>
                Accesos Rápidos

            </h4>

            <div class="row g-3">

                <div class="col-md-3">

                    <a href="/PlataformaEducativa/index.php?action=usuarios"
                       class="btn btn-outline-primary w-100 py-3">

                        <i class="bi bi-people-fill d-block fs-3 mb-2"></i>

                        Usuarios

                    </a>

                </div>

                <div class="col-md-3">

                    <a href="/PlataformaEducativa/index.php?action=crear_tarea"
                       class="btn btn-outline-success w-100 py-3">

                        <i class="bi bi-journal-plus d-block fs-3 mb-2"></i>

                        Crear Tarea

                    </a>

                </div>

                <div class="col-md-3">

                    <a href="/PlataformaEducativa/index.php?action=buzon"
                       class="btn btn-outline-warning w-100 py-3">

                        <i class="bi bi-envelope-fill d-block fs-3 mb-2"></i>

                        Buzón

                    </a>

                </div>

                <div class="col-md-3">

                    <a href="/PlataformaEducativa/index.php?action=perfil"
                       class="btn btn-outline-dark w-100 py-3">

                        <i class="bi bi-person-circle d-block fs-3 mb-2"></i>

                        Perfil

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

.dashboard-card {

    transition: 0.3s ease;
}

.dashboard-card:hover {

    transform: translateY(-5px);

    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}

.icon-box {

    width: 75px;

    height: 75px;

    border-radius: 20px;

    display: flex;

    align-items: center;

    justify-content: center;

    color: white;

    font-size: 2rem;
}

</style>

<?php require_once __DIR__ . '/templates/footer.php'; ?>