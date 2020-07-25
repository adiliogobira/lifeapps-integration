<?php


namespace Lifeapps\Integra\Conect\Connect;


/**
 * Class Banners
 * @package App\Helper\Lifeapps
 */
class Banners extends Connect
{
    /**
     * @return mixed
     */
    public function getCarrouseu()
    {
        $this->endPoint = "{$this->endPoint}v2/app/" . self::LIFEAPPS_TOKEN_FORNECEDOR . "/customizacao/carrossel/list-for-page/" . self::LIFEAPPS_TOKEN_FORNECEDOR . "?page=page:home%20%20%20%20&device=desktop&idformapagamento=b2ebc452-98e2-4376-9a52-c83073f219ea";
        $this->get();
        return $this->callback;
    }

    /**
     * @return mixed
     */
    public function getBanners()
    {
        $this->endPoint = "/v2/app/" . self::LIFEAPPS_TOKEN_FORNECEDOR . "/customizacao/carrossel/list-for-page/" . self::LIFEAPPS_TOKEN_FORNECEDOR . "?page=page:home%20%20%20%20&device=desktop&idformapagamento=f430d089-93e0-4d2a-bd4b-f7ddca530a7b";
        $this->get();
        return $this->callback;
    }
}
