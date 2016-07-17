
function Cart(init) {    
    this.data = {
        'url': init.url,
        'items': [],
        'price': 0,
        'counter': 0
    };
}

/**
 * Sets the shopping cart data.
 * 
 * @param {object} data
 * @returns {Cart}
 */
Cart.prototype.setData = function(data) {
    this.data = data;
    return this;    
};

/**
 * Adds an item to the shopping cart.
 * 
 * @param {object} item 
 * @returns {Cart}
 */
Cart.prototype.addItem = function(item) {
    this.data.items.push(item);
    this.data.counter++;   
    this.data.price = this.calcPrice();
    return this;
};

/**
 * Removes an item from the shopping cart.
 * 
 * @param {int} index - This is a number to identify an element, something like a stack pointer
 * @returns {Cart}
 */
Cart.prototype.removeItem = function(index) {
    for (var i = 0; i < this.data.items.length; i++) {
        index == this.data.items[i].index ? this.data.items.splice(i, 1) : false;
    }
    this.data.price = this.calcPrice();
    return this;
};

/**
 * Calculates the total price of the order.
 * 
 * @returns {Float}
 */
Cart.prototype.calcPrice = function() {    
    var price = 0;
    $.each(this.data.items, function(key, value) {
        price += value.price;
    });    
    return price.toFixed(2);
};

/**
 * Prints the shopping cart into the given div.
 * 
 * @param {String} div - For example, #my-order-items
 * @returns void
 */
Cart.prototype.printHTML = function(div) {

    $(div).empty();

    $.each(this.data.items, function(key, value) {
        $(div).append('<li><a href="#">' + value.title + ' = ' + value.price + ' €</a></li>')
            .append('<li><a class="remove" data-index=' + value.index + ' href="#">Borrar</a></li>')
            .append('<li class="divider"></li>');
    });

    $(div).append('<li><a href="#">Total: <b>' + this.data.price + ' €</b></a></li>');
    
    if(this.data.items.length > 0) {
        $(div).append('<li class="divider"></li>').append('<li><a id="pay-now" href="' + this.data.url + '">¡Pagar mi pedido ahora!</a></li>');
    }    

};