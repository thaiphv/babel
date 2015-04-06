<?php
/**
 * Created by PhpStorm.
 * User: thaipham
 * Date: 5/04/15
 * Time: 3:17 PM
 */

namespace AppBundle\Controller\Api\V1;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class PersonController extends BaseApiController {

    /**
     * @Route(
     *      "/v1/person.{_format}",
     *      name="api_v1_person_register",
     *      requirements={
     *          "_format": "json",
     *      }
     * )
     * @Method({"POST"})
     * @param Request $request
     * @return Response
     */
    public function registerPersonAction(Request $request) {
        $jsonRequest = $this->getJsonRequestObject($request);
        $mobileNumber = $jsonRequest->get('mobile');
        $email = $jsonRequest->getSafe('email');
        $countryCode = $jsonRequest->getSafe('country_code', 'AU');

        $activationCode = rand(100000, 999999);
        $activationExpires = new \DateTime();
        $activationExpires->modify('+5 minutes');

        $personRepo = $this->getDoctrine()->getRepository('AppBundle:Person');
        $personRepo->createSimplePerson($mobileNumber, $email, $countryCode, $activationCode, $activationExpires);

        $this->get('messaging_service')->sendSms($mobileNumber, 'Activation code: ' . $activationCode);

        return $this->createSuccessResponse('Activation code has been SMS to you.', null);
    }
}