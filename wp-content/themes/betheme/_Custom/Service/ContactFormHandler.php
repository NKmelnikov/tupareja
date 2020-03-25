<?php

namespace Service;

use Helper\CustomHelper;
use RuntimeException;

class ContactFormHandler
{
    private $helper;

    public function __construct()
    {
        require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
        require_once(ABSPATH . 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php');
        CustomHelper::build();
        $this->helper = CustomHelper::instance();
    }

    public function sendFormAction($post)
    {
        $post = $this->validateForm($post);
        $first_key = key($post);

        if ($first_key === 'error') {
            return ['error' => $post['error']];
        }

        $this->sendEmail($post);
        return ['success' => CustomHelper::getTranslationByLocale('cfh_contact_form_sent', $post['locale'])];
    }

    private function sendEmail($post)
    {
        $ch = curl_init();
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $this->helper->email_from(),
                        'Name' => $this->helper->email_from_name()
                    ],
                    'To' => [
                        [
                            'Email' => $this->helper->email_from(),
                            'Name' => $this->helper->email_from_name()
                        ]
                    ],
                    'Subject' => $post['subject'],
                    'TextPart' => "",
                    'HTMLPart' => "<h3>Name:". $post['name'] ."</h3><br><h3>From:". $post['email'] ."</h3><br><p>" . $post['message'] . "</p>",
                    'CustomID' => "AppGettingStartedTest"
                ]
            ]
        ];

        curl_setopt($ch, CURLOPT_URL, 'https://api.mailjet.com/v3.1/send');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_USERPWD, 'e7433eaf9351bdee0380d68017330711' . ':' . 'd7c2bc48072f2257b1247d12ef8d9202');

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new RuntimeException(curl_error($ch));
        }

        curl_close($ch);
    }

    private function validateForm($post)
    {
        require_once '../Helper/CustomHelper.php';
        $post = [
            'name' => CustomHelper::sanitiseText($post['name']),
            'email' => sanitize_email($post['email']),
            'subject' => CustomHelper::sanitiseText($post['subject']),
            'message' => CustomHelper::sanitiseText($post['message']),
            'locale' => CustomHelper::sanitiseText($post['locale']),
        ];

        $validateCaptcha = $this->validReCaptcha();
        if (!$validateCaptcha->success) {
            return ['error' => CustomHelper::getTranslationByLocale('cah_captcha_not_checked', $post['locale'])];
        }

        return $post;
    }

    private function validReCaptcha()
    {
        //your site secret key
        $secret = '6LdRaDMUAAAAAB9iSSvcB1Sp73Uk3-KtmRBZr6un';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        return json_decode($verifyResponse);
    }
}
