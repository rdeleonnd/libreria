<ul class="breadcrumb">
    <li class="active">Libros disponibles</li>
</ul>
<div class="panel panel-default">
    <div class="panel-body">        
        <div class="page-header">
            <h4 id="forms"><a href="book/create">+ Nuevo libro</a></h4>
        </div>
        <table class="table table-striped table-hover chachi-table">
            <col class="width-20">
            <col class="width-50">
            <col class="width-15">
            <col class="width-10">
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
                        <?php 
                        if (empty($book->title)) 
                        { ?> 
                            <td colspan=3 class="text-center">                                    
                                <div class="alert alert-dismissable alert-warning">
                                    <img src="assets/img/warning-icon.png" alt="Edita el libro" />
                                    <h4>Acabas de crear este libro nuevo. ¡Ahora está vacío! Por favor, edtítalo y guárdalo a continuación.</h4>                                        
                                </div>
                            </td>
                        <?php
                        }
                        else 
                        { ?>
                            <td class="text-center">
                                <h3><?php echo $book->title; ?></h3>
                                <img class="book-index" src="assets/img/uploads/<?php echo $book->image; ?>" alt="<?php echo $book->title; ?>">
                                <h4><?php echo $book->author; ?></h4>
                            </td>
                            <td><?php echo $book->sinopsis; ?></td> 
                            <td class="text-right"><h3><?php echo $book->price; ?> $</h3></td>                            
                       <?php
                        }
                       ?>
                       <td><a title="Editar" href="book/edit/<?php echo $book->id; ?>">Editar</a> | <a class="delete" title="Borrar" href="book/delete/<?php echo $book->id; ?>">Borrar</a></td>     
                    </tr>
                <?php 
                } ?>
            </tbody>
        </table>    
    </div>
</div>