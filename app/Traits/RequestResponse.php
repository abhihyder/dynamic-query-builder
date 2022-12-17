<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait RequestResponse
{

    public $status_code = Response::HTTP_OK;


    public function getStatusCode()
    {
        return $this->status_code;
    }


    public function setStatusCode($status_code)
    {
        $this->status_code = $status_code;

        return $this;
    }


    public function requestResponse($data, $header = [])
    {
        return response()->json($data, $this->getStatusCode(), $header);
    }

    public function responseWithData($data, $message = null)
    {
        return $this->requestResponse([
            'status' => 'success',
            'data' => $data,
            'message' => $message,

        ]);
    }

    public function responseWithError($message)
    {
        return $this->requestResponse([
            'status' => 'error',
            'message' => $message,
        ]);
    }

    public function respondBadRequest($message)
    {
        return $this->setStatusCode(Response::HTTP_BAD_REQUEST)->requestResponse([
            'status' => 'error',
            'message' => $message,
        ]);
    }

    public function responseNotFound($message = 'Not found!')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->responseWithError($message);
    }


    public function responseInternalError($message = 'Internal server error!')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->responseWithError($message);
    }


    public function responseCreated($message, $data = null)
    {
        return $this->setStatusCode(Response::HTTP_CREATED)->requestResponse([

            'status' => 'success',
            'data' => $data,
            'message' => $message,
        ]);
    }

    public function responseSuccess($message)
    {
        return $this->requestResponse([

            'status' => 'success',
            'message' => $message,
        ]);
    }

    public function responseDeleted($message)
    {
        return $this->requestResponse([
            'status' => 'success',
            'message' => $message,
        ]);
    }

    public function responseInvalidRequest($message = 'Sorry! Required field is missing')
    {
        return $this->setStatusCode(Response::HTTP_FORBIDDEN)->responseWithError($message);
    }
}
