<?php

namespace Service;

use DateTime;
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
        return [
            'success0' => __(CustomHelper::getTranslationByLocale('system_files_loading', $post['locale'])),
            'success1' => __(CustomHelper::getTranslationByLocale('system_files_loaded', $post['locale'])),
            'success2' => __(CustomHelper::getTranslationByLocale('cah_lady_application', $post['locale']))
        ];
    }

    public function menAction($post)
    {
        $post = $this->validatePostMen($post);
        $first_key = key($post);

        if($first_key === 'error'){
            return ['error' => $post['error']];
        }

        $this->clientRepository->insertApplication(self::TABLE_MEN, $post);
        return [
            'success0' => __(CustomHelper::getTranslationByLocale('system_files_loading', $post['locale'])),
            'success1' => __(CustomHelper::getTranslationByLocale('system_files_loaded', $post['locale'])),
            'success2' => __(CustomHelper::getTranslationByLocale('cah_lady_application', $post['locale']))
        ];
    }

    private function validatePostLadies($post)
    {
        require_once '../Helper/CustomHelper.php';
        $post =  [
            'locale' => CustomHelper::sanitiseText($post['la1-locale']),
            'name' => CustomHelper::sanitiseText($post['la1-name']),
            'lname' => CustomHelper::sanitiseText($post['la1-lname']),
            'fname' => CustomHelper::sanitiseText($post['la1-fname']),
            'date_of_birth' => DateTime::createFromFormat('!d/m/Y', $post['la1-day'] .'/'. $post['la1-month'].'/'. $post['la1-year'])->getTimestamp(),
            'email' => sanitize_email($post['la1-email']),
            'phone' => CustomHelper::sanitiseText($post['la1-phone']),
            'family_status' => CustomHelper::sanitiseText($post['la1-familyStatus']),
            'kids' => CustomHelper::sanitiseText($post['la1-kids']),
            'height' => CustomHelper::sanitiseText($post['la1-height']),
            'weight' => CustomHelper::sanitiseText($post['la1-weight']),
            'eye_color' => CustomHelper::sanitiseText($post['la1-eyeColor']),
            'hair_color' => CustomHelper::sanitiseText($post['la1-hairColor']),
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
            'locale' => CustomHelper::sanitiseText($post['ma1-locale']),
            'name' => CustomHelper::sanitiseText($post['ma1-name']),
            'date_of_birth' => DateTime::createFromFormat('!d/m/Y', $post['ma1-day'] .'/'. $post['ma1-month'].'/'. $post['ma1-year'])->getTimestamp(),
            'email' => sanitize_email($post['ma1-email']),
            'phone' => CustomHelper::sanitiseText($post['ma1-phone']),
            'town' => CustomHelper::sanitiseText($post['ma1-town']),
	        'height' => CustomHelper::sanitiseText($post['ma1-height']),
	        'weight' => CustomHelper::sanitiseText($post['ma1-weight']),
	        'hair_color' => CustomHelper::sanitiseText($post['ma1-hairColor']),
	        'eye_color' => CustomHelper::sanitiseText($post['ma1-eyeColor']),
	        'education' => CustomHelper::sanitiseText($post['ma1-education']),
	        'profession' => CustomHelper::sanitiseText($post['ma1-profession']),
	        'eng_lang' => CustomHelper::sanitiseText($post['ma1-enLanguage']),
	        'foreign_lang' => CustomHelper::sanitiseText($post['ma1-languages']),
	        'family_status' => CustomHelper::sanitiseText($post['ma1-familyStatus']),
	        'kids' => CustomHelper::sanitiseText($post['ma1-kids']),
	        'about' => CustomHelper::sanitiseText($post['ma1-about']),
	        'hobby' => CustomHelper::sanitiseText($post['ma1-hobby']),
	        'smoking' => CustomHelper::sanitiseText($post['ma1-smoking']),
	        'drinking' => CustomHelper::sanitiseText($post['ma1-drinking']),
	        'people_value' => CustomHelper::sanitiseText($post['ma1-people_value']),
	        'parent_relations' => CustomHelper::sanitiseText($post['ma1-parent_relations']),
	        'music_preferences' => CustomHelper::sanitiseText($post['ma1-music_preferences']),
	        'literature' => CustomHelper::sanitiseText($post['ma1-literature']),
	        'principles' => CustomHelper::sanitiseText($post['ma1-principles']),
	        'goal' => CustomHelper::sanitiseText($post['ma1-goal']),
	        'cuisine' => CustomHelper::sanitiseText($post['ma1-cuisine']),
	        'socially_active' => CustomHelper::sanitiseText($post['ma1-socially_active']),
	        'vacation_preferences' => CustomHelper::sanitiseText($post['ma1-vacation_preferences']),
	        'partner_age_difference' => CustomHelper::sanitiseText($post['ma1-partner_age_difference']),
	        'partner_kids' => CustomHelper::sanitiseText($post['ma1-partner_kids']),
	        'partner_smoke' => CustomHelper::sanitiseText($post['ma1-partner_smoke']),
	        'partner_religion' => CustomHelper::sanitiseText($post['ma1-partner_religion']),
	        'partner_drive_away' => CustomHelper::sanitiseText($post['ma1-partner_drive_away']),
	        'partner_attraction' => CustomHelper::sanitiseText($post['ma1-partner_attraction']),
	        'path_to_images' => CustomHelper::sanitiseText($post['ma1-path-to-images']),
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
                return  ['error' => __(CustomHelper::getTranslationByLocale('cah_email_taken', $post['locale']))];
                break;
            case $phoneExist:
                return  ['error' => __(CustomHelper::getTranslationByLocale('cah_phone_taken', $post['locale']))];
                break;
            case !$validateCaptcha->success:
                return  ['error' => __(CustomHelper::getTranslationByLocale('cah_captcha_not_checked', $post['locale']))];
                break;
        }

        return false;
    }
}
