<ul class="breadcrumb">
    <li><a href="user/edit">Mi cuenta</a></li>
    <li class="active">Configuración</li>
</ul>
<?php
if(isset($message))
{ ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="alert alert-dismissable alert-success">                
                <p><strong><?php echo $message['main']; ?></strong></p>                
                <p><a href="book/index">Aceptar</a></p>
            </div>
        </div>
    </div>    
<?php
}
else 
{ ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="alert alert-dismissable alert-success">
                <button data-dismiss="alert" class="close" type="button">×</button>
                <strong>Modifica los datos de tu cuenta:</strong>
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
                echo Form::open(array('url' => 'user/edit')); ?>
                <div class="form-group">
                    <?php
                    echo Form::label('new_password', 'Contraseña nueva:'); 
                    echo Form::password('new_password', array( 'placeholder' => 'Escribe tu contraseña nueva...',  'class' => 'form-control')); 
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo Form::label('new_password_confirmation', 'Vuelve a escribir tu contraseña nueva:'); 
                    echo Form::password('new_password_confirmation', array( 'placeholder' => 'Vuelve a escribir tu contraseña nueva...',  'class' => 'form-control')); 
                    ?>
                </div>
                <?php 
                echo Form::submit('Guardar los cambios', array('class' => 'btn btn-primary btn-lg btn-block')); 
                echo Form::close(); ?>
            </div>        
        </div>
    </div>
<?php
} ?>