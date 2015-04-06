<?php

namespace AppBundle\Listener;


use AppBundle\Controller\Api\ApiControllerInterface;
use AppBundle\Exception\ApiErrorException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class ApiAuthListener {
    protected $apiKeys;

    public function __construct(array $apiKeys) {
        $this->apiKeys = $apiKeys;
    }

    public function onKernelController(FilterControllerEvent $event) {
        $controllers = $event->getController();

        if (!is_array($controllers)) {
            return;
        }

        if ($controllers[0] instanceof ApiControllerInterface) {
            $request = $event->getRequest();

            $apiKey = $request->query->get('api_key');
            if (!$apiKey) {
                throw new ApiErrorException(400, 'Missing api_key query parameter');
            }

            if (!in_array($apiKey, $this->apiKeys)) {
                throw new ApiErrorException(400, 'Invalid api_key');
            }
        }
    }
}