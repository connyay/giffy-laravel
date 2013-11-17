<?php namespace Giffy\Controllers\Api;

use Auth;
use Illuminate\Support\Facades\Response;

class ApiController extends \Giffy\Controllers\BaseController {

    private $content_type = 'application/json';

    protected function response( $dataKey, $data, $status, $count = false ) {
        switch ( $this->content_type ) {
        case 'application/json':
            $responseArray = [];
            $responseArray["status"] = $status;
            if ( $count && is_array( $data ) ) {
                $responseArray["count"] = count( $data );
            }
            $responseArray[$dataKey] = $data;
            return Response::json( $responseArray  );
            break;

        case 'application/xml':
            return Response::make( to_xml( $data ) );
            break;
        }
    }

    protected function authorize( ) {
        if ( Auth::guest() ) {
            $message = $this->response( "message", "Login, yo!", 401 );
            $is = false;
        } else {
            $message = $this->response( "message", "Authorized.", 200 );
            $is = true;
        }
        return array( "is"=> $is, "message"=>$message );
    }
}
