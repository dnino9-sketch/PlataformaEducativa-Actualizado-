<?php
require_once __DIR__ . '/../core/Database.php';

class Usuario {

    public function __construct($id, $nombre, $email, $password_hash, $rol, $fecha_creacion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password_hash = $password_hash;
        $this->rol = $rol;
        $this->fecha_creacion = $fecha_creacion;
    }

    // ✅ REGISTRAR (CORREGIDO)
    public static function registrar($nombre, $email, $password, $rol = 'alumno') {
        $pdo = Database::getInstance()->getConnection();
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("
            INSERT INTO usuarios (nombre, email, password_hash, rol) 
            VALUES (?, ?, ?, ?)
        ");

        return $stmt->execute([$nombre, $email, $hash, $rol]);
    }

    // ✅ LOGIN (CORREGIDO)
    public static function validarUsuario($email, $password) {
        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);

        $row = $stmt->fetch();

        if ($row && password_verify($password, $row->password_hash)) {
            return new Usuario(
                $row->id,
                $row->nombre,
                $row->email,
                $row->password_hash,
                $row->rol,
                $row->fecha_creacion
            );
        }

        return null;
    }

    // ✅ EMAIL EXISTE
    public static function emailExiste($email) {
        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);

        return $stmt->fetchColumn() > 0;
    }
}