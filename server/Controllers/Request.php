<?php
namespace Server\Controllers;

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

        return $result;
    }


    /**
     * Parse the request to redirect in the right action
     *
     * @param string $className
     * @param object $class
     *
     * @return string
     */
    protected function parseRequest($className, $class)
    {
        if ($this->request[$className] == 'all') {
            return $this->loadAll();
        }
        if ($this->request[$className] == 'insert') {
            return $this->insert();
        }
        if ($this->request[$className] == 'search') {
            $search = $this->request['search'];
            if (!empty($search)) {
                var_dump($this->search($search));die;
                return $this->search($search);
            }
            return $this->loadAll();
        }
        return $this->loadById($this->request[$className]);
    }

    protected function setDataFromObject($json, $mapping, $object)
    {
        $newObject = clone($object);

        foreach ($mapping as $key => $value) {
            if (!empty($json->$key)) {
                call_user_func(array($newObject, 'set' . ucfirst($value)), $json->$key);
            }
        }

        return $newObject;
    }

    protected function setDataFromArray($array, $object)
    {
        foreach ($array as $key => $value) {
            if (method_exists($object, 'set' . ucfirst($key))) {
                call_user_func(array($object, 'set' . ucfirst($key)), $value);
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

    protected function setCollectionFromJson($json, $mapping, $object)
    {
        $collection = array();

        $hits = json_decode($json)->hits->hits;

        $i = 0;
        foreach ($hits as $element) {
            array_push($collection, $this->setDataFromObject($element->_source, $mapping, $object));
            $collection[$i]->setId($element->_id);
            $i++;
        }

        return $collection;
    }
}