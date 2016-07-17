<ul class="breadcrumb">
    <li class="active">Libros disponibles</li>
</ul>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="alert alert-dismissable alert-success">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <strong>¡Bienvenid@ a Grandes Libros!, por favor selecciona los libros que desees y haz tu pedido:</strong>
        </div>
        <table class="table table-striped table-hover chachi-table">
            <col class="width-15">
            <col class="width-50">
            <col class="width-10">
            <col class="width-5">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($books as $book)
                    { ?>
                        <tr>
                            <td class="text-center">
                                <h3><a href="#"><?php echo $book->title; ?></a></h3>
                                <?php
                                if(isset($book->image)) 
                                { ?>
                                    <a href="#"><img class="book-index" src="assets/img/uploads/<?php echo $book->image; ?>" alt="<?php echo $book->title; ?>"></a>
                                <?php
                                } ?>
                                <h4><a href="#"><?php echo $book->author; ?></a></h4>
                            </td>
                            <td><?php echo $book->sinopsis; ?></td> 
                            <td class="text-right"><h3><?php echo $book->price; ?> $</h3></td>                            
                            <td><a class="buy-item rotate" title="¡Me lo llevo!" href="#" data-id="<?php echo $book->id; ?>" data-isbn="<?php echo $book->isbn; ?>" data-title="<?php echo $book->title; ?>" data-price="<?php echo $book->price; ?>"></a></td>
                        </tr>
                    <?php 
                    } ?>
            </tbody>
        </table>    
    </div>
</div>