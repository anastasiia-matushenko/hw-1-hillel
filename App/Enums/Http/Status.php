<?php

namespace App\Enums\Http;

//enum Status: int
//{
//    case OK = 200;
//    case CREATED = 201;
//    case BAD_REQUEST = 400;
//    case UNAUTHORIZED = 401;
//    case FORBIDDEN = 403;
//    case NOT_FOUND = 404;
//    case METHOD_NOT_ALLOWED = 405;
//    case UNPROCESSABLE_ENTITY = 422;
//    case INTERNAL_SERVER_ERROR = 500;
//
//    public function withDescription()
//    {
//        $description = match ($this->value) {
//            200 => 'OK',
//            201 => 'CREATED',
//            400 => 'Bad Request',
//            401 => 'Unauthorized',
//            403 => 'Forbidden',
//            404 => 'Not Found',
//            405 => 'Method not allowed',
//            422 => 'Unprocessable Entity',
//            500 => 'Internal Server Error',
//        };
//        return [
//            'code' => $this->value,
//            'status' => $this->value . ' ' . $description
//        ];
//    }
//}

enum Status: int {

    case OK = 200;
    case CREATED = 201;
    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case METHOD_NOT_ALLOWED = 405;
    case UNPROCESSABLE_ENTITY = 422;
    case INTERNAL_SERVER_ERROR = 500;
    case BAD_GATEWAY = 502;

    public function description()
    {
        $description = match($this) {
            self::OK => 'OK',
            self::CREATED => 'CREATED',
            self::BAD_REQUEST => 'Bad Request',
            self::UNAUTHORIZED => 'Unauthorized',
            self::FORBIDDEN => 'Forbidden',
            self::NOT_FOUND => 'Not Found',
            self::METHOD_NOT_ALLOWED => 'Method Not Allowed',
            self::INTERNAL_SERVER_ERROR => 'Internal Server Error',
            self::BAD_GATEWAY => 'Bad Gateway',
        };
        return [
            'code' => $this->value,
            'description' => $this->value. ' ' . $description,
        ];
    }
}

