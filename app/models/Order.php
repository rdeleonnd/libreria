<?php

class Order extends Eloquent {

    public $connection = 'mysql';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

}
