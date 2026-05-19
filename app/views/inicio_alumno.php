<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container-fluid">

    <!-- BIENVENIDA -->
    <div class="card border-0 shadow-sm mb-4 hero-card">

        <div class="card-body p-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <span class="badge bg-primary px-3 py-2 mb-3">

                        Panel del Alumno

                    </span>

                    <h1 class="fw-bold display-6 mb-3">

                        ¡Bienvenido,
                        <?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?>!
                        

                    </h1>

                    <p class="lead text-muted mb-4">

                        Gestiona tus tareas, revisa tus calificaciones y mantente al día con tus actividades académicas.

                    </p>

                    <div class="d-flex flex-wrap gap-3">

                        <a href="/PlataformaEducativa/index.php"
                           class="btn btn-primary btn-lg px-4">

                            <i class="bi bi-journal-check me-2"></i>
                            Ver Mis Tareas

                        </a>

                        <a href="/PlataformaEducativa/index.php?action=calificaciones"
                           class="btn btn-outline-primary btn-lg px-4">

                            <i class="bi bi-bar-chart-fill me-2"></i>
                            Ver Calificaciones

                        </a>

                    </div>

                </div>

                <!-- ICONO -->
                <div class="col-lg-4 text-center d-none d-lg-block">

                    <div class="hero-icon mx-auto">

                        <i class="bi bi-mortarboard-fill"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ESTADISTICAS -->
    <div class="row g-4 mb-4">

        <!-- TAREAS -->
        <div class="col-md-4">

            <div class="card border-0 shadow-sm stats-card stats-primary">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Tareas
                            </small>

                            <h2 class="fw-bold mb-0">
                                —
                            </h2>

                        </div>

                        <div class="stats-icon bg-primary">

                            <i class="bi bi-journal-text"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- CALIFICACIONES -->
        <div class="col-md-4">

            <div class="card border-0 shadow-sm stats-card stats-success">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Promedio
                            </small>

                            <h2 class="fw-bold mb-0">
                                —
                            </h2>

                        </div>

                        <div class="stats-icon bg-success">

                            <i class="bi bi-graph-up-arrow"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- MENSAJES -->
        <div class="col-md-4">

            <div class="card border-0 shadow-sm stats-card stats-warning">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Mensajes
                            </small>

                            <h2 class="fw-bold mb-0">
                                —
                            </h2>

                        </div>

                        <div class="stats-icon bg-warning">

                            <i class="bi bi-envelope-fill"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ACCESOS RAPIDOS -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">

                 Accesos Rápidos

            </h4>

            <div class="row g-4">

                <!-- TAREAS -->
                <div class="col-md-3">

                    <a href="/PlataformaEducativa/index.php"
                       class="quick-card text-decoration-none">

                        <div class="quick-icon bg-primary">

                            <i class="bi bi-journal-check"></i>

                        </div>

                        <h5 class="fw-bold mt-3">

                            Tareas

                        </h5>

                    </a>

                </div>

                <!-- CALIFICACIONES -->
                <div class="col-md-3">

                    <a href="/PlataformaEducativa/index.php?action=calificaciones"
                       class="quick-card text-decoration-none">

                        <div class="quick-icon bg-success">

                            <i class="bi bi-bar-chart-fill"></i>

                        </div>

                        <h5 class="fw-bold mt-3">

                            Notas

                        </h5>

                    </a>

                </div>

                <!-- BUZON -->
                <div class="col-md-3">

                    <a href="/PlataformaEducativa/index.php?action=buzon"
                       class="quick-card text-decoration-none">

                        <div class="quick-icon bg-warning">

                            <i class="bi bi-envelope-fill"></i>

                        </div>

                        <h5 class="fw-bold mt-3">

                            Buzón

                        </h5>

                    </a>

                </div>

                <!-- PERFIL -->
                <div class="col-md-3">

                    <a href="/PlataformaEducativa/index.php?action=perfil"
                       class="quick-card text-decoration-none">

                        <div class="quick-icon bg-dark">

                            <i class="bi bi-person-circle"></i>

                        </div>

                        <h5 class="fw-bold mt-3">

                            Perfil

                        </h5>

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- INFORMACION -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <h4 class="fw-bold mb-3">

                        Plataforma Educativa

                    </h4>

                    <p class="text-muted mb-0">

                        Sistema moderno para la gestión académica, entrega de tareas,
                        comunicación escolar y seguimiento de calificaciones.

                    </p>

                </div>

                <div class="col-lg-4 text-end d-none d-lg-block">

                    <i class="bi bi-mortarboard-fill info-big-icon"></i>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

.hero-card {

    background:
        linear-gradient(
            135deg,
            rgba(13,110,253,0.08),
            rgba(13,110,253,0.02)
        );
}

.hero-icon {

    width: 180px;

    height: 180px;

    border-radius: 50%;

    background: linear-gradient(135deg, #0d6efd, #0b5ed7);

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 5rem;

    box-shadow: 0 15px 40px rgba(13,110,253,0.25);
}

.stats-card {

    border-radius: 22px;

    transition: 0.3s ease;
}

.stats-card:hover {

    transform: translateY(-4px);
}

.stats-icon {

    width: 65px;

    height: 65px;

    border-radius: 18px;

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 1.6rem;
}

.quick-card {

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: center;

    background: #f8f9fa;

    border-radius: 20px;

    padding: 30px 20px;

    transition: 0.3s ease;

    color: #212529;

    height: 100%;
}

.quick-card:hover {

    transform: translateY(-4px);

    background: white;

    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

.quick-icon {

    width: 75px;

    height: 75px;

    border-radius: 22px;

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 2rem;
}

.info-big-icon {

    font-size: 5rem;

    color: rgba(13,110,253,0.15);
}

.card {

    border-radius: 24px;
}

.btn {

    border-radius: 14px;

    font-weight: 600;
}

</style>

<?php require_once __DIR__ . '/templates/footer.php'; ?>