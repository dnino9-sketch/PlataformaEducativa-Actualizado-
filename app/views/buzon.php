<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-4">

    <h2 class="mb-4">
        Buzón de Mensajes
    </h2>

    <!-- ENVIAR MENSAJE -->
    <div class="card shadow-sm mb-4">

        <div class="card-header bg-primary text-white">
            Enviar Mensaje
        </div>

        <div class="card-body">

            <form method="POST"
                  action="/PlataformaEducativa/index.php?action=enviar_mensaje">

                <!-- DESTINATARIO -->
                <div class="mb-3">

                    <label class="form-label">
                        Destinatario
                    </label>

                    <select name="destinatario_id"
                            class="form-select"
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
                <div class="mb-3">

                    <label class="form-label">
                        Asunto
                    </label>

                    <input type="text"
                           name="asunto"
                           class="form-control"
                           required>

                </div>

                <!-- MENSAJE -->
                <div class="mb-3">

                    <label class="form-label">
                        Mensaje
                    </label>

                    <textarea name="mensaje"
                              class="form-control"
                              rows="4"
                              required></textarea>

                </div>

                <button type="submit"
                        class="btn btn-success">

                    Enviar Mensaje

                </button>

            </form>

        </div>

    </div>

    <!-- RECIBIDOS -->
    <div class="card shadow-sm mb-4">

        <div class="card-header bg-success text-white">
            Mensajes Recibidos
        </div>

        <div class="card-body">

            <?php if (!empty($recibidos)): ?>

                <?php foreach ($recibidos as $m): ?>

                    <div class="border rounded p-3 mb-3">

                        <h5>

                            <?php echo htmlspecialchars($m['asunto']); ?>

                        </h5>

                        <p class="mb-1">

                            <strong>De:</strong>

                            <?php echo htmlspecialchars($m['remitente']); ?>

                        </p>

                        <p class="mb-1">

                            <?php echo nl2br(htmlspecialchars($m['mensaje'])); ?>

                        </p>

                        <small class="text-muted">

                            <?php echo $m['fecha']; ?>

                        </small>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="alert alert-info">
                    No tienes mensajes recibidos.
                </div>

            <?php endif; ?>

        </div>

    </div>

    <!-- ENVIADOS -->
    <div class="card shadow-sm">

        <div class="card-header bg-secondary text-white">
            Mensajes Enviados
        </div>

        <div class="card-body">

            <?php if (!empty($enviados)): ?>

                <?php foreach ($enviados as $m): ?>

                    <div class="border rounded p-3 mb-3">

                        <h5>

                            <?php echo htmlspecialchars($m['asunto']); ?>

                        </h5>

                        <p class="mb-1">

                            <strong>Para:</strong>

                            <?php echo htmlspecialchars($m['destinatario']); ?>

                        </p>

                        <p class="mb-1">

                            <?php echo nl2br(htmlspecialchars($m['mensaje'])); ?>

                        </p>

                        <small class="text-muted">

                            <?php echo $m['fecha']; ?>

                        </small>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="alert alert-info">
                    No has enviado mensajes.
                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>