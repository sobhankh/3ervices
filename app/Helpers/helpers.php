<?php

use Carbon\Carbon;

/**

 * Write code on Method

 *

 * @return response()

 */

function adminFile($file){
    return asset('admin/'.$file);
}

function varParams($var,$prams)
{
    $varArray = explode(" ",$var);
    $Index = [];

    foreach ($varArray as $ikey => $item)
    {
        if (substr($item,0,1) == "{" and substr($item,-1) == "}")
        {
            $varArray[$ikey] = trim(str_replace(['{' ,'}']," ",$item));
            foreach ($prams as $String => $pram)
            {
                if ($String == $varArray[$ikey])
                {
                    $varArray[$ikey] = $pram;
                }
            }
        }
    }

    return implode(" ",$varArray);
}

function img($param){
    if (!empty($param)){
        if (file_exists($param)) return url($param);
        return url("1346258991_IMG_london1.jpg");
    }else{
        return url("1346258991_IMG_london1.jpg");
    }
}


/**

 * Write code on Method

 *

 * @return response()

 */

if (! function_exists('convertYdmToMdy')) {

    function convertYdmToMdy($date)

    {

        return Carbon::createFromFormat('Y-d-m', $date)->format('m-d-Y');

    }

}
