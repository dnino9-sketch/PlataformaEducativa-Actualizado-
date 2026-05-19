<?php
require_once __DIR__ . '/templates/header.php';
?>

<div class="container-fluid">

    <!-- ENCABEZADO -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h2 class="fw-bold mb-2">

                        <i class="bi bi-pencil-square text-warning me-2"></i>
                        Editar Tarea

                    </h2>

                    <p class="text-muted mb-0">

                        Modifica la información y configuración de la tarea.

                    </p>

                </div>

                <div class="mt-3 mt-md-0">

                    <span class="badge bg-warning text-dark fs-6 px-4 py-3">

                        Editando Actividad

                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- FORMULARIO -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="/PlataformaEducativa/index.php?action=actualizar_tarea"
                  method="POST">

                <!-- ID -->
                <input type="hidden"
                       name="id"
                       value="<?php echo htmlspecialchars($tarea->id); ?>">

                <div class="row g-4">

                    <!-- MATERIA -->
                    <div class="col-md-6">

                        <label for="materia"
                               class="form-label fw-semibold">

                            <i class="bi bi-book-fill text-primary me-2"></i>
                            Materia

                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               id="materia"
                               name="materia"
                               required
                               value="<?php echo htmlspecialchars($tarea->materia); ?>">

                    </div>

                    <!-- CURSO -->
                    <div class="col-md-6">

                        <label for="curso"
                               class="form-label fw-semibold">

                            <i class="bi bi-mortarboard-fill text-success me-2"></i>
                            Curso

                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               id="curso"
                               name="curso"
                               required
                               value="<?php echo htmlspecialchars($tarea->curso); ?>">

                    </div>

                    <!-- DESCRIPCION -->
                    <div class="col-12">

                        <label for="descripcion"
                               class="form-label fw-semibold">

                            <i class="bi bi-card-text text-warning me-2"></i>
                            Descripción

                        </label>

                        <textarea class="form-control custom-input"
                                  id="descripcion"
                                  name="descripcion"
                                  rows="6"
                                  required><?php echo htmlspecialchars($tarea->descripcion); ?></textarea>

                    </div>

                    <!-- ESTADO -->
                    <div class="col-md-6">

                        <label for="estado"
                               class="form-label fw-semibold">

                            <i class="bi bi-flag-fill text-danger me-2"></i>
                            Estado

                        </label>

                        <select class="form-select custom-input"
                                id="estado"
                                name="estado"
                                required>

                            <option value="Pendiente"
                                <?php if($tarea->estado == 'Pendiente') echo 'selected'; ?>>

                                Pendiente

                            </option>

                            <option value="Entregada"
                                <?php if($tarea->estado == 'Entregada') echo 'selected'; ?>>

                                Entregada

                            </option>

                            <option value="En revisión"
                                <?php if($tarea->estado == 'En revisión') echo 'selected'; ?>>

                                En revisión

                            </option>

                        </select>

                    </div>

                </div>

                <!-- BOTONES -->
                <div class="d-flex flex-wrap gap-3 mt-5">

                    <button type="submit"
                            class="btn btn-warning text-dark px-5 py-2">

                        <i class="bi bi-check-circle-fill me-2"></i>
                        Actualizar Tarea

                    </button>

                    <a href="/PlataformaEducativa/"
                       class="btn btn-secondary px-5 py-2">

                        <i class="bi bi-arrow-left me-2"></i>
                        Cancelar

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<style>

.custom-input {

    border-radius: 14px;

    padding: 12px 15px;

    border: 1px solid #dfe3e8;

    transition: 0.3s ease;
}

.custom-input:focus {

    border-color: #ffc107;

    box-shadow: 0 0 0 0.2rem rgba(255,193,7,0.15);
}

.card {

    border-radius: 20px;
}

textarea {

    resize: none;
}

.btn {

    border-radius: 12px;

    font-weight: 600;
}

</style>

<?php
require_once __DIR__ . '/templates/footer.php';
?>