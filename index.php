<?php
session_start();

// Controladores
require_once __DIR__ . '/app/controllers/TareaController.php';
require_once __DIR__ . '/app/controllers/AuthController.php';

// Instancias
$tareaController = new TareaController();
$authController = new AuthController();

// Acción
$action = $_GET['action'] ?? '';

switch ($action) {

    // LOGIN
    case 'login':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login();
        } else {
            $authController->mostrarLogin();
        }

        break;

    // LOGOUT
    case 'logout':

        $authController->logout();

        break;

    // REGISTRO
    case 'registro':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->registrar();
        } else {
            $authController->mostrarRegistro();
        }

        break;

    // PERFIL
    case 'perfil':

        $authController->perfil();

        break;

    // PANEL INICIO
    case 'inicio':

        $tareaController->inicio();

        break;

    // TAREAS
    case 'crear_tarea':

        $tareaController->crear();

        break;

    case 'guardar_tarea':

        $tareaController->guardar();

        break;

    case 'ver_tarea':

        $tareaController->ver();

        break;

    case 'editar_tarea':

        $tareaController->editar();

        break;

    case 'actualizar_tarea':

        $tareaController->actualizar();

        break;

    // ENTREGAR
    case 'entregar_tarea':

        $tareaController->entregar();

        break;

    // VER ENTREGAS
    case 'ver_entregas':

        $tareaController->verEntregas();

        break;

    // CALIFICAR
    case 'calificar':

        $tareaController->calificar();

        break;

    // CALIFICACIONES
    case 'calificaciones':

        $tareaController->calificaciones();

        break;

    // BUZÓN
    case 'buzon':

        $tareaController->buzon();

        break;

    // PANEL USUARIOS
    case 'usuarios':

        $authController->usuarios();

        break;

    case 'editar_usuario':
    $authController->editarUsuario();
    break;

case 'actualizar_usuario':
    $authController->actualizarUsuario();
    break;

case 'eliminar_usuario':
    $authController->eliminarUsuario();
    break;

    // DEFAULT
    default:

        $tareaController->index();

        break;
}