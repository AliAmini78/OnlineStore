<?php 
//name space
namespace Data\Construct;


interface CommentInterface
{

    // get all comment of a single product
    public function getByProduct($productId);

    // get comment of single product with parent & child grouping
    public function groupCommentsByParentComment($productId);

    // delete all comment of a single product
    public function deleteCommentsByProduct($productId);
}