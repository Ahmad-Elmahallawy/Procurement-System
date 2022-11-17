// Product Class: Represents a Product
class Supply {
    constructor(title, name, price) {
        this.title = title;
        this.name = name;
        this.price = price;
    }
}

// UI Class: Handle UI Tasks
class UI {
    static displayProduct() {
        
        const product = Store.getSupplies();

        product.forEach((supply) => UI.addSupplyToList(supply));
    }

   static addSupplyToList(supply)
    {
   
        const list = document.querySelector('#supply-list');

        const row = document.createElement('tr');
        row.innerHTML = `
        <td>${supply.title}</td>
        <td>${supply.name}</td>
        <td>${supply.price}</td>
        <td><a href="#" class="btn btn-danger btn-sm delete">X</a></td>`;

        list.appendChild(row);
    }

    static deleteSupply(el){
        if(el.classList.contains('delete')){
            el.parentElement.parentElement.remove();
        }
    }

    static showAlert(message, className){
        const div = document.createElement('div');
        div.className = `alert alert-${className}`;
        div.appendChild(document.createTextNode(message));
        const container = document.querySelector('.container');
        const form = document.querySelector('#supply-form');
        container.insertBefore(div, form);

        // Vanish in 3 seconds
        setTimeout(() => document.querySelector('.alert').remove(), 3000);
    }
    static clearFields(){
        document.querySelector('#title').value = '';
        document.querySelector('#name').value = '';
        document.querySelector('#price').value = '';

    }

   
}


// Store Class: Handles Storage
class Store{

    static getSupplies(){
        let product;
        if(localStorage.getItem('product') === null){
            product = [];
        }
        else{
            product = JSON.parse(localStorage.getItem('product'));
        }

        return product
    }

    static addSupply(supply){
        const product = Store.getSupplies();
        product.push(supply)
        localStorage.setItem('product', JSON.stringify(product))
    }

    static removeSupply(title){
        const product = Store.getSupplies();

        product.forEach((sup, index) => {
            if(sup.title === title){
                product.splice(index, 1);
            }
        })

        localStorage.setItem('product', JSON.stringify(product));
    }
}

// Event: Display Books
document.addEventListener('DOMContentLoaded',UI.displayProduct)

// Event: Add a Book
document.querySelector('#supply-form').addEventListener('submit',(e) =>
{
    // prevent actualy submit
    e.preventDefault
    //Get form values
    const title = document.querySelector('#title').value;
    const name = document.querySelector('#name').value;
    const price = document.querySelector('#price').value;

    // Validate
    if(title === '' || name === '' || price === ''){
        UI.showAlert('Please fill in all fields','danger');
    }
    else{
        
    // Instantiate supply
    const product = new Supply(title,name,price);

    // Add supply to UI
    UI.addSupplyToList(product)

    // Add supply to store
    Store.addSupply(product)

    //show success message
    UI.showAlert('Product added!','success')

    // Clear fields
    UI.clearFields()
    }
})

//Event: Remove a Book
document.querySelector('#supply-list').addEventListener('click', (e) =>{
    
    //Remove supply from UI
    UI.deleteSupply(e.target);

    // Remove supply from store
    Store.removeSupply(e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.textContent)
    //show remove message
    UI.showAlert('Product removed!','success')
})