<?php


namespace Service;

use Helper\CustomHelper;
use Repository\ClientRepository;
use wpdb;


class LadiesApplicationAdminUpdate
{

    /** Class constructor */
    private $clientRepository;
    const TABLE_LADIES = 'wp_ladies';

    public function __construct()
    {

        require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
        require_once(ABSPATH . 'wp-content/themes/betheme/_Custom/Repository/ClientRepository.php');
        $this->clientRepository = new ClientRepository();

    }

    public function ladiesUpdate($post)
    {
        $post = $this->validatePost($post);
        $first_key = key($post);

        if ($first_key === 'error') {
            return ['error' => $post['error']];
        }

        $this->clientRepository->updateApplication(self::TABLE_LADIES, $post);
        return ['success' => 'Анкета успешно обновлена'];
    }

    private function validatePost($post)
    {
        require_once '../Helper/CustomHelper.php';
        if (!empty($post['le1-path-to-images-1'])) {
            $arr1 = explode(',', $post['le1-path-to-images']);
            $arr2 = explode(',', $post['le1-path-to-images-1']);
            $post['le1-path-to-images'] = implode(',', array_merge($arr1, $arr2));
        }
        $post = [
            'id' => CustomHelper::sanitiseText($post['le1-id']),
            'lname' => CustomHelper::sanitiseText($post['le1-lname']),
            'name' => CustomHelper::sanitiseText($post['le1-name']),
            'fname' => CustomHelper::sanitiseText($post['le1-fname']),
            'date_of_birth' => strtotime(CustomHelper::sanitiseText($post['le1-dateOfBirth'])),
            'email' => sanitize_email($post['le1-email']),
            'instagram' => sanitize_email($post['le1-instagram']),
            'phone' => CustomHelper::sanitiseText($post['le1-phone']),
            'family_status' => CustomHelper::sanitiseText($post['le1-familyStatus']),
            'kids' => CustomHelper::sanitiseText($post['le1-kids']),
            'height' => CustomHelper::sanitiseText($post['le1-height']),
            'weight' => CustomHelper::sanitiseText($post['le1-weight']),
            'eye_color' => CustomHelper::sanitiseText($post['le1-eyeColor']),
            'hair_color' => CustomHelper::sanitiseText($post['le1-hair_color']),
            'languages' => CustomHelper::sanitiseText($post['le1-languages']),
            'profession' => CustomHelper::sanitiseText($post['le1-profession']),
            'town' => CustomHelper::sanitiseText($post['le1-town']),
            'country' => CustomHelper::sanitiseText($post['le1-country']),
            'about' => CustomHelper::sanitiseText($post['le1-about']),
            'smoking' => CustomHelper::sanitiseText($post['le1-smoking']),
            'man_wish_age' => CustomHelper::sanitiseText($post['le1-man-wish-age']),
            'wishes_to_man' => CustomHelper::sanitiseText($post['le1-wishes-to-man']),
            'video_link' => esc_url($post['le1-video-link']),
            'path_to_images' => CustomHelper::sanitiseText($post['le1-path-to-images']),
            'main_image_path' => CustomHelper::sanitiseText($post['le1-main-image-path']),
            'activated' => CustomHelper::sanitiseText($post['le1-activated'])
        ];

        return $post;
    }

}
