<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5" style="max-width: 700px;">

    <div class="card shadow-sm">

        <div class="card-header">
            <h2 class="mb-0">Editar Usuario</h2>
        </div>

        <div class="card-body">

            <form method="POST"
                  action="/PlataformaEducativa/index.php?action=actualizar_usuario">

                <!-- ID -->
                <input type="hidden"
                       name="id"
                       value="<?php echo $usuarioEditar['id']; ?>">

                <!-- NOMBRE -->
                <div class="mb-3">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input type="text"
                           name="nombre"
                           class="form-control"
                           value="<?php echo htmlspecialchars($usuarioEditar['nombre']); ?>"
                           required>

                </div>

                <!-- EMAIL -->
                <div class="mb-3">

                    <label class="form-label">
                        Correo
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="<?php echo htmlspecialchars($usuarioEditar['email']); ?>"
                           required>

                </div>

                <!-- ROL -->
                <div class="mb-4">

                    <label class="form-label">
                        Rol
                    </label>

                    <select name="rol"
                            class="form-select">

                        <option value="alumno"
                            <?php echo ($usuarioEditar['rol'] == 'alumno') ? 'selected' : ''; ?>>
                            Alumno
                        </option>

                        <option value="docente"
                            <?php echo ($usuarioEditar['rol'] == 'docente') ? 'selected' : ''; ?>>
                            Docente
                        </option>

                        <option value="padre"
                            <?php echo ($usuarioEditar['rol'] == 'padre') ? 'selected' : ''; ?>>
                            Padre
                        </option>

                        <option value="admin"
                            <?php echo ($usuarioEditar['rol'] == 'admin') ? 'selected' : ''; ?>>
                            Administrador
                        </option>

                    </select>

                </div>

                <!-- BOTONES -->
                <div class="d-flex gap-2">

                    <button type="submit"
                            class="btn btn-primary">
                        Guardar Cambios
                    </button>

                    <a href="/PlataformaEducativa/index.php?action=usuarios"
                       class="btn btn-secondary">
                        Cancelar
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>