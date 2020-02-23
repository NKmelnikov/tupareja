<?php

namespace Service;

use DateTime;
use Repository\ClientRepository;

class MainGalleryHandler
{

    private $clientRepository;
    const LADIES_PER_PAGE = 15;
    const TABLE_LADIES = 'wp_ladies';


    public function __construct()
    {
        require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
        require_once(ABSPATH . 'wp-content/themes/betheme/_Custom/Repository/ClientRepository.php');
        $this->clientRepository = new ClientRepository();
    }

    public function getLadies() {
        $ladies = $this->clientRepository->getElement(self::TABLE_LADIES,self::LADIES_PER_PAGE, 1);
        foreach ($ladies as $k=>$lady) {
            $ladies[$k]['browser_path'] = $this->convertImgPath($lady['main_image_path']);
            $ladies[$k]['age'] = $this->countAge($lady['date_of_birth']);
        }
        return (array)$ladies;
    }

    private function convertImgPath($src){
        preg_match_all('`(\/wp-content.*)`im', $src, $new_src, PREG_SET_ORDER);
        if (!empty($new_src)) {
            return $new_src[0][0];
        }
        return '';
    }

    private function countAge($dateOfBirth){
        $date = new DateTime($dateOfBirth);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

}
