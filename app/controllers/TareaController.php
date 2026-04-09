<?php
require_once __DIR__ . '/../models/Tarea.php';
require_once __DIR__ . '/../helpers/session.php';
require_once __DIR__ . '/../core/Database.php';

class TareaController {
    
    // Mostrar listado de tareas
    public function index() {
        verificarSesionActiva();

        $tareas = Tarea::obtenerTareas();

        $pageTitle = "Mis Tareas";
        $activePage = "tareas";

        require_once __DIR__ . '/../views/tareas.php';
    }

    // Mostrar formulario para crear tarea
    public function crear() {
        verificarSesionActiva();

        $pageTitle = "Crear Nueva Tarea";
        require_once __DIR__ . '/../views/crear_tarea.php';
    }

    // 🔥 GUARDAR TAREA (CORREGIDO)
    public function guardar() {
        verificarSesionActiva();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $materia = $_POST['materia'] ?? '';
            $curso = $_POST['curso'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $estado = $_POST['estado'] ?? 'Pendiente';

            $pdo = Database::getInstance()->getConnection();

            // Obtener ID de materia
            $stmt = $pdo->prepare("SELECT id FROM materias WHERE nombre = ?");
            $stmt->execute([$materia]);
            $materia_id = $stmt->fetchColumn();

            // Obtener ID de curso
            $stmt = $pdo->prepare("SELECT id FROM cursos WHERE nombre = ?");
            $stmt->execute([$curso]);
            $curso_id = $stmt->fetchColumn();

            // Crear tarea
            $resultado = Tarea::crear($materia_id, $curso_id, $descripcion, $estado);

            header("Location: /PlataformaEducativa/");
            exit();
        }
    }

    // Ver detalle de una tarea específica
    public function ver() {
        verificarSesionActiva();

        $id = $_GET['id'] ?? null;

        if ($id === null) {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $tarea = Tarea::obtenerTareaPorId($id);

        if ($tarea === null) {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $pageTitle = "Ver Tarea - " . $tarea->materia;
        require_once __DIR__ . '/../views/ver_tarea.php';
    }

    // Mostrar formulario para editar tarea
    public function editar() {
        verificarSesionActiva();

        $id = $_GET['id'] ?? null;

        if ($id === null) {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $tarea = Tarea::obtenerTareaPorId($id);

        if ($tarea === null) {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $pageTitle = "Editar Tarea";
        require_once __DIR__ . '/../views/editar_tarea.php';
    }

    // 🔥 ACTUALIZAR TAREA (CORREGIDO)
    public function actualizar() {
        verificarSesionActiva();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $materia = $_POST['materia'] ?? '';
            $curso = $_POST['curso'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $estado = $_POST['estado'] ?? 'Pendiente';

            if ($id === null) {
                header("Location: /PlataformaEducativa/");
                exit();
            }

            $pdo = Database::getInstance()->getConnection();

            // Obtener ID de materia
            $stmt = $pdo->prepare("SELECT id FROM materias WHERE nombre = ?");
            $stmt->execute([$materia]);
            $materia_id = $stmt->fetchColumn();

            // Obtener ID de curso
            $stmt = $pdo->prepare("SELECT id FROM cursos WHERE nombre = ?");
            $stmt->execute([$curso]);
            $curso_id = $stmt->fetchColumn();

            // Actualizar tarea
            $resultado = Tarea::actualizar($id, $materia_id, $curso_id, $descripcion, $estado);

            header("Location: /PlataformaEducativa/");
            exit();
        } else {
            header("Location: /PlataformaEducativa/");
            exit();
        }
    }
}