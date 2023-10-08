document.addEventListener("DOMContentLoaded", function() {
    // Obtener los elementos del formulario y los campos ocultos
    var myForm = document.getElementById("myForm");
    var contenCodHtml = document.getElementById("conten_cod_html");
    var contenCodName = document.getElementById("conten_cod_name");
    var nameFormCod = document.getElementById("name-form-cod");
    var urlCodConfirmation = document.getElementById("url_cod_confirmation");
    var paginaSelect = document.getElementById("url-confirmation-cod");
  
    // Función para capturar la estructura HTML del formulario con los estilos y atributos actuales
    function captureFormStructure() {
      // Restablecer los valores de los campos del formulario
      myForm.reset();
  
      // Crear un elemento de tipo div para contener el formulario clonado
      var cloneContainer = document.createElement("div");
  
      // Clonar el formulario
      var clonedForm = myForm.cloneNode(true);
  
      // Agregar el formulario clonado al contenedor
      cloneContainer.appendChild(clonedForm);
  
      // Capturar la estructura HTML del formulario clonado
      var formHTML = cloneContainer.innerHTML;
  
      // Actualizar el valor del campo oculto con la estructura HTML capturada
      contenCodHtml.value = formHTML;
    }
  
    // Capturar la estructura HTML inicial del formulario
    captureFormStructure();
  
    // Actualizar el campo oculto cuando cambie el valor del campo name-form-cod
    nameFormCod.addEventListener("input", function() {
      contenCodName.value = nameFormCod.value;
    });
  
    // Actualizar el campo oculto cuando cambie el valor del select
    paginaSelect.addEventListener("change", function() {
      urlCodConfirmation.value = paginaSelect.value;
    });
  
    // Observar los cambios en el formulario
    var observer = new MutationObserver(function(mutations) {
      // Capturar la estructura HTML actualizada del formulario
      captureFormStructure();
    });
  
    // Configurar las opciones del observador
    var config = { attributes: true, childList: true, subtree: true };
  
    // Iniciar la observación del formulario
    observer.observe(myForm, config);
  
    // Enviar el formulario
    myForm.addEventListener("submit", function(event) {
      event.preventDefault();
      myForm.submit();
    });
  });