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
        //TODO FILES
        $this->ladiesRepository->insertLadiesApplication($this->handlePost($post));
        return 'hello';
    }

    private function handlePost($post)
    {
        require_once '../Helper/CustomHelper.php';
        return [
            'name' => CustomHelper::sanitiseText($post['la1-name']),
            'date_of_birth' => CustomHelper::sanitiseText($post['la1-dateOfBirth']),
            'email' => CustomHelper::sanitiseText($post['la1-email']),
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
            'path_to_images' => CustomHelper::sanitiseText($post['la1-path-to-images']),
            'main_image_path' => CustomHelper::sanitiseText($post['la1-main-image-path'])
        ];

    }

    private function handleFiles()
    {

    }

}
