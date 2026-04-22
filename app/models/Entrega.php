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
}