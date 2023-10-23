<main class="pagina">
    <h2 class="pagina__heading">Asistencia a English Class</h2>
    <p class="pagina__descripcion">Tu Pase - Te recomendamos almacenarlo</p>

    <div class="boleto-virtual">

        <div class="boleto boleto--<?php echo strtolower($registro->paquete->nombre); ?> boleto--acceso">
            <div class="boleto__contenido">
                <h4 class="boleto__logo">&#60;English Class /></h4>
                <p class="boleto__plan"><?php echo $registro->paquete->nombre; ?></p>
                <p class="boleto__nombre"><?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido; ?></p>
            </div>

            <p class="boleto__codigo"><?php echo '#' . $registro->token; ?></p>
        </div>
    </div>
</main>