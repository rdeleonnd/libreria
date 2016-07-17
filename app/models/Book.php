<?php

class Book extends Eloquent {
    
   /**
     * The database connection.
     *
     * @var string
     */
    public $connection = 'mysql';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'books';

}
