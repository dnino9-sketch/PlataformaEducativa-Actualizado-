<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8" />

    <meta name="viewport"
          content="width=device-width, initial-scale=1" />

    <title>
        Plataforma Educativa - <?php echo $pageTitle ?? 'Inicio'; ?>
    </title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
          rel="stylesheet" />

    <!-- Fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Estilos -->
    <link href="/PlataformaEducativa/css/style.css"
          rel="stylesheet" />

    <style>

        body {
            background: #f4f6f9;
            font-family: 'Poppins', sans-serif;
        }

        .navbar-custom {

            background: linear-gradient(90deg, #0d6efd, #0b5ed7);

            padding: 14px 0;

            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .navbar-brand {

            font-size: 1.3rem;

            color: white !important;

            font-weight: 600;
        }

        .navbar-brand img {

            background: white;

            border-radius: 10px;

            padding: 4px;
        }

        .nav-link {

            color: rgba(255,255,255,0.9) !important;

            font-weight: 500;

            transition: 0.3s;
        }

        .nav-link:hover {

            color: white !important;

            transform: translateY(-1px);
        }

        .nav-link.active {

            color: white !important;

            font-weight: 600;
        }

        .dropdown-menu {

            border: none;

            border-radius: 14px;

            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .dropdown-item {

            padding: 10px 15px;

            border-radius: 8px;
        }

        .dropdown-item:hover {

            background: #f4f6f9;
        }

        .main-container {

            margin-top: 30px;
        }

        .card {

            border: none;

            border-radius: 18px;

            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        }

        .table {

            border-radius: 15px;

            overflow: hidden;
        }

        .btn {

            border-radius: 10px;

            font-weight: 500;
        }

    </style>

</head>

<body>

<?php
$usuario = $_SESSION['usuario'] ?? null;
$rol = $usuario['rol'] ?? null;
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center"
           href="/PlataformaEducativa/index.php?action=inicio">

            <img src="/PlataformaEducativa/img/logo.svg"
                 width="42"
                 class="me-2">

            Plataforma Educativa

        </a>

        <!-- BOTON MOVIL -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMain">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse"
             id="navbarMain">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <!-- INICIO -->
                <li class="nav-item">

                    <a class="nav-link <?php echo ($activePage ?? '') === 'inicio' ? 'active' : ''; ?>"
                       href="/PlataformaEducativa/index.php?action=inicio">

                        <i class="bi bi-house-door-fill me-1"></i>
                        Inicio

                    </a>

                </li>

                <!-- TAREAS -->
                <li class="nav-item">

                    <a class="nav-link <?php echo ($activePage ?? '') === 'tareas' ? 'active' : ''; ?>"
                       href="/PlataformaEducativa/index.php">

                        <i class="bi bi-journal-text me-1"></i>
                        Tareas

                    </a>

                </li>

                <!-- CALIFICACIONES -->
                <?php if ($rol === 'alumno' || $rol === 'padre'): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo ($activePage ?? '') === 'calificaciones' ? 'active' : ''; ?>"
                       href="/PlataformaEducativa/index.php?action=calificaciones">

                        <i class="bi bi-bar-chart-fill me-1"></i>
                        Calificaciones

                    </a>

                </li>

                <?php endif; ?>

                <!-- BUZON -->
                <?php if ($usuario): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo ($activePage ?? '') === 'buzon' ? 'active' : ''; ?>"
                       href="/PlataformaEducativa/index.php?action=buzon">

                        <i class="bi bi-envelope-fill me-1"></i>
                        Buzón

                    </a>

                </li>

                <?php endif; ?>

                <!-- ADMIN -->
                <?php if ($rol === 'admin'): ?>

                <li class="nav-item">

                    <a class="nav-link"
                       href="/PlataformaEducativa/index.php?action=usuarios">

                        <i class="bi bi-people-fill me-1"></i>
                        Usuarios

                    </a>

                </li>

                <?php endif; ?>

                <!-- PERFIL -->
                <?php if ($usuario): ?>

                <li class="nav-item dropdown ms-lg-3">

                    <a class="nav-link dropdown-toggle d-flex align-items-center"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown">

                        <i class="bi bi-person-circle fs-5 me-2"></i>

                        <?php echo htmlspecialchars($usuario['nombre']); ?>

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <span class="dropdown-item-text text-muted">

                                Rol:
                                <strong>
                                    <?php echo ucfirst($rol); ?>
                                </strong>

                            </span>

                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>

                            <a class="dropdown-item"
                               href="/PlataformaEducativa/index.php?action=perfil">

                                <i class="bi bi-person me-2"></i>
                                Mi Perfil

                            </a>

                        </li>

                        <li>

                            <a class="dropdown-item text-danger"
                               href="/PlataformaEducativa/index.php?action=logout">

                                <i class="bi bi-box-arrow-right me-2"></i>
                                Cerrar Sesión

                            </a>

                        </li>

                    </ul>

                </li>

                <?php else: ?>

                <li class="nav-item ms-lg-3">

                    <a class="btn btn-light text-primary fw-semibold"
                       href="/PlataformaEducativa/index.php?action=login">

                        Iniciar Sesión

                    </a>

                </li>

                <?php endif; ?>

            </ul>

        </div>

    </div>

</nav>

<!-- CONTENIDO -->
<main class="container main-container">