
$(function(){      
            
    $('#add-book').modal({
        show: false,
        backdrop: 'static',
        keyboard: false
    }); 
            
    var cart = new Cart({'url': 'cart/confirm'});

    if(!$.isEmptyObject($.cookie('cart'))) {
        cart.setData(JSON.parse($.cookie('cart')).data).printHTML('#my-order-items');
    }
    else {
        var cart = new Cart({'url': 'cart/confirm'});
    }                
    
    $('a.buy-item').click(function(){
        var chachibook = {
            'index': cart.data.counter,
            'id': $(this).attr('data-id'),
            'isbn': $(this).attr('data-isbn'),
            'title': $(this).attr('data-title'),
            'price': parseFloat($(this).attr('data-price'))
        };
        cart.addItem(chachibook).printHTML('#my-order-items');
        $('#add-book-text').empty().append("Acabas de añadir: <br/><br/>" + chachibook.title + ", " + chachibook.price + " €");
        $('#add-book').modal('show');      
        return false;
    });
    
    $('#add-book-yes').click(function(){
        $('#add-book').modal('hide');
        return false;
    }); 

    $(document).on('click', 'a.remove', function(){
        cart.removeItem($(this).attr('data-index')).printHTML('#my-order-items');
        return false;

    });

    $(document).on('click', 'a#pay-now', function(){
        $.cookie('cart', JSON.stringify(cart), { expires: 7, path: '/' });                
        return true;
    });
            
});