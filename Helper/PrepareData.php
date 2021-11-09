<?php

// name space
namespace Helper;


//usage package
use Helper\SessionManager;

/**
 * class for prepare the data for database 
 */
class PrepareData
{

    /**
     * prepare  data for insert to db
     *
     * @param array $data = user data array
     * @return array 
     */
    public static function insertToDb(array $data)
    {
        $DataArray = [];
        $fields = join(",", array_keys($data));
        $DataArray['fields'] = $fields;
        $params = join(",", array_map(fn ($item) => ":$item", array_keys($data)));
        $DataArray['params'] = $params;
        return $DataArray;
    }

    /**
     * prepare  data for update to db
     *
     * @param array $data = user data array
     * @return array 
     */
    public static function updateToDb(array $data)
    {
        $PrepareData = "";

        foreach ($data as $key => $value) {
            $PrepareData .= " {$key}=:{$key},";
        }
        //remove last char(,)
        $PrepareData = substr_replace($PrepareData, "", -1);
        return $PrepareData;
    }

    /**
     * recursive function for comment
     *
     * @param [array] $data = array of child comments
     * @return void 
     */
    public static function recursiveFunction($data)
    {
        $array = [];
        foreach ($data as  $value) {
            foreach ($data as $item) {
                if ($item['parent_comment'] ==   $value['id']) {
                    $array[] = [$value, $item];
                }
            }
        }
    }



    public static function addDataForCartSession($product)
    {

        //the progress result
        $result = false;
        //product id
        $productId = $product['id'];
        // set the cart session
        $cart = SessionManager::CartSession();
        

        //condition for isset product in cart ?
        if (isset($cart[$productId])) {
            $_SESSION['cart'][$productId]['count'] += 1;
            $_SESSION['cart'][$productId]['sum'] = $_SESSION['cart'][$productId]['count'] * $product['price'];
        } else {
            $_SESSION['cart'][$productId] =[
                'product_id' => $productId,
                'price' => $product['price'],
                'count' => 1 ,
                'sum' => $product['price'],
            ];
        }
        
    }
}
