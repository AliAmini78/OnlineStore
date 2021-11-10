<?php 
//name space
namespace Data\Construct;


interface ScoreInterface{

    // is user like product ?
    public function isUserScored( $data);

    // get score by product
    public function getByProduct($productId);

    // delete score be product
    public function deleteByProduct($productId);
}