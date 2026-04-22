<?php
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../helpers/session.php';

class AuthController {

    // ===============================
    // MOSTRAR LOGIN
    // ===============================
    public function mostrarLogin($error = null) {
        $pageTitle = "Iniciar Sesión";
        require_once __DIR__ . '/../views/login.php';
    }

    // ===============================
    // LOGIN (CORREGIDO)
    // ===============================
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $usuario = Usuario::validarUsuario($email, $password);

            if ($usuario) {
                $_SESSION['usuario'] = [
                    'id' => $usuario->id, 
                    'nombre' => $usuario->nombre,
                    'email' => $usuario->email,
                    'rol' => $usuario->rol
                ];

                
                header("Location: /PlataformaEducativa/index.php?action=inicio");
                exit();

            } else {
                $error = "Correo o contraseña incorrectos.";
                $this->mostrarLogin($error);
            }

        } else {
            $this->mostrarLogin();
        }
    }

    // ===============================
    // LOGOUT
    // ===============================
    public function logout() {
        session_destroy();
        header("Location: /PlataformaEducativa/index.php?action=login");
        exit();
    }

    // ===============================
    // MOSTRAR REGISTRO
    // ===============================
    public function mostrarRegistro($error = null) {
        $pageTitle = "Registro de Usuario";
        require_once __DIR__ . '/../views/registro.php';
    }

    // ===============================
    // REGISTRAR USUARIO
    // ===============================
    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $rol = $_POST['rol'] ?? 'alumno';

            if (empty($nombre) || empty($email) || empty($password)) {
                $error = "Todos los campos son obligatorios.";
                $this->mostrarRegistro($error);
                return;
            }

            if (Usuario::emailExiste($email)) {
                $error = "El correo ya está registrado.";
                $this->mostrarRegistro($error);
                return;
            }

            $resultado = Usuario::registrar($nombre, $email, $password, $rol);

            if ($resultado) {
                // Puedes mandar directo al login (correcto)
                header("Location: /PlataformaEducativa/index.php?action=login");
                exit();
            } else {
                $error = "Error al registrar usuario.";
                $this->mostrarRegistro($error);
            }

        } else {
            $this->mostrarRegistro();
        }
    }

    // ===============================
    // PERFIL
    // ===============================
    public function perfil() {
        verificarSesionActiva();

        $pageTitle = "Mi Perfil";
        $activePage = "perfil";

        require_once __DIR__ . '/../views/perfil.php';
    }
}