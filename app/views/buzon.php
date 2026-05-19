<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container-fluid">

    <!-- ENCABEZADO -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h2 class="fw-bold mb-2">

                        <i class="bi bi-envelope-fill text-primary me-2"></i>
                        Buzón de Mensajes

                    </h2>

                    <p class="text-muted mb-0">

                        Envía y recibe mensajes dentro de la plataforma educativa.

                    </p>

                </div>

                <div class="mt-3 mt-md-0">

                    <span class="badge bg-primary fs-6 px-4 py-3">

                        <?php echo count($recibidos); ?>
                        Recibidos

                    </span>

                </div>

            </div>

        </div>

    </div>

    <div class="row g-4">

        <!-- ENVIAR -->
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-primary text-white border-0 py-3">

                    <h5 class="mb-0">

                        <i class="bi bi-send-fill me-2"></i>
                        Nuevo Mensaje

                    </h5>

                </div>

                <div class="card-body p-4">

                    <form method="POST"
                          action="/PlataformaEducativa/index.php?action=enviar_mensaje">

                        <!-- DESTINATARIO -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Destinatario

                            </label>

                            <select name="destinatario_id"
                                    class="form-select custom-input"
                                    required>

                                <option value="">
                                    Seleccione usuario
                                </option>

                                <?php foreach ($usuarios as $u): ?>

                                    <?php if ($u['id'] != $_SESSION['usuario']['id']): ?>

                                        <option value="<?php echo $u['id']; ?>">

                                            <?php echo htmlspecialchars($u['nombre']); ?>

                                        </option>

                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <!-- ASUNTO -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Asunto

                            </label>

                            <input type="text"
                                   name="asunto"
                                   class="form-control custom-input"
                                   placeholder="Escriba el asunto..."
                                   required>

                        </div>

                        <!-- MENSAJE -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Mensaje

                            </label>

                            <textarea name="mensaje"
                                      class="form-control custom-input"
                                      rows="6"
                                      placeholder="Escribe tu mensaje..."
                                      required></textarea>

                        </div>

                        <button type="submit"
                                class="btn btn-success w-100 py-2">

                            <i class="bi bi-send-fill me-2"></i>
                            Enviar Mensaje

                        </button>

                    </form>

                </div>

            </div>

        </div>

        <!-- MENSAJES -->
        <div class="col-lg-8">

            <!-- RECIBIDOS -->
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-success text-white border-0 py-3">

                    <h5 class="mb-0">

                        <i class="bi bi-inbox-fill me-2"></i>
                        Mensajes Recibidos

                    </h5>

                </div>

                <div class="card-body p-4">

                    <?php if (!empty($recibidos)): ?>

                        <?php foreach ($recibidos as $m): ?>

                            <div class="message-card received-message">

                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-3">

                                    <div>

                                        <h5 class="fw-bold mb-1">

                                            <?php echo htmlspecialchars($m['asunto']); ?>

                                        </h5>

                                        <span class="text-muted small">

                                            <i class="bi bi-person-fill me-1"></i>

                                            De:
                                            <?php echo htmlspecialchars($m['remitente']); ?>

                                        </span>

                                    </div>

                                    <span class="badge bg-success">

                                        Recibido

                                    </span>

                                </div>

                                <p class="message-text">

                                    <?php echo nl2br(htmlspecialchars($m['mensaje'])); ?>

                                </p>

                                <small class="text-muted">

                                    <i class="bi bi-clock-fill me-1"></i>

                                    <?php echo $m['fecha']; ?>

                                </small>

                            </div>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <div class="empty-box">

                            <i class="bi bi-inbox fs-1 text-muted"></i>

                            <h5 class="mt-3 text-muted">

                                No tienes mensajes recibidos

                            </h5>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

            <!-- ENVIADOS -->
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-secondary text-white border-0 py-3">

                    <h5 class="mb-0">

                        <i class="bi bi-send-check-fill me-2"></i>
                        Mensajes Enviados

                    </h5>

                </div>

                <div class="card-body p-4">

                    <?php if (!empty($enviados)): ?>

                        <?php foreach ($enviados as $m): ?>

                            <div class="message-card sent-message">

                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-3">

                                    <div>

                                        <h5 class="fw-bold mb-1">

                                            <?php echo htmlspecialchars($m['asunto']); ?>

                                        </h5>

                                        <span class="text-muted small">

                                            <i class="bi bi-person-fill me-1"></i>

                                            Para:
                                            <?php echo htmlspecialchars($m['destinatario']); ?>

                                        </span>

                                    </div>

                                    <span class="badge bg-secondary">

                                        Enviado

                                    </span>

                                </div>

                                <p class="message-text">

                                    <?php echo nl2br(htmlspecialchars($m['mensaje'])); ?>

                                </p>

                                <small class="text-muted">

                                    <i class="bi bi-clock-fill me-1"></i>

                                    <?php echo $m['fecha']; ?>

                                </small>

                            </div>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <div class="empty-box">

                            <i class="bi bi-send-x fs-1 text-muted"></i>

                            <h5 class="mt-3 text-muted">

                                No has enviado mensajes

                            </h5>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

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

.message-card {

    border-radius: 18px;

    padding: 22px;

    margin-bottom: 20px;

    transition: 0.3s ease;
}

.message-card:hover {

    transform: translateY(-2px);
}

.received-message {

    background: rgba(25,135,84,0.05);

    border-left: 5px solid #198754;
}

.sent-message {

    background: rgba(108,117,125,0.06);

    border-left: 5px solid #6c757d;
}

.message-text {

    line-height: 1.8;

    margin-bottom: 15px;
}

.empty-box {

    text-align: center;

    padding: 50px 20px;
}

.card {

    border-radius: 22px;
}

.btn {

    border-radius: 12px;

    font-weight: 600;
}

textarea {

    resize: none;
}

</style>

<?php require_once __DIR__ . '/templates/footer.php'; ?>