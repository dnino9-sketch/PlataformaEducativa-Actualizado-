<?php
require_once __DIR__ . '/../core/Database.php';

class Entrega {

    public static function crear($tarea_id, $usuario_id, $comentario = '', $archivo = null) {

        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO entregas (tarea_id, usuario_id, comentario, archivo, estado)
            VALUES (?, ?, ?, ?, 'Entregado')
        ");

        return $stmt->execute([$tarea_id, $usuario_id, $comentario, $archivo]);
    }
    
    public static function yaEntrego($tarea_id, $usuario_id) {
    $pdo = Database::getInstance()->getConnection();

    $stmt = $pdo->prepare("
        SELECT COUNT(*) FROM entregas 
        WHERE tarea_id = ? AND usuario_id = ?
    ");

    $stmt->execute([$tarea_id, $usuario_id]);

    return $stmt->fetchColumn() > 0;
}
public static function obtenerPorTarea($tarea_id) {
    $pdo = Database::getInstance()->getConnection();

    $sql = "
        SELECT e.id, e.comentario, e.archivo, e.estado, e.fecha_entrega,
               u.nombre AS alumno
        FROM entregas e
        JOIN usuarios u ON e.usuario_id = u.id
        WHERE e.tarea_id = ?
        ORDER BY e.fecha_entrega DESC
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tarea_id]);

    return $stmt->fetchAll();
}
public static function calificar($id, $nota, $comentario) {
    $pdo = Database::getInstance()->getConnection();

    $stmt = $pdo->prepare("
        UPDATE entregas 
        SET nota = ?, retroalimentacion = ?, estado = 'Calificado'
        WHERE id = ?
    ");

    return $stmt->execute([$nota, $comentario, $id]);
}
public static function obtenerEntrega($tarea_id, $usuario_id) {
    $pdo = Database::getInstance()->getConnection();

    $stmt = $pdo->prepare("
        SELECT * FROM entregas 
        WHERE tarea_id = ? AND usuario_id = ?
        LIMIT 1
    ");

    $stmt->execute([$tarea_id, $usuario_id]);

    return $stmt->fetch();
}
}