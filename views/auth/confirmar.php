<main class="auth">
    <h2 class="auth__heading">Confirmar tu cuenta English Class</h2>
    <p class="auth__texto">Tu Cuenta English Class</p> 
    
    <?php 
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <?php if(isset($alertas['exito'])) { ?>
        <div class="acciones--centrar">
            <a href="/login" class="acciones__enlace">Iniciar Sesión</a>
        </div>
    <?php } ?>

</main>