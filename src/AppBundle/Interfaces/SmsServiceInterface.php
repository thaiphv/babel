<?php
/**
 * Created by PhpStorm.
 * User: thaipham
 * Date: 6/04/15
 * Time: 1:09 PM
 */

namespace AppBundle\Interfaces;

interface SmsServiceInterface {
    public function sendSms($to, $content);
}