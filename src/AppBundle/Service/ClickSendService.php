<?php
/**
 * Created by PhpStorm.
 * User: thaipham
 * Date: 6/04/15
 * Time: 1:09 PM
 */

namespace AppBundle\Service;

use AppBundle\Exception\SmsDeliveryException;
use AppBundle\Interfaces\SmsServiceInterface;
use AppBundle\Lib\ClickSend\ClickSend;
use AppBundle\Lib\ClickSend\ClickSendSMS;

class ClickSendService implements SmsServiceInterface {
    protected $username;
    protected $apiKey;

    public function __construct($username, $apiKey) {
        $this->username = $username;
        $this->apiKey = $apiKey;
    }

    public function sendSms($to, $content) {
        $client = new ClickSend($this->username, $this->apiKey);

        $clickSendSms = new ClickSendSMS();
        $clickSendSms->setTo($to);
        $clickSendSms->setMessage($content);

        $response = $client->send_sms($clickSendSms);

        if ($response->recipientcount != 1) {
            throw new SmsDeliveryException('ClickSend returned ' . $response->recipientcount . ' result(s)');
        }

        $responseMessage = $response->messages[0];
        if ($responseMessage->result != '0000') {
            throw new SmsDeliveryException('ClickSend returned error: ' . $responseMessage->errordescription);
        }

        return $responseMessage->messageid;
    }
} 