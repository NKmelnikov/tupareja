<?php

namespace Service;

use Helper\CustomHelper;
use Repository\LadiesRepository;
use wpdb;

class LadiesApplicationClient
{
    private $ladiesRepository;

    public function __construct()
    {
        require_once '../Repository/LadiesRepository.php';
        $this->ladiesRepository = new LadiesRepository();
    }

    public function ladiesAction($post)
    {
        $post = $this->validatePost($post);
        $first_key = key($post);

        if($first_key === 'error'){
            return ['error' => $post['error']];
        }

        $this->ladiesRepository->insertLadiesApplication($post);
        return ['success' => 'Ваша анкета была успешно подана, после подтверждения модератором, она появится на сайте.'];
    }

    private function validatePost($post)
    {
        require_once '../Helper/CustomHelper.php';
        $post =  [
            'name' => CustomHelper::sanitiseText($post['la1-name']),
            'date_of_birth' => CustomHelper::sanitiseText($post['la1-dateOfBirth']),
            'email' => sanitize_email($post['la1-email']),
            'phone' => CustomHelper::sanitiseText($post['la1-phone']),
            'family_status' => CustomHelper::sanitiseText($post['la1-familyStatus']),
            'kids' => CustomHelper::sanitiseText($post['la1-kids']),
            'height' => CustomHelper::sanitiseText($post['la1-height']),
            'weight' => CustomHelper::sanitiseText($post['la1-weight']),
            'eye_color' => CustomHelper::sanitiseText($post['la1-eyeColor']),
            'languages' => CustomHelper::sanitiseText($post['la1-languages']),
            'profession' => CustomHelper::sanitiseText($post['la1-profession']),
            'town' => CustomHelper::sanitiseText($post['la1-town']),
            'country' => CustomHelper::sanitiseText($post['la1-country']),
            'about' => CustomHelper::sanitiseText($post['la1-about']),
            'smoking' => CustomHelper::sanitiseText($post['la1-smoking']),
            'man_wish_age' => CustomHelper::sanitiseText($post['la1-man-wish-age']),
            'wishes_to_man' => CustomHelper::sanitiseText($post['la1-wishes-to-man']),
            'video_link' => esc_url($post['la1-video-link']),
            'path_to_images' => CustomHelper::sanitiseText($post['la1-path-to-images']),
            'main_image_path' => CustomHelper::sanitiseText($post['la1-main-image-path'])
        ];

        $emailExist = $this->ladiesRepository->checkExistence('email', $post['email']);
        $phoneExist = $this->ladiesRepository->checkExistence('phone', $post['phone']);
        $validateCaptcha = $this->validReCaptcha();

        switch (true){
            case $emailExist:
                return  ['error' => 'this Email is already taken'];
                break;
            case $phoneExist:
                return  ['error' => 'this Phone is already taken'];
                break;
            case !$validateCaptcha->success:
                return  ['error' => 'captcha is not checked'];
                break;
        }

        return $post;
    }

    private function validReCaptcha(){
            //your site secret key
            $secret = '6LdRaDMUAAAAAB9iSSvcB1Sp73Uk3-KtmRBZr6un';
            //get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            return json_decode($verifyResponse);
    }

}
