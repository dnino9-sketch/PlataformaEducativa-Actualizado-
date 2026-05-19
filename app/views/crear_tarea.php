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

                        <i class="bi bi-journal-plus text-success me-2"></i>
                        Crear Nueva Tarea

                    </h2>

                    <p class="text-muted mb-0">

                        Publica actividades académicas para los estudiantes.

                    </p>

                </div>

                <div class="mt-3 mt-md-0">

                    <span class="badge bg-success fs-6 px-4 py-3">

                        Nueva Actividad

                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- FORMULARIO -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="/PlataformaEducativa/index.php?action=guardar_tarea"
                  method="POST">

                <div class="row g-4">

                    <!-- MATERIA -->
                    <div class="col-md-6">

                        <label for="materia"
                               class="form-label fw-semibold">

                            <i class="bi bi-book-fill text-primary me-2"></i>
                            Materia

                        </label>

                        <select id="materia"
                                name="materia"
                                class="form-select custom-input"
                                required>

                            <option value="">
                                Seleccione una materia
                            </option>

                            <option value="Matemática">
                                Matemática
                            </option>

                            <option value="Ciencias">
                                Ciencias
                            </option>

                            <option value="Español">
                                Español
                            </option>

                        </select>

                    </div>

                    <!-- CURSO -->
                    <div class="col-md-6">

                        <label for="curso"
                               class="form-label fw-semibold">

                            <i class="bi bi-mortarboard-fill text-success me-2"></i>
                            Curso

                        </label>

                        <select id="curso"
                                name="curso"
                                class="form-select custom-input"
                                required>

                            <option value="">
                                Seleccione un curso
                            </option>

                            <option value="Curso A">
                                Curso A
                            </option>

                            <option value="Curso B">
                                Curso B
                            </option>

                        </select>

                    </div>

                    <!-- DESCRIPCION -->
                    <div class="col-12">

                        <label for="descripcion"
                               class="form-label fw-semibold">

                            <i class="bi bi-card-text text-warning me-2"></i>
                            Descripción

                        </label>

                        <textarea id="descripcion"
                                  name="descripcion"
                                  class="form-control custom-input"
                                  rows="6"
                                  placeholder="Escribe la descripción de la tarea..."
                                  required></textarea>

                    </div>

                    <!-- ESTADO -->
                    <div class="col-md-6">

                        <label for="estado"
                               class="form-label fw-semibold">

                            <i class="bi bi-flag-fill text-danger me-2"></i>
                            Estado

                        </label>

                        <select id="estado"
                                name="estado"
                                class="form-select custom-input"
                                required>

                            <option value="Pendiente" selected>
                                Pendiente
                            </option>

                            <option value="Entregada">
                                Entregada
                            </option>

                            <option value="En revisión">
                                En revisión
                            </option>

                        </select>

                    </div>

                </div>

                <!-- BOTONES -->
                <div class="d-flex flex-wrap gap-3 mt-5">

                    <button type="submit"
                            class="btn btn-success px-5 py-2">

                        <i class="bi bi-check-circle-fill me-2"></i>
                        Guardar Tarea

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

    border-color: #0d6efd;

    box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.15);
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