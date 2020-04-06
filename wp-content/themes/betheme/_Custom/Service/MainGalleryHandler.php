<?php

namespace Service;

use Repository\ClientRepository;
use Helper\CustomHelper;

class MainGalleryHandler
{

    private $clientRepository;
    private $customHelper;

    public function __construct()
    {
        require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
        require_once(ABSPATH . 'wp-content/themes/betheme/_Custom/Repository/ClientRepository.php');
        require_once(ABSPATH . 'wp-content/themes/betheme/_Custom/Helper/CustomHelper.php');
        $this->clientRepository = new ClientRepository();
        CustomHelper::build();
        $this->customHelper = CustomHelper::instance();
    }

    public function getLadies() {
        $ladies = (array)$this->clientRepository->getLadiesForGallery();
        foreach ($ladies as $k=>$lady) {
            $lady = (array)($lady);
            $ladies[$k]['browser_path'] = $this->customHelper->convertImgPath($lady['main_image_path']);
            $ladies[$k]['age'] = $this->customHelper->getCurrentAge($lady['date_of_birth']);
            $ladies[$k]['zodiac'] = $this->customHelper->getZodiac($lady['date_of_birth']);
        }
        return (array)$ladies;
    }
}
