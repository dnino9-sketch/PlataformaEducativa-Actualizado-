<?php
require_once __DIR__ . '/../models/Tarea.php';
require_once __DIR__ . '/../helpers/session.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/Entrega.php';

class TareaController {
    
    // ===============================
    // LISTAR TAREAS
    // ===============================
    public function index() {
        verificarSesionActiva();

        $tareas = Tarea::obtenerTareas();

        $pageTitle = "Mis Tareas";
        $activePage = "tareas";

        require_once __DIR__ . '/../views/tareas.php';
    }

    // ===============================
    // CREAR TAREA
    // ===============================
    public function crear() {
        verificarSesionActiva();

        $pageTitle = "Crear Nueva Tarea";
        require_once __DIR__ . '/../views/crear_tarea.php';
    }

    // ===============================
    // GUARDAR TAREA
    // ===============================
    public function guardar() {
        verificarSesionActiva();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $materia = $_POST['materia'] ?? '';
            $curso = $_POST['curso'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $estado = $_POST['estado'] ?? 'Pendiente';

            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT id FROM materias WHERE nombre = ?");
            $stmt->execute([$materia]);
            $materia_id = $stmt->fetchColumn();

            $stmt = $pdo->prepare("SELECT id FROM cursos WHERE nombre = ?");
            $stmt->execute([$curso]);
            $curso_id = $stmt->fetchColumn();

            Tarea::crear($materia_id, $curso_id, $descripcion, $estado);

            header("Location: /PlataformaEducativa/");
            exit();
        }
    }

    // ===============================
    // ENTREGAR TAREA
    // ===============================
    public function entregar() {
        verificarSesionActiva();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $tarea_id = $_POST['tarea_id'] ?? null;
            $usuario_id = $_SESSION['usuario']['id'];

            if (!$tarea_id) {
                die("Error: tarea_id vacío");
            }

            $archivoNombre = null;

            if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === 0) {

                $carpeta = __DIR__ . '/../../uploads/';

                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }

                $archivoNombre = time() . "_" . $_FILES['archivo']['name'];
                $ruta = $carpeta . $archivoNombre;

                move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
            }

            $comentario = $_POST['comentario'] ?? '';

            Entrega::crear($tarea_id, $usuario_id, $comentario, $archivoNombre);

            header("Location: index.php");
            exit();
        }
    }

    // ===============================
    // VER TAREA
    // ===============================
    public function ver() {
        verificarSesionActiva();

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $tarea = Tarea::obtenerTareaPorId($id);

        if (!$tarea) {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $pageTitle = "Ver Tarea";
        require_once __DIR__ . '/../views/ver_tarea.php';
    }

    // ===============================
    // EDITAR TAREA
    // ===============================
    public function editar() {
        verificarSesionActiva();

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $tarea = Tarea::obtenerTareaPorId($id);

        if (!$tarea) {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $pageTitle = "Editar Tarea";
        require_once __DIR__ . '/../views/editar_tarea.php';
    }

    // ===============================
    // ACTUALIZAR TAREA
    // ===============================
    public function actualizar() {
        verificarSesionActiva();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? null;
            $materia = $_POST['materia'] ?? '';
            $curso = $_POST['curso'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $estado = $_POST['estado'] ?? 'Pendiente';

            if (!$id) {
                header("Location: /PlataformaEducativa/");
                exit();
            }

            $pdo = Database::getInstance()->getConnection();

            $stmt = $pdo->prepare("SELECT id FROM materias WHERE nombre = ?");
            $stmt->execute([$materia]);
            $materia_id = $stmt->fetchColumn();

            $stmt = $pdo->prepare("SELECT id FROM cursos WHERE nombre = ?");
            $stmt->execute([$curso]);
            $curso_id = $stmt->fetchColumn();

            Tarea::actualizar($id, $materia_id, $curso_id, $descripcion, $estado);

            header("Location: /PlataformaEducativa/");
            exit();
        }
    }

    // ===============================
    // VER ENTREGAS
    // ===============================
    public function verEntregas() {
        verificarSesionActiva();

        if ($_SESSION['usuario']['rol'] === 'alumno') {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $tarea = Tarea::obtenerTareaPorId($id);
        $entregas = Entrega::obtenerPorTarea($id);

        $pageTitle = "Entregas";
        require_once __DIR__ . '/../views/ver_entregas.php';
    }

    // ===============================
    // CALIFICAR
    // ===============================
    public function calificar() {
        verificarSesionActiva();

        if ($_SESSION['usuario']['rol'] !== 'docente' && $_SESSION['usuario']['rol'] !== 'admin') {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        Entrega::calificar(
            $_POST['entrega_id'],
            $_POST['nota'],
            $_POST['comentario']
        );

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // ===============================
    // CALIFICACIONES
    // ===============================
    public function calificaciones() {
        verificarSesionActiva();

        $usuario_id = $_SESSION['usuario']['id'];
        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->prepare("
            SELECT t.descripcion, m.nombre AS materia, c.nombre AS curso, e.nota
            FROM entregas e
            JOIN tareas t ON e.tarea_id = t.id
            JOIN materias m ON t.materia_id = m.id
            JOIN cursos c ON t.curso_id = c.id
            WHERE e.usuario_id = ?
        ");

        $stmt->execute([$usuario_id]);
        $calificaciones = $stmt->fetchAll();

        $pageTitle = "Calificaciones";
        $activePage = "calificaciones";

        require_once __DIR__ . '/../views/calificaciones.php';
    }

    // ===============================
    // INICIO (PANEL POR ROL)
    // ===============================
    public function inicio() {
        verificarSesionActiva();

        $rol = $_SESSION['usuario']['rol'];

        switch ($rol) {

            case 'docente':
                $pageTitle = "Panel Docente";
                $activePage = "inicio";
                require_once __DIR__ . '/../views/inicio_docente.php';
                break;

            case 'alumno':
                $pageTitle = "Panel Alumno";
                $activePage = "inicio";
                require_once __DIR__ . '/../views/inicio_alumno.php';
                break;

            case 'padre':
                $pageTitle = "Panel Padre";
                $activePage = "inicio";
                require_once __DIR__ . '/../views/inicio_padre.php';
                break;

            case 'admin':
                $pageTitle = "Panel Admin";
                $activePage = "inicio";
                require_once __DIR__ . '/../views/inicio_admin.php';
                break;

            default:
                header("Location: /PlataformaEducativa/");
                exit();
        }
    }

    // ===============================
    // BUZÓN
    // ===============================
    public function buzon() {
        verificarSesionActiva();

        $pageTitle = "Buzón";
        $activePage = "buzon";

        require_once __DIR__ . '/../views/buzon.php';
    }
}