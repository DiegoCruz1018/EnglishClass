<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo; ?></h2>
    <p class="registro__descripcion">Elige tu plan</p>

    <div class="paquetes__grid">

        <div class="paquete">
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <ul class="paquete__lista">
              <li class="paquete__elemento">Acceso Presencial</li>
                <li class="paquete__elemento">Acceso a 5 horas clase</li>
                <li class="paquete__elemento">Preparación: TOEFL, Cambridge, EXCI</li>
            </ul>

            <p class="paquete__precio">$349</p>

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
            
        </div>

        <div class="paquete">
            <h3 class="paquete__nombre">Pase Virtual</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual</li>
                <li class="paquete__elemento">Acceso a 5 horas clase</li>
                <li class="paquete__elemento">Preparación: TOEFL, Cambridge, EXCI</li>
            </ul>

            <p class="paquete__precio">$249</p>

            <div id="smart-button-container">
                <div style="text-align: center;">
                  <div id="paypal-button-container-virtual"></div>
                </div>
            </div>
        </div>

        <div class="paquete">
            <h3 class="paquete__nombre">Pase Gratis</h3>
            <ul class="paquete__lista">
              <li class="paquete__elemento">Acceso Virtual</li>
                <li class="paquete__elemento">Clase de Prueba</li>
                <li class="paquete__elemento">Examen de Ubicación</li>
            </ul>

            <p class="paquete__precio">$0</p>

            <form method="POST" action="/finalizar-registro/gratis">
                <input class="paquetes__submit" type="submit" value="Inscripción Gratis">
            </form>

            <!-- <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container-nada"></div>
                </div>
            </div> -->

        </div>
    </div>
</main>

  <script src="https://www.paypal.com/sdk/js?client-id=Adc6YGqAvfmtD_7WCDB9mf3AidMfM18ZQr49mGkIHEOF8XuFTW7aAMFuB09wVfMsKy54lOoFfpWqL3HS&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>

  <script>
    function initPayPalButton() {

      //Pase Presencial
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"1","amount":{"currency_code":"USD","value":349}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
                const datos = new FormData();
                datos.append('paquete_id', orderData.purchase_units[0].description);
                datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                fetch('/finalizar-registro/pagar', {
                    method: 'POST',
                    body: datos
                })
                .then( respuesta => respuesta.json())
                .then(resultado => {
                    if(resultado.resultado) {
                        actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                    }
                })
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');

      //Pase Virtual
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"2","amount":{"currency_code":"USD","value":249}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
                const datos = new FormData();
                datos.append('paquete_id', orderData.purchase_units[0].description);
                datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                fetch('/finalizar-registro/pagar', {
                    method: 'POST',
                    body: datos
                })
                .then( respuesta => respuesta.json())
                .then(resultado => {
                    if(resultado.resultado) {
                        actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                    }
                })
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container-virtual');

      //Pase sabatino
      // paypal.Buttons({
      //   style: {
      //     shape: 'rect',
      //     color: 'blue',
      //     layout: 'vertical',
      //     label: 'pay',
      //   },

      //   createOrder: function(data, actions) {
      //     return actions.order.create({
      //       purchase_units: [{"description":"3","amount":{"currency_code":"USD","value":149}}]
      //     });
      //   },

      //   onApprove: function(data, actions) {
      //     return actions.order.capture().then(function(orderData) {
            
      //           const datos = new FormData();
      //           datos.append('paquete_id', orderData.purchase_units[0].description);
      //           datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

      //           fetch('/finalizar-registro/pagar', {
      //               method: 'POST',
      //               body: datos
      //           })
      //           .then( respuesta => respuesta.json())
      //           .then(resultado => {
      //               if(resultado.resultado) {
      //                   actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
      //               }
      //           })
            
      //     });
      //   },

      //   onError: function(err) {
      //     console.log(err);
      //   }
      // }).render('#paypal-button-container-sabatino');


      // Pase Sabatino
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"1","amount":{"currency_code":"USD","value":349}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {

                const datos = new FormData();
                datos.append('paquete_id', orderData.purchase_units[0].description);
                datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                fetch('/finalizar-registro/pagar', {
                    method: 'POST',
                    body: datos
                })
                .then( respuesta => respuesta.json())
                .then(resultado => {
                    if(resultado.resultado) {
                        actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                    }
                })
                
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container-nada');

    }
    initPayPalButton();
  </script>