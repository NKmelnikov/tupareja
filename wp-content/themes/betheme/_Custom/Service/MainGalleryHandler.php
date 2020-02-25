<?php

namespace Service;

use DateTime;
use Repository\ClientRepository;
use Service\ClientApplicationHandler;

class MainGalleryHandler
{

    private $clientRepository;
    private $clientApplicationHandler;


    public function __construct()
    {
        require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
        require_once(ABSPATH . 'wp-content/themes/betheme/_Custom/Repository/ClientRepository.php');
        require_once(ABSPATH . 'wp-content/themes/betheme/_Custom/Service/ClientApplicationHandler.php');
        $this->clientRepository = new ClientRepository();
        $this->clientApplicationHandler = new ClientApplicationHandler();
    }

    public function getLadies() {
        $ladies = (array)$this->clientRepository->getLadiesForGallery();
        foreach ($ladies as $k=>$lady) {
            $lady = (array)($lady);
            $ladies[$k]['browser_path'] = $this->clientApplicationHandler->convertImgPath($lady['main_image_path']);
            $ladies[$k]['age'] = $this->clientApplicationHandler->countAge($lady['date_of_birth']);
            $ladies[$k]['zodiac'] = $this->clientApplicationHandler->getZodiac($lady['date_of_birth']);
        }
        return (array)$ladies;
    }
}
