</main>

<!-- FOOTER -->
<footer class="mt-5">

    <div class="container">

        <div class="card border-0 shadow-sm">

            <div class="card-body py-4">

                <div class="row align-items-center">

                    <!-- IZQUIERDA -->
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">

                        <h6 class="mb-1 fw-bold text-primary">
                            Plataforma Educativa
                        </h6>

                        <small class="text-muted">
                            Sistema de gestión académica y comunicación escolar.
                        </small>

                    </div>

                    <!-- DERECHA -->
                    <div class="col-md-6">

                        <div class="d-flex justify-content-center justify-content-md-end gap-3">

                            <a href="#"
                               class="text-decoration-none text-muted">

                                <i class="bi bi-info-circle me-1"></i>
                                Acerca de

                            </a>

                            <a href="#"
                               class="text-decoration-none text-muted">

                                <i class="bi bi-question-circle me-1"></i>
                                Ayuda

                            </a>

                            <a href="#"
                               class="text-decoration-none text-muted">

                                <i class="bi bi-shield-check me-1"></i>
                                Privacidad

                            </a>

                        </div>

                    </div>

                </div>

                <!-- COPYRIGHT -->
                <hr class="my-3">

                <div class="text-center text-muted small">

                    &copy; <?php echo date('Y'); ?>
                    Plataforma Educativa —
                    Todos los derechos reservados.

                </div>

            </div>

        </div>

    </div>

</footer>

<!-- BOTON SUBIR -->
<button id="btnTop"
        class="btn btn-primary shadow"
        style="
            position: fixed;
            bottom: 25px;
            right: 25px;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: none;
            z-index: 999;
        ">

    <i class="bi bi-arrow-up"></i>

</button>

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- SCRIPT -->
<script>

    const btnTop = document.getElementById('btnTop');

    window.addEventListener('scroll', () => {

        if (window.scrollY > 200) {

            btnTop.style.display = 'block';

        } else {

            btnTop.style.display = 'none';
        }
    });

    btnTop.addEventListener('click', () => {

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

    });

</script>

<!-- SCRIPT PERSONALIZADO -->
<script src="/PlataformaEducativa/js/main.js"></script>

</body>
</html>