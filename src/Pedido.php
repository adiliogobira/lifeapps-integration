<?php


namespace App\Helper\Lifeapps;


/**
 * Class Pedido
 * @package App\Helper\Lifeapps
 */
class Pedido extends LifeAppsHelper
{

    /**
     * @param null $idcliente
     * @param null $idendereco
     * @param null $formadepagamento
     * @return mixed
     */
    public function formaEntrega($idcliente = null, $idendereco = null, $formadepagamento = null)
    {
        $this->endPoint = "/v4/app/" . self::LIFEAPPS_TOKEN_FORNECEDOR . self::LIFEAPPS_TOKEN_SPLIT . "{$idcliente}/formas-entrega/" . self::LIFEAPPS_TOKEN_FORNECEDOR . "?idendereco={$idendereco}&tipoEntrega=DELIVERY&idformapagamento={$formadepagamento}";
        $this->get();
        return $this->callback;
    }

    /**
     * @param $idcliente
     * @param $pedido
     * @return mixed
     */
    public function pedidoSubmit($idcliente, $pedido)
    {
        $this->endPoint = "/v2/app/" . self::LIFEAPPS_TOKEN_FORNECEDOR . "/usuario/{$idcliente}/pedido";
        $this->params = $pedido;
        $this->post();
        return $this->callback;
    }

    /**
     * @param $idcliente
     * @return mixed
     */
    public function getPedidos($idcliente)
    {
        $this->endPoint = "/v2/app/pedido/cliente/{$idcliente}";
        $this->get();
        return $this->callback;
    }

    /**
     * @param $idcliente
     * @return mixed
     */
    public function getCupom($idcliente)
    {
        $this->endPoint = "/v2/app/cupom-desconto/cliente/{$idcliente}?onlyLast=false&available=true";
        $this->get();
        return $this->callback;
    }
}

