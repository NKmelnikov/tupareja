<?php

namespace Service;

use Repository\ClientRepository;

class MainGalleryHandler
{

    private $clientRepository;
    const LADIES_PER_PAGE = 15;


    public function __construct()
    {
        require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
        require_once(ABSPATH . 'wp-content/themes/betheme/_Custom/Repository/ClientRepository.php');
        $this->clientRepository = new ClientRepository();
    }

    public function getLadies() {
        $ladies = $this->clientRepository->getLadies(self::LADIES_PER_PAGE, 1);
        foreach ($ladies as $k=>$lady) {
            $ladies[$k]['browser_path'] = $this->convertImgPath($lady['main_image_path']);
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

}
