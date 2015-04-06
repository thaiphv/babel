<?php

namespace AppBundle\Listener;


use AppBundle\Exception\ApiErrorException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ApiExceptionListener {
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        if(!($exception instanceof ApiErrorException))
            return;

        $data = array(
            'status' => $exception->getStatusCode(),
            'message' => $exception->getMessage(),
            'data' => null,
        );

        $response = new JsonResponse($data, $exception->getStatusCode(), array(
            'Content-Type' => 'application/vnd.api+json'
        ));
        $event->setResponse($response);
        $event->stopPropagation();
    }
}