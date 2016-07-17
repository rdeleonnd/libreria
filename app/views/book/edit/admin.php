<ul class="breadcrumb">
    <li><a href="book/index">Libros disponibles</a></li>
    <li class="active">Editar</li>
</ul>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="alert alert-dismissable alert-success">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <strong>Modifica los datos de este libro:</strong>
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
            echo Form::open(array('url' => 'book/edit/' . $book->id, 'files' => true)); ?>
            <div class="form-group">
                <?php
                echo Form::label('isbn', 'ISBN:'); 
                echo Form::text('isbn', $book->isbn, array('placeholder' => 'Escribe aquí un ISBN válido...', 'class' => 'form-control')); 
                ?>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('title', 'Título:'); 
                echo Form::text('title', $book->title, array('placeholder' => 'Escribe aquí el título del libro...', 'class' => 'form-control')); 
                ?>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('friendly_url', 'Friendly URL:'); 
                echo Form::text('friendly_url', $book->friendly_url, array('placeholder' => 'Escribe aquí el URL friendly del título del libro...', 'class' => 'form-control')); 
                ?>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('author', 'Author:'); 
                echo Form::text('author', $book->author, array('placeholder' => 'Escribe aquí el autor del libro...', 'class' => 'form-control')); 
                ?>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('sinopsis', 'Sinopsis:'); 
                echo Form::textarea('sinopsis', $book->sinopsis, array('class' => 'form-control')); 
                ?>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('price', 'Precio:'); 
                echo Form::text('price', $book->price, array('placeholder' => 'Escribe aquí el precio del libro...', 'class' => 'form-control')); 
                ?>
            </div>
            <div class="form-group">
                <?php
                echo Form::label('image', 'Actualizar la imagen de este libro:'); 
                echo Form::file('image'); ?>
                <div class="text-center">
                    <img text-center src="assets/img/uploads/<?php echo $book->image; ?>" alt="<?php echo $book->title; ?>" />
                </div>
            </div>
            <?php 
            echo Form::submit('Guardar los cambios', array('class' => 'btn btn-primary btn-lg btn-block')); 
            echo Form::close(); ?>
        </div>        
    </div>
</div>