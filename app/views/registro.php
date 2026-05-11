<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5" style="max-width: 500px;">

    <div class="card shadow-sm">

        <div class="card-body">

            <h2 class="mb-4">
                Registrar Usuario
            </h2>

            <?php if (isset($error) && $error): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form method="POST"
                  action="/PlataformaEducativa/index.php?action=registro">

                <!-- NOMBRE -->
                <div class="mb-3">

                    <label for="nombre" class="form-label">
                        Nombre completo
                    </label>

                    <input type="text"
                           class="form-control"
                           id="nombre"
                           name="nombre"
                           required>

                </div>

                <!-- EMAIL -->
                <div class="mb-3">

                    <label for="email" class="form-label">
                        Correo electrónico
                    </label>

                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           required>

                </div>

                <!-- PASSWORD -->
                <div class="mb-3">

                    <label for="password" class="form-label">
                        Contraseña
                    </label>

                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           required>

                </div>

                <!-- ROL -->
                <div class="mb-4">

                    <label for="rol" class="form-label">
                        Rol
                    </label>

                    <select class="form-select"
                            id="rol"
                            name="rol"
                            required>

                        <option value="alumno" selected>
                            Alumno
                        </option>

                        <option value="docente">
                            Docente
                        </option>

                        <option value="padre">
                            Padre
                        </option>

                        <option value="admin">
                            Administrador
                        </option>

                    </select>

                </div>

                <!-- BOTONES -->
                <div class="d-flex gap-2">

                    <button type="submit"
                            class="btn btn-success w-100">

                        Guardar Usuario

                    </button>

                    <a href="/PlataformaEducativa/index.php?action=usuarios"
                       class="btn btn-secondary w-100">

                        Cancelar

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>