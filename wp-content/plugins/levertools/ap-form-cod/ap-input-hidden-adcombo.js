 // Obtener referencias a los elementos del formulario
 var idOfertaCod = document.getElementById('id-oferta-cod');
 var countryCodeCod = document.getElementById('country-code-cod');
 var priceOfertCod = document.getElementById('price-ofert-cod');
 var traficUrlCod = document.getElementById('trafic-url-cod');
 var urlConfirmationCod = document.getElementById('url-confirmation-cod');
 var nameFormCod = document.getElementById('name-form-cod');
 
 // Obtener referencias a los campos ocultos
 var offerId = document.getElementById('offer-id');
 var countryCode = document.getElementById('country-code');
 var priceOffer = document.getElementById('price-offer');
 var urlTrafic = document.getElementById('url-trafic');
 var urlConfirmation = document.getElementById('url-confirmation');
 var nameForm = document.getElementById('name-form');
 
 // Agregar eventos input a los campos visibles para actualizar los campos ocultos
 idOfertaCod.addEventListener('input', function() {
   offerId.value = idOfertaCod.value;
 });
 
 countryCodeCod.addEventListener('input', function() {
   countryCode.value = countryCodeCod.value;
 });
 
 priceOfertCod.addEventListener('input', function() {
   priceOffer.value = priceOfertCod.value;
 });
 
 traficUrlCod.addEventListener('input', function() {
   urlTrafic.value = traficUrlCod.value;
 });

 urlConfirmationCod.addEventListener('input', function() {
    urlConfirmation.value = urlConfirmationCod.value;
  });

  nameFormCod.addEventListener('input', function() {
    nameForm.value = nameFormCod.value;
  });