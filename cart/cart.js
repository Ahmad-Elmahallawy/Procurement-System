'use strict';

// all initial elements
const closeBtn = document.getElementsByClassName('product-close-btn');
const decrementBtn = document.getElementsByClassName('decrement');
const quantityElem = document.getElementsByClassName('quantity');
const incrementBtn = document.getElementsByClassName('increment');
const priceElem = document.getElementsByClassName('price');
const subtotalElem = document.getElementById('subtotal');
const countElem = document.getElementById('count');
const shippingElem = document.getElementById('shipping');
const taxElem = document.getElementById('tax');
const totalElem = document.getElementById('total');

// loop: when delete item button
for (let i = 0; i < closeBtn.length; i++) {
  closeBtn[i].addEventListener('click', function () {

    this.parentElement.parentElement.remove()
    updateCartTotal();

  });
  
}


// loop: for increment & decrement button
for (let i = 0; i < incrementBtn.length; i++) {

    incrementBtn[i].addEventListener('click', function () {

      let increment = Number(this.previousElementSibling.textContent);

      increment++;

      this.previousElementSibling.textContent = increment;

      updateCartTotal();

    });


    decrementBtn[i].addEventListener('click', function () {

      let decrement = Number(this.nextElementSibling.textContent);

      decrement <= 1 ? 1 : decrement--;

      this.nextElementSibling.textContent = decrement;

      updateCartTotal();

    });

}

// loop: changing suppliers 
const amazon = 24.99;
const ebay = 20.95;
const hp = 35.99;

var supplier = document.getElementById("supplier");

supplier.addEventListener("change", function() {
    var supplierVal = document.getElementById('supplier').value;
    console.log(supplierVal)
    if (supplierVal == 'Amazon') {
      priceElem[0].textContent = amazon;
      updateCartTotal();
    }
    if (supplierVal == "eBay") {
      priceElem[0].textContent = ebay;
      updateCartTotal();
    }
    if (supplierVal == "HP") {
      priceElem[0].textContent = hp;
      updateCartTotal();
    } 
})


// function: update cart total
var updateCartTotal = function () {

    const tax = 0.15;
    let subtotal = 0;
    let totalTax = 0;
    let total = 0;
    let count = 0;
    let shipping = 15;

    for (let i = 0; i < quantityElem.length; i++) {
      subtotal += Number(quantityElem[i].textContent) * Number(priceElem[i].textContent);
      count += Number(quantityElem[i].textContent);
    }

    subtotalElem.textContent = subtotal.toFixed(2);

    countElem.textContent = count;

    totalTax = subtotal * tax;

    taxElem.textContent = totalTax.toFixed(2);

    // shipping is free if subtotal is less that $30
    if (subtotal >= 30) {
      shipping = 0
    }

    shippingElem.textContent = shipping.toFixed(2);

    total = subtotal + totalTax + shipping;

    totalElem.textContent = total.toFixed(2);   
}