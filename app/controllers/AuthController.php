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
    // LOGIN
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

        verificarSesionActiva();

        if ($_SESSION['usuario']['rol'] !== 'admin') {

            header("Location: /PlataformaEducativa/index.php?action=inicio");
            exit();
        }

        $pageTitle = "Registrar Usuario";

        require_once __DIR__ . '/../views/registro.php';
    }

    // ===============================
    // REGISTRAR
    // ===============================
    public function registrar() {

        verificarSesionActiva();

        if ($_SESSION['usuario']['rol'] !== 'admin') {

            header("Location: /PlataformaEducativa/index.php?action=inicio");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $rol = $_POST['rol'] ?? 'alumno';

            if (
                empty($nombre) ||
                empty($email) ||
                empty($password)
            ) {

                $error = "Todos los campos son obligatorios.";
                $this->mostrarRegistro($error);
                return;
            }

            if (Usuario::emailExiste($email)) {

                $error = "El correo ya está registrado.";
                $this->mostrarRegistro($error);
                return;
            }

            $resultado = Usuario::registrar(
                $nombre,
                $email,
                $password,
                $rol
            );

            if ($resultado) {

                header("Location: /PlataformaEducativa/index.php?action=usuarios");
                exit();

            } else {

                $error = "Error al registrar usuario.";
                $this->mostrarRegistro($error);
            }
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

    // ===============================
    // LISTA USUARIOS
    // ===============================
    public function usuarios() {

        verificarSesionActiva();

        if ($_SESSION['usuario']['rol'] !== 'admin') {

            header("Location: /PlataformaEducativa/index.php?action=inicio");
            exit();
        }

        $usuarios = Usuario::obtenerTodos();

        $pageTitle = "Gestión de Usuarios";
        $activePage = "usuarios";

        require_once __DIR__ . '/../views/usuarios.php';
    }

    // ===============================
// EDITAR USUARIO
// ===============================
public function editarUsuario() {

    verificarSesionActiva();

    if ($_SESSION['usuario']['rol'] !== 'admin') {

        header("Location: /PlataformaEducativa/index.php?action=inicio");
        exit();
    }

    $id = $_GET['id'] ?? 0;

    if (!$id) {

        header("Location: /PlataformaEducativa/index.php?action=usuarios");
        exit();
    }

    $usuarioEditar = Usuario::obtenerPorId($id);

    if (!$usuarioEditar) {

        die("Usuario no encontrado");
    }

    $pageTitle = "Editar Usuario";

    require_once __DIR__ . '/../views/editar_usuario.php';
}

    // ===============================
    // ACTUALIZAR USUARIO
    // ===============================
    public function actualizarUsuario() {

        verificarSesionActiva();

        if ($_SESSION['usuario']['rol'] !== 'admin') {

            header("Location: /PlataformaEducativa/index.php?action=inicio");
            exit();
        }

        $id = $_POST['id'] ?? null;
        $nombre = $_POST['nombre'] ?? '';
        $email = $_POST['email'] ?? '';
        $rol = $_POST['rol'] ?? 'alumno';

        if (!$id) {

            header("Location: /PlataformaEducativa/index.php?action=usuarios");
            exit();
        }

        $resultado = Usuario::actualizar(
            $id,
            $nombre,
            $email,
            $rol
        );

        if (!$resultado) {

            echo "El correo ya está registrado en otro usuario.";
            exit();
        }

        header("Location: /PlataformaEducativa/index.php?action=usuarios");
        exit();
    }

    // ===============================
    // ELIMINAR USUARIO
    // ===============================
    public function eliminarUsuario() {

        verificarSesionActiva();

        if ($_SESSION['usuario']['rol'] !== 'admin') {

            header("Location: /PlataformaEducativa/index.php?action=inicio");
            exit();
        }

        $id = $_GET['id'] ?? null;

        if ($id) {

            Usuario::eliminar($id);
        }

        header("Location: /PlataformaEducativa/index.php?action=usuarios");
        exit();
    }
}