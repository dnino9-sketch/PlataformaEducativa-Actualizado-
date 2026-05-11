<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-4">

    <h1 class="mb-4">
        Panel Administrador
    </h1>

    <div class="row g-4">

        <!-- GESTIONAR USUARIOS -->
        <div class="col-md-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body text-center">

                    <h4>
                        Usuarios
                    </h4>

                    <p class="text-muted">
                        Crear y administrar alumnos, docentes y padres.
                    </p>

                    <a href="/PlataformaEducativa/index.php?action=usuarios"
                       class="btn btn-primary w-100">
                        Gestionar Usuarios
                    </a>

                </div>

            </div>

        </div>

        <!-- CREAR USUARIO -->
        <div class="col-md-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body text-center">

                    <h4>
                        Crear Usuario
                    </h4>

                    <p class="text-muted">
                        Registrar nuevas cuentas dentro del sistema.
                    </p>

                    <a href="/PlataformaEducativa/index.php?action=registro"
                       class="btn btn-success w-100">
                        Registrar Usuario
                    </a>

                </div>

            </div>

        </div>

        <!-- VER SISTEMA -->
        <div class="col-md-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body text-center">

                    <h4>
                        Plataforma
                    </h4>

                    <p class="text-muted">
                        Ir al sistema principal y gestionar tareas.
                    </p>

                    <a href="/PlataformaEducativa/index.php"
                       class="btn btn-warning w-100">
                        Ver Sistema
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>