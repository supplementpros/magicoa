    var personalizarDiv = document.querySelector('.personalizar-form-cod');
    var form = document.getElementById('myForm');
    var emailVisualSelect = document.getElementById('email-visual');
    var emailGroup = document.getElementById('email-group');
    var emailInput = document.getElementById('email');

    personalizarDiv.addEventListener('input', function(event) {
        var color = document.getElementById('color').value;
        var border = document.getElementById('border').value;
        var formBorderRadius = document.getElementById('border-radius').value;
        var padding = document.getElementById('padding').value;
        var labelAlign = document.getElementById('label-align').value;
        var inputAlign = document.getElementById('input-align').value;
        var buttonAlign = document.getElementById('button-align').value;
        var labelColor = document.getElementById('label-color').value;
        var backgroundOpacity = document.getElementById('background-opacity').value;
        var buttonColor = document.getElementById('button-color').value;
        var buttonTextColor = document.getElementById('button-text-color').value;
        var buttonText = document.getElementById('button-text').value;
        var buttonSize = document.getElementById('button-size').value;
        var buttonBorderRadius = document.getElementById('button-border-radius').value;
        var buttonAnimation = document.getElementById('button-animation').value;
        var namePlaceholder = document.getElementById('name-placeholder').value;
        var emailPlaceholder = document.getElementById('email-placeholder').value;
        var phonePlaceholder = document.getElementById('phone-placeholder').value;
        var nameLabel = document.getElementById('name-label').value;
        var emailLabel = document.getElementById('email-label').value;
        var phoneLabel = document.getElementById('phone-label').value;

        // Aplicar estilos al fondo del formulario
        form.style.backgroundColor = 'rgba(' + hexToRgb(color).join(',') + ',' + backgroundOpacity + ')';
        form.style.transition = 'background-color 0.3s';

        // Aplicar estilos al formulario
        form.style.border = border;
        form.style.borderRadius = formBorderRadius;
        form.style.padding = padding;

        var labels = form.querySelectorAll('label');
        labels.forEach(function(label) {
            label.style.textAlign = labelAlign;
            label.style.color = labelColor;

            if (label.getAttribute('for') === 'name') {
                label.textContent = nameLabel;
            } else if (label.getAttribute('for') === 'email') {
                label.textContent = emailLabel;
            } else if (label.getAttribute('for') === 'phone') {
                label.textContent = phoneLabel;
            }
        });

        var inputs = form.querySelectorAll('input');
        inputs.forEach(function(input) {
            input.style.textAlign = inputAlign;
            if (input.id === 'name') {
                input.placeholder = namePlaceholder;
            } else if (input.id === 'email') {
                input.placeholder = emailPlaceholder;
            } else if (input.id === 'phone') {
                input.placeholder = phonePlaceholder;
            }
        });

        var buttonContainer = form.querySelector('.button-container');
        buttonContainer.style.textAlign = buttonAlign;

        var button = form.querySelector('button');
        button.style.backgroundColor = buttonColor;
        button.style.color = buttonTextColor;
        button.textContent = buttonText;
        button.style.fontSize = buttonSize;
        button.style.borderRadius = buttonBorderRadius + 'px';

        button.classList.remove('pulse', 'bounce', 'flash');
        if (buttonAnimation !== 'none') {
            button.classList.add(buttonAnimation);
        }
    });

    emailVisualSelect.addEventListener('change', function() {
        var selectedValue = this.value;

        if (selectedValue === '1') {
            emailGroup.style.display = 'block';
            emailInput.type = 'email';
            emailInput.required = true;
            form.setAttribute('onsubmit', '');
            emailInput.removeAttribute('value'); // Eliminar completamente el atributo value del input
        } else if (selectedValue === '2') {
            emailGroup.style.display = 'none';
            emailInput.type = 'hidden';
            emailInput.removeAttribute('required');
            form.setAttribute('onsubmit', 'return validateForm();');
            emailInput.value = "not-mail@levertools.com"; // Establecer el valor del input cuando se oculta
        }
    });

    emailInput.addEventListener('focus', function() {
        if (emailInput.value === "not-mail@levertools.com") {
            emailInput.value = ""; // Borrar el valor del input al hacer clic en él
        }
    });

    function validateForm() {
        // Realiza cualquier validación adicional del formulario aquí antes de enviarlo
        return true;
    }

    // Función auxiliar para convertir un color hexadecimal a RGB
    function hexToRgb(hex) {
        var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
        hex = hex.replace(shorthandRegex, function(_, r, g, b) {
            return r + r + g + g + b + b;
        });

        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? [
            parseInt(result[1], 16),
            parseInt(result[2], 16),
            parseInt(result[3], 16)
        ] : null;
    }
