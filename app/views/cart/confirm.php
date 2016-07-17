<ul class="breadcrumb">
    <li><a href="book/index">Libros disponibles</a></li>
    <li class="active">Pagar mi pedido</li>
</ul>
<?php
if(isset($message))
{ ?>   
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="alert alert-dismissable alert-success">                
                <p><strong><?php echo $message['main']; ?></strong></p>
                <p><?php echo $message['secondary']; ?></p>
                <p><a href="book/index">Aceptar</a></p>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('ul#my-order').hide();  
            $.removeCookie('cart', { path: '/' });      
        });
    </script>
<?php
}
else 
{?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="alert alert-dismissable alert-success">
                <button data-dismiss="alert" class="close" type="button">×</button>
                <strong>1. Comprueba los datos de tu pedido:</strong>
            </div>
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Título</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody id="confirm-cart">
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="alert alert-dismissable alert-success">
                <button data-dismiss="alert" class="close" type="button">×</button>
                <strong>2. A continuación rellena tus datos en el siguiente formulario:</strong>
            </div>
            <?php
            $htmlErrors = HTML::ul($errors->all());
            if(!empty($htmlErrors))
            { ?>
                <div class="alert alert-dismissable alert-warning">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4>Por favor, revisa los siguientes campos del formulario:</h4>
                    <?php echo $htmlErrors; ?>
                </div>
                <?php
            } ?>
            <div class="well bs-component">
                <?php 
                echo Form::open(array('url' => 'cart/confirm')); 
                ?>
                <div class="form-group">
                    <?php
                    echo Form::label('name', 'Nombre y apellidos:'); 
                    echo Form::text('name', $value = null, array( 'placeholder' => 'Escribe tu nombre y apellidos...',  'class' => 'form-control')); 
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo Form::label('email', 'Email:'); 
                    echo Form::email('email', $value = null, array( 'placeholder' => 'Escribe tu dirección de correo electrónico...',  'class' => 'form-control')); 
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo Form::label('tel', 'Teléfono:'); 
                    echo Form::text('tel', $value = null, array( 'placeholder' => 'Escribe un número de teléfono válido...',  'class' => 'form-control')); 
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo Form::label('address', 'Dirección:'); 
                    echo Form::text('address', $value = null, array( 'placeholder' => 'Escribe tu dirección...',  'class' => 'form-control')); 
                    ?>
                </div>
            </div>
        </div>
    </div>                  
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="alert alert-dismissable alert-success">
                <button data-dismiss="alert" class="close" type="button">×</button>
                <strong>3. Finalmente selecciona una forma de pago:</strong>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('payment', 'Forma de pago:'); 
                echo Form::select('payment', array('PayPal' => 'PayPal', 'Tarjeta' => 'Tarjeta', 'Contra reembolso' => 'Contra reembolso'), 'PayPal', array('class' => 'form-control'));
                ?>
            </div>        
            <?php 
            echo Form::hidden('cart', null, array('id' => 'cart'));
            echo Form::submit('¡Pagar mi pedido ahora!', array('class' => 'btn btn-primary btn-lg btn-block')); 
            echo Form::close(); ?>    
        </div>
    </div>                  
    <script>
        $(function(){
            var cart = JSON.parse($.cookie('cart'));
            $('ul#my-order').hide();        
            // Let's fill the HTML table with the shopping cart data.        
            $.each(cart.data.items, function(key, value) {
                $('tbody#confirm-cart').append('<tr><td>' + value.isbn + '</td><td>' + value.title + '</td><td>' + value.price + ' $</td></tr>');
            }); 
            $('tbody#confirm-cart').append('<tr><td></td><td class="text-right"><b>Total</b></td><td><b>' + cart.data.price + ' $</b></td></tr>');
            // And append the shopping cart in JSON format to the hidden input.        
            $('input#cart').val($.cookie('cart'));       
        });
    </script>
<?php } ?>