<div class="panel panel-default">
    <div class="panel-body">
        <div class="alert alert-dismissable alert-success">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <strong>Entrada al panel de administración</strong>
        </div>

        <div class="well bs-component">
            <?php 
            echo Form::open(array('url' => 'admin/login')); 
            ?>
            <div class="form-group">
                <?php
                echo Form::label('login', 'Login:'); 
                echo Form::text('login', $value = null, array( 'placeholder' => 'Escribe tu login...',  'class' => 'form-control')); 
                ?>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('password', 'Password:'); 
                echo Form::password('password', array( 'placeholder' => 'Escribe tu password...',  'class' => 'form-control')); 
                ?>
            </div>
            <?php 
            echo Form::submit('Entrar', array('class' => 'btn btn-primary btn-lg btn-block')); 
            echo Form::close(); ?>
        </div>     
    </div>
</div>
<script>
    $(function(){
        $('ul#my-order').hide();      
    });
</script>