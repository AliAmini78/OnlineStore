<?php

// name space
namespace Helper;

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
        $PrepareData = substr_replace($PrepareData,"", -1);
        return $PrepareData;
    }

    public static function recursiveFunction($data)
    {
        //dd($data);
        $array=[];
        foreach ($data as  $value) {
            foreach ($data as $item) {
                if ($item['parent_comment'] ==   $value['id']) {
                    $array[] = [$value , $item];
                }
            }
        }
        dd($array);
        
    }
}
