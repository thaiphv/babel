<?php

namespace AppBundle\Lib;


use AppBundle\Exception\ApiErrorException;
use Symfony\Component\HttpFoundation\Request;

class ApiJsonRequest {
    private $data;

    public function __construct(Request $request){
        $requestArray = json_decode($request->getContent(), true);
        if (count($requestArray) == 0)
            throw new ApiErrorException(400, 'Invalid request content');

        $this->data = $requestArray;
    }

    public function getSafe($name, $default = null){
        if(!isset($this->data[$name]))
            return $default;

        return $this->data[$name];
    }

    public function get($name){
        if(!isset($this->data[$name]))
            throw new ApiErrorException(400, "Missing {$name} request parameter");

        return $this->data[$name];
    }
}