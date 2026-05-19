<?php

require_once __DIR__ . '/../core/Database.php';

class Mensaje {

    // ===============================
    // ENVIAR MENSAJE
    // ===============================
    public static function enviar($remitente_id, $destinatario_id, $asunto, $mensaje) {

        $pdo = Database::getInstance()->getConnection();

        $sql = "
            INSERT INTO mensajes
            (remitente_id, destinatario_id, asunto, mensaje)
            VALUES (?, ?, ?, ?)
        ";

        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            $remitente_id,
            $destinatario_id,
            $asunto,
            $mensaje
        ]);
    }

    // ===============================
    // RECIBIDOS
    // ===============================
    public static function recibidos($usuario_id) {

        $pdo = Database::getInstance()->getConnection();

        $sql = "
            SELECT 
                m.*,
                u.nombre AS remitente
            FROM mensajes m
            JOIN usuarios u 
                ON m.remitente_id = u.id
            WHERE destinatario_id = ?
            ORDER BY fecha DESC
        ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$usuario_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ===============================
    // ENVIADOS
    // ===============================
    public static function enviados($usuario_id) {

        $pdo = Database::getInstance()->getConnection();

        $sql = "
            SELECT 
                m.*,
                u.nombre AS destinatario
            FROM mensajes m
            JOIN usuarios u 
                ON m.destinatario_id = u.id
            WHERE remitente_id = ?
            ORDER BY fecha DESC
        ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$usuario_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}