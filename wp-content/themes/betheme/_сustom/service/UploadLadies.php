<?php

namespace Betheme\Service;

use wpdb;

class UploadLadies
{
    public function ladiesAction($post, $files)
    {
//        (new wpdb)->insert( 'wp_ladies', $data);
        $this->insertLadies($post);
        return 'hello';
    }

    private function handlePost($post)
    {
        require_once '../service/CustomHelper.php';
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
            'about' => CustomHelper::sanitiseText($post['la1-about'])
        ];

    }

    private function handleFiles()
    {

    }

    private function insertLadies($post)
    {
        global $wpdb;
        echo print_r($this->handlePost($post), true);
        $wpdb->insert('wp_ladies', $this->handlePost($post));
    }

}
