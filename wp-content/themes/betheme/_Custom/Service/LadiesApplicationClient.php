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

    public function ladiesAction($post, $files)
    {
        $post = $this->validatePost($post);

        $first_key = key($post);

        if($first_key === 'error'){
            return ['error' => $post['error']];
        }

        return ['success' => 'Ваша анкета была успешно подана, после подтверждения модератором, она появится на сайте.'];
        
//        $this->ladiesRepository->insertLadiesApplication($post);
//        wp_redirect( get_home_url() );
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
            'smoking' => CustomHelper::sanitiseText($post['la1-smoking']),
            'man_wish_age' => CustomHelper::sanitiseText($post['la1-man-wish-age']),
            'wishes_to_man' => CustomHelper::sanitiseText($post['la1-wishes-to-man']),
            'about' => CustomHelper::sanitiseText($post['la1-about']),
            'video_link' => esc_url($post['la1-video-link']),
            'path_to_images' => CustomHelper::sanitiseText($post['la1-path-to-images']),
            'main_image_path' => CustomHelper::sanitiseText($post['la1-main-image-path'])
        ];


        $emailExist = $this->ladiesRepository->checkExistence('email', $post['email']);
        $phoneExist = $this->ladiesRepository->checkExistence('phone', $post['phone']);

        if($emailExist){
            return  ['error' => 'this Email is already taken'];
        } else if ($phoneExist){
            return ['error' => 'this Phone is already taken'];
        } else {
            return $post;

        }

    }

    private function handleFiles()
    {

    }

}
