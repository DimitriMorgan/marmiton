<?php
namespace Server\Controllers;

use Server\Entities\Recipe;

abstract class Request
{
    const BASE_URL = "http://localhost:9200/";
    const DATABASE = "luto/";

    protected function curlCall($query, $url, $delete = false)
    {
        //  Initiate curl
        $ch = curl_init();

        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if (!empty($query)) {
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $query);
        }

        if ($delete) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        }

        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);

        $result = curl_exec($ch);
        curl_close($ch);

        var_dump($result);die;
        return $result;
    }


    /**
     * Parse the request to redirect in the right action
     *
     * @return string
     */
    protected function parseRequest()
    {
        if ($this->request == 'all') {
            return $this->loadAll();
        }
        return $this->loadById($this->request);
    }

    protected function setDataFromJson($json, $mapping, $object)
    {
        $arrayKeys = $this->array_keys_recursive(json_decode($json));

        foreach ($arrayKeys as $key) {

            if (key)
            if (method_exists($object, $key)) {
                call_user_func(array($object, 'set' . ucfirst($key)));
            }
        }

        return $object;
    }

    protected function array_keys_recursive($myArray, $MAXDEPTH = INF, $depth = 0, $arrayKeys = array()){
        if($depth < $MAXDEPTH){
            $depth++;
            $keys = array_keys($myArray);
            foreach($keys as $key){
                if(is_array($myArray[$key])){
                    $arrayKeys[$key] = array_keys_recursive($myArray[$key], $MAXDEPTH, $depth);
                }
            }
        }

        return $arrayKeys;
    }
}