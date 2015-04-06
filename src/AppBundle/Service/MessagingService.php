<?php
/**
 * Created by PhpStorm.
 * User: thaipham
 * Date: 6/04/15
 * Time: 1:02 PM
 */

namespace AppBundle\Service;


use AppBundle\Interfaces\SmsServiceInterface;

class MessagingService {
    protected $smsService;

    public function __construct(SmsServiceInterface $smsService) {
        $this->smsService = $smsService;
    }

    public function sendSms($to, $content) {
        return $this->smsService->sendSms($to, $content);
    }
} 