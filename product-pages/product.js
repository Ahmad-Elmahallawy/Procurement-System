//loop: product pages quantity
/* product quantity input */
var quantityInputs = document.getElementsByClassName('quantity-input')
        for (var i = 0; i < quantityInputs.length; i++) {
            var input = quantityInputs[i];
            // on change event listener
            input.addEventListener('change', function(event) {
                var input = event.target;
                if (isNaN(input.value) || input.value <= 0) {
                    input.value = 1;
                }
            })
                
        }