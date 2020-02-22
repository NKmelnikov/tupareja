<?php

namespace Service;

use Helper\CustomHelper;
use Repository\ClientRepository;
use wpdb;


class ClientApplicationHandler
{
    const TABLE_LADIES = 'wp_ladies';
    const TABLE_MEN = 'wp_men';

    private $clientRepository;

    public function __construct()
    {
        require_once '../Repository/ClientRepository.php';
        $this->clientRepository = new ClientRepository();
    }

    public function ladiesAction($post)
    {
        $post = $this->validatePostLadies($post);
        $first_key = key($post);

        if($first_key === 'error'){
            return ['error' => $post['error']];
        }

        $this->clientRepository->insertApplication(self::TABLE_LADIES, $post);
        return ['success' => 'Ваша анкета была успешно подана, после подтверждения модератором, она появится на сайте.'];
    }

    public function mensAction($post)
    {
        $post = $this->validatePostMen($post);
        $first_key = key($post);

        if($first_key === 'error'){
            return ['error' => $post['error']];
        }

        $this->clientRepository->insertApplication(self::TABLE_MEN, $post);
        return ['success' => 'Ваша анкета была успешно подана'];
    }

    private function validatePostLadies($post)
    {
        require_once '../Helper/CustomHelper.php';
        $post =  [
            'name' => CustomHelper::sanitiseText($post['la1-name']),
            'lname' => CustomHelper::sanitiseText($post['la1-lname']),
            'fname' => CustomHelper::sanitiseText($post['la1-fname']),
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
            'wishes_to_man' => CustomHelper::sanitiseText($post['la1-wishes-to-man']),
            'video_link' => CustomHelper::sanitiseText($post['video_link']),
            'path_to_images' => CustomHelper::sanitiseText($post['la1-path-to-images']),
            'main_image_path' => CustomHelper::sanitiseText($post['la1-main-image-path'])
        ];

        return ($this->existInDb($post, self::TABLE_LADIES))?: $post;
    }

    private function validatePostMen($post)
    {
        require_once '../Helper/CustomHelper.php';
        $post =  [
            'name' => CustomHelper::sanitiseText($post['ma1-name']),
            'date_of_birth' => CustomHelper::sanitiseText($post['ma1-dateOfBirth']),
            'email' => sanitize_email($post['ma1-email']),
            'phone' => CustomHelper::sanitiseText($post['ma1-phone']),
            'town' => CustomHelper::sanitiseText($post['ma1-town']),
            'country' => CustomHelper::sanitiseText($post['ma1-country']),
        ];

        return ($this->existInDb($post, self::TABLE_MEN))?: $post;
    }

    private function validReCaptcha(){
            //your site secret key
            $secret = '6LdRaDMUAAAAAB9iSSvcB1Sp73Uk3-KtmRBZr6un';
            //get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            return json_decode($verifyResponse);
    }

    private function existInDb($post, $table){
        $emailExist = $this->clientRepository->checkExistence('email', $post['email'], $table);
        $phoneExist = $this->clientRepository->checkExistence('phone', $post['phone'], $table);
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

        return false;
    }

}
