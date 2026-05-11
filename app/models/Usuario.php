<?php
require_once __DIR__ . '/../core/Database.php';

class Usuario {

    public function __construct(
        $id,
        $nombre,
        $email,
        $password_hash,
        $rol,
        $fecha_creacion
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password_hash = $password_hash;
        $this->rol = $rol;
        $this->fecha_creacion = $fecha_creacion;
    }

    // ===============================
    // REGISTRAR
    // ===============================
    public static function registrar($nombre, $email, $password, $rol = 'alumno') {

        $pdo = Database::getInstance()->getConnection();

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("
            INSERT INTO usuarios (nombre, email, password_hash, rol)
            VALUES (?, ?, ?, ?)
        ");

        return $stmt->execute([
            $nombre,
            $email,
            $hash,
            $rol
        ]);
    }

    // ===============================
    // LOGIN
    // ===============================
    public static function validarUsuario($email, $password) {

        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->prepare("
            SELECT *
            FROM usuarios
            WHERE email = ?
        ");

        $stmt->execute([$email]);

        $row = $stmt->fetch(PDO::FETCH_OBJ);

        if ($row && password_verify($password, $row->password_hash)) {

            return $row;
        }

        return null;
    }

    // ===============================
    // VALIDAR EMAIL
    // ===============================
    public static function emailExiste($email) {

        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->prepare("
            SELECT COUNT(*)
            FROM usuarios
            WHERE email = ?
        ");

        $stmt->execute([$email]);

        return $stmt->fetchColumn() > 0;
    }

    // ===============================
    // OBTENER TODOS
    // ===============================
    public static function obtenerTodos() {

        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->query("
            SELECT *
            FROM usuarios
            ORDER BY id DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // ===============================
// OBTENER POR ID
// ===============================
public static function obtenerPorId($id) {

    $pdo = Database::getInstance()->getConnection();

    $stmt = $pdo->prepare("
        SELECT *
        FROM usuarios
        WHERE id = ?
        LIMIT 1
    ");

    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    // ===============================
// ACTUALIZAR
// ===============================
public static function actualizar($id, $nombre, $email, $rol) {

    $pdo = Database::getInstance()->getConnection();

    // VALIDAR SI EL EMAIL YA EXISTE EN OTRO USUARIO
    $sqlValidar = "
        SELECT id
        FROM usuarios
        WHERE email = ?
        AND id != ?
    ";

    $stmtValidar = $pdo->prepare($sqlValidar);

    $stmtValidar->execute([
        $email,
        $id
    ]);

    if ($stmtValidar->fetch()) {

        return false;
    }

    // ACTUALIZAR
    $sql = "
        UPDATE usuarios
        SET nombre = ?, email = ?, rol = ?
        WHERE id = ?
    ";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        $nombre,
        $email,
        $rol,
        $id
    ]);
}

    // ===============================
    // ELIMINAR
    // ===============================
    public static function eliminar($id) {

        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->prepare("
            DELETE FROM usuarios
            WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }
}