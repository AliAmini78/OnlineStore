<?php 
//name space
namespace Data\Construct;


interface CommentInterface
{
    public function getByProduct($productId);
    public function getByUser($productId);
}