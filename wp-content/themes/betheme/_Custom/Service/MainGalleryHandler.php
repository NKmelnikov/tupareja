<?php

namespace Service;

use DateTime;
use Repository\ClientRepository;

class MainGalleryHandler
{

    private $clientRepository;
    const TABLE_LADIES = 'wp_ladies';


    public function __construct()
    {
        require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
        require_once(ABSPATH . 'wp-content/themes/betheme/_Custom/Repository/ClientRepository.php');
        $this->clientRepository = new ClientRepository();
    }

    public function getLadies() {
        $ladies = (array)$this->clientRepository->getLadiesForGallery(self::TABLE_LADIES);
        foreach ($ladies as $k=>$lady) {
            $lady = (array)($lady);
            $ladies[$k]['browser_path'] = $this->convertImgPath($lady['main_image_path']);
            $ladies[$k]['age'] = $this->countAge($lady['date_of_birth']);
            $ladies[$k]['zodiac'] = $this->getZodiac($lady['date_of_birth']);
        }
        return (array)$ladies;
    }



}
