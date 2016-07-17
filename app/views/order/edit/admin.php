<ul class="breadcrumb">
    <li><a href="order/index">Pedidos</a></li>
    <li class="active">Editar</li>
</ul>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="alert alert-dismissable alert-success">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <strong>Modifica los datos de este pedido:</strong>
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
            echo Form::open(array('url' => 'order/edit/' . $order->id)); ?>
            <div class="form-group">
                <?php
                echo Form::label('name', 'Nombre y apellidos del cliente:'); 
                echo Form::text('name', $order->name, array('placeholder' => 'Escribe aquí el nombre y los apellidos del cliente...', 'class' => 'form-control')); 
                ?>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('email', 'Email:'); 
                echo Form::text('email', $order->email, array('placeholder' => 'Escribe aquí el email del cliente...', 'class' => 'form-control')); 
                ?>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('tel', 'Teléfono:'); 
                echo Form::text('tel', $order->tel, array('placeholder' => 'Escribe aquí el teléfono del cliente...', 'class' => 'form-control')); 
                ?>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('address', 'Dirección:'); 
                echo Form::text('address', $order->address, array('placeholder' => 'Escribe aquí la dirección del cliente...', 'class' => 'form-control')); 
                ?>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('description', 'Descripción del pedido:'); 
                echo Form::textarea('description', $order->description, array('class' => 'form-control')); 
                ?>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('price', 'Precio total:'); 
                echo Form::text('price', $order->price, array('placeholder' => 'Escribe aquí el precio total del pedido...', 'class' => 'form-control')); 
                ?>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('payment', 'Forma de pago:'); 
                echo Form::select('payment', array('PayPal' => 'PayPal', 'Tarjeta' => 'Tarjeta', 'Contra reembolso' => 'Contra reembolso'), $order->payment, array('class' => 'form-control'));
                ?>
            </div>       
            <div class="form-group">
                <?php
                echo Form::label('status', 'Estado:'); 
                echo Form::select('status', array('0' => 'Pendiente', '1' => 'Servido'), $order->status, array('class' => 'form-control'));
                ?>
            </div>
            <?php 
            echo Form::submit('Guardar los cambios', array('id' => 'btn-save-changes', 'class' => 'btn btn-primary btn-lg btn-block')); 
            echo Form::close(); ?>
        </div>        
    </div>
</div>