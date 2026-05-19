<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="login-page">

    <div class="container-fluid h-100">

        <div class="row h-100">

            <!-- PANEL IZQUIERDO -->
            <div class="col-lg-6 d-none d-lg-flex login-left">

                <div class="login-overlay"></div>

                <div class="login-content">

                    <h1 class="fw-bold display-5 mb-4">

                        Plataforma Educativa

                    </h1>

                    <p class="lead mb-4">

                        Gestiona tareas, calificaciones, mensajes y usuarios
                        desde una plataforma moderna y profesional.

                    </p>

                    <div class="d-flex flex-column gap-3 mt-5">

                        <div class="feature-box">

                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                Gestión académica completa
                            </span>

                        </div>

                        <div class="feature-box">

                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                Entregas y calificaciones online
                            </span>

                        </div>

                        <div class="feature-box">

                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                Comunicación entre usuarios
                            </span>

                        </div>

                    </div>

                </div>

            </div>

            <!-- LOGIN -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center">

                <div class="login-card">

                    <!-- LOGO -->
                    <div class="text-center mb-4">

                        <div class="logo-circle mx-auto mb-3">

                            <i class="bi bi-mortarboard-fill"></i>

                        </div>

                        <h2 class="fw-bold">

                            Bienvenido

                        </h2>

                        <p class="text-muted">

                            Inicia sesión para continuar

                        </p>

                    </div>

                    <!-- ERROR -->
                    <?php if (isset($error) && $error): ?>

                        <div class="alert alert-danger border-0 rounded-4">

                            <i class="bi bi-exclamation-triangle-fill me-2"></i>

                            <?php echo htmlspecialchars($error); ?>

                        </div>

                    <?php endif; ?>

                    <!-- FORM -->
                    <form method="POST"
                          action="/PlataformaEducativa/index.php?action=login">

                        <!-- EMAIL -->
                        <div class="mb-4">

                            <label for="email"
                                   class="form-label fw-semibold">

                                Correo electrónico

                            </label>

                            <div class="input-group">

                                <span class="input-group-text custom-icon">

                                    <i class="bi bi-envelope-fill"></i>

                                </span>

                                <input type="email"
                                       class="form-control custom-input"
                                       id="email"
                                       name="email"
                                       placeholder="Ingrese su correo"
                                       required
                                       autofocus>

                            </div>

                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-4">

                            <label for="password"
                                   class="form-label fw-semibold">

                                Contraseña

                            </label>

                            <div class="input-group">

                                <span class="input-group-text custom-icon">

                                    <i class="bi bi-lock-fill"></i>

                                </span>

                                <input type="password"
                                       class="form-control custom-input"
                                       id="password"
                                       name="password"
                                       placeholder="Ingrese su contraseña"
                                       required>

                            </div>

                        </div>

                        <!-- BOTON -->
                        <button type="submit"
                                class="btn btn-primary w-100 login-btn">

                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            Ingresar

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

body {

    background: #f4f7fb;
}

.login-page {

    min-height: calc(100vh - 120px);
}

.login-left {

    position: relative;

    background:
        linear-gradient(
            135deg,
            rgba(13,110,253,0.9),
            rgba(11,94,215,0.95)
        ),
        url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1200');

    background-size: cover;

    background-position: center;

    color: white;

    padding: 60px;

    overflow: hidden;
}

.login-overlay {

    position: absolute;

    inset: 0;

    background: rgba(0,0,0,0.15);
}

.login-content {

    position: relative;

    z-index: 2;

    max-width: 500px;

    margin: auto 0;
}

.feature-box {

    display: flex;

    align-items: center;

    gap: 15px;

    background: rgba(255,255,255,0.12);

    backdrop-filter: blur(8px);

    padding: 16px 20px;

    border-radius: 16px;

    font-size: 1rem;
}

.feature-box i {

    font-size: 1.3rem;
}

.login-card {

    width: 100%;

    max-width: 480px;

    background: white;

    border-radius: 28px;

    padding: 50px;

    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
}

.logo-circle {

    width: 90px;

    height: 90px;

    border-radius: 50%;

    background: linear-gradient(135deg, #0d6efd, #0b5ed7);

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 2.5rem;

    box-shadow: 0 10px 25px rgba(13,110,253,0.3);
}

.custom-input {

    border-radius: 0 14px 14px 0 !important;

    padding: 14px;

    border: 1px solid #dfe3e8;
}

.custom-input:focus {

    box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.15);

    border-color: #0d6efd;
}

.custom-icon {

    border-radius: 14px 0 0 14px !important;

    background: #f8f9fa;

    border: 1px solid #dfe3e8;

    border-right: none;

    padding: 0 18px;

    color: #0d6efd;
}

.login-btn {

    border-radius: 14px;

    padding: 14px;

    font-weight: 600;

    font-size: 1rem;

    transition: 0.3s ease;
}

.login-btn:hover {

    transform: translateY(-2px);

    box-shadow: 0 10px 20px rgba(13,110,253,0.25);
}

@media (max-width: 991px) {

    .login-card {

        padding: 35px 25px;

        margin: 20px;
    }
}

</style>

<?php require_once __DIR__ . '/templates/footer.php'; ?>