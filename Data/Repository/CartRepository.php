<?php 
//name space
namespace Data\Repository;


// usage interface
use Data\Construct\CartInterface;

class  CartRepository extends BaseRepository implements CartInterface
{
    //table name
    protected $table = 'cart';
}