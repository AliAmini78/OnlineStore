<?php 

//name space
namespace Data\Repository;

//usage package
use Data\Construct\ProductCartInterface;

class ProductRepository extends BaseRepository implements ProductCartInterface
{
    //table name
    protected $table = 'product_cart';
}