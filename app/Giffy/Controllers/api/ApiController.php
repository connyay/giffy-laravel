<?php

class ApiController extends BaseController {

    private $content_type = 'application/json';

    protected function response($dataKey, $data, $status)
    {
        switch ($this->content_type)
        {
            case 'application/json':
            return Response::json(array("status"=>$status, $dataKey=>$data));
            break;

            case 'application/xml':
            return Response::make(to_xml($data));
            break;
        }
    }
}