<ul class="breadcrumb">
    <li class="active">Pedidos</li>
</ul>
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Descripción</th>
                    <th class="text-right">Precio</th>
                    <th class="text-center">Pago</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($orders as $order)
                    { ?>
                        <tr>
                            <td><?php echo $order->id; ?></td>
                            <td><?php echo $order->name; ?></td>
                            <td><?php echo $order->tel; ?></td>
                            <td><?php echo $order->email; ?></td>
                            <td><?php echo $order->address; ?></td>
                            <td><?php echo $order->description; ?></td>                    
                            <td class="text-right"><?php echo $order->price; ?> $</td>
                            <td class="text-center"><?php echo $order->payment; ?></td>
                            <td class="text-center">
                                <?php 
                                if (!(bool)$order->status) { ?>
                                    Pendiente 
                                <?php
                                } else { ?>
                                    Servido
                                <?php } ?>
                            </td>
                            <td class="text-center"><a title="Editar" href="order/edit/<?php echo $order->id; ?>">Editar</a> | <a class="delete" title="Borrar" href="order/delete/<?php echo $order->id; ?>">Borrar</a></td>
                        </tr>
                    <?php 
                    } ?>
            </tbody>
        </table>        
    </div>
</div>