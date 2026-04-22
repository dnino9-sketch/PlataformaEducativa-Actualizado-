<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Plataforma Educativa - <?php echo $pageTitle ?? 'Inicio'; ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Estilos -->
    <link href="/PlataformaEducativa/css/style.css" rel="stylesheet" />
</head>
<body>

<?php 
$usuario = $_SESSION['usuario'] ?? null;
$rol = $usuario['rol'] ?? null;
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">

    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="/PlataformaEducativa/index.php?action=inicio">
      <img src="/PlataformaEducativa/img/logo.svg" width="40" class="me-2">
      <span><strong>Plataforma</strong> <span class="text-primary">Educativa</span></span>
    </a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarMain">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav ms-auto">

        <!-- INICIO -->
        <li class="nav-item">
          <a class="nav-link<?php echo ($activePage ?? '') === 'inicio' ? ' active' : ''; ?>"
             href="/PlataformaEducativa/index.php?action=inicio">
             Inicio
          </a>
        </li>

        <!-- TAREAS (todos pueden ver) -->
        <li class="nav-item">
          <a class="nav-link<?php echo ($activePage ?? '') === 'tareas' ? ' active' : ''; ?>"
             href="/PlataformaEducativa/index.php">
              Tareas
          </a>
        </li>

        <!-- CALIFICACIONES (alumno y padre) -->
        <?php if ($rol === 'alumno' || $rol === 'padre'): ?>
        <li class="nav-item">
          <a class="nav-link<?php echo ($activePage ?? '') === 'calificaciones' ? ' active' : ''; ?>"
             href="/PlataformaEducativa/index.php?action=calificaciones">
              Calificaciones
          </a>
        </li>
        <?php endif; ?>

        <!-- BUZÓN (todos logueados) -->
        <?php if ($usuario): ?>
        <li class="nav-item">
          <a class="nav-link<?php echo ($activePage ?? '') === 'buzon' ? ' active' : ''; ?>"
             href="/PlataformaEducativa/index.php?action=buzon">
              Buzón
          </a>
        </li>
        <?php endif; ?>

        <!-- ADMIN (solo admin) -->
        <?php if ($rol === 'admin'): ?>
        <li class="nav-item">
          <a class="nav-link"
             href="/PlataformaEducativa/index.php?action=admin">
              Administración
          </a>
        </li>
        <?php endif; ?>

        <!-- USUARIO -->
        <?php if ($usuario): ?>
        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle"></i>
            <?php echo htmlspecialchars($usuario['nombre']); ?>
          </a>

          <ul class="dropdown-menu dropdown-menu-end">

            <li>
              <span class="dropdown-item-text text-muted">
                Rol: <?php echo $rol; ?>
              </span>
            </li>

            <li><hr class="dropdown-divider"></li>

            <li>
              <a class="dropdown-item" href="/PlataformaEducativa/index.php?action=perfil">
                  Mi Perfil
              </a>
            </li>

            <li>
              <a class="dropdown-item text-danger" 
                 href="/PlataformaEducativa/index.php?action=logout">
                  Cerrar Sesión
              </a>
            </li>

          </ul>
        </li>

        <?php else: ?>

        <li class="nav-item">
          <a class="btn btn-outline-primary ms-2"
             href="/PlataformaEducativa/index.php?action=login">
             Iniciar Sesión
          </a>
        </li>

        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>

<main class="container my-4">