<?php
require_once __DIR__ . '/../core/Database.php';

class Tarea {
    public $id;
    public $materia;
    public $curso;
    public $descripcion;
    public $estado;

    public function __construct($id, $materia, $curso, $descripcion, $estado) {
        $this->id = $id;
        $this->materia = $materia;
        $this->curso = $curso;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

    
    public static function obtenerTareas() {
        $pdo = Database::getInstance()->getConnection();

        $sql = "
            SELECT t.id, m.nombre AS materia, c.nombre AS curso, t.descripcion, t.estado
            FROM tareas t
            JOIN materias m ON t.materia_id = m.id
            JOIN cursos c ON t.curso_id = c.id
            ORDER BY t.id DESC
        ";

        $stmt = $pdo->query($sql);

        $tareas = [];
        while ($row = $stmt->fetch()) {
            $tareas[] = new Tarea(
                $row->id,
                $row->materia,
                $row->curso,
                $row->descripcion,
                $row->estado
            );
        }

        return $tareas;
    }

    
    public static function obtenerTareaPorId($id) {
        $pdo = Database::getInstance()->getConnection();

        $sql = "
            SELECT t.id, m.nombre AS materia, c.nombre AS curso, t.descripcion, t.estado
            FROM tareas t
            JOIN materias m ON t.materia_id = m.id
            JOIN cursos c ON t.curso_id = c.id
            WHERE t.id = ?
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        $row = $stmt->fetch();

        if ($row) {
            return new Tarea(
                $row->id,
                $row->materia,
                $row->curso,
                $row->descripcion,
                $row->estado
            );
        }

        return null;
    }

    
    public static function crear($materia_id, $curso_id, $descripcion, $estado) {
        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO tareas (materia_id, curso_id, descripcion, estado)
            VALUES (?, ?, ?, ?)
        ");

        return $stmt->execute([$materia_id, $curso_id, $descripcion, $estado]);
    }

    
    public static function actualizar($id, $materia_id, $curso_id, $descripcion, $estado) {
        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->prepare("
            UPDATE tareas 
            SET materia_id = ?, curso_id = ?, descripcion = ?, estado = ?
            WHERE id = ?
        ");

        return $stmt->execute([$materia_id, $curso_id, $descripcion, $estado, $id]);
    }
}