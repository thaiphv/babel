<?php

namespace AppBundle\Controller\Api\V1;

use AppBundle\Controller\Api\ApiControllerInterface;
use AppBundle\Exception\ApiErrorException;
use AppBundle\Lib\ApiJsonRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BaseApiController extends Controller implements ApiControllerInterface
{
    const CONTENT_TYPE_API_JSON = 'application/vnd.api+json';

    protected function validateContentType(Request $request) {
        if ($request->getContentType() != self::CONTENT_TYPE_API_JSON) {
            $this->createErrorResponseException('Unsupported content type: ' . $request->getContentType());
        }
    }

    protected function createErrorResponseException($message, $statusCode=400) {
        return new ApiErrorException($statusCode, $message);
    }

    protected function getJsonRequestObject(Request $request){
        return new ApiJsonRequest($request);
    }

    protected function createSuccessResponse($message, $data, $statusCode=200) {
        $result = array(
            'status' => $statusCode,
            'response_message' => $message,
            'data' => $data
        );
        return new JsonResponse($result, $statusCode, array(
            'Content-Type' => 'application/vnd.api+json'
        ));
    }
}
