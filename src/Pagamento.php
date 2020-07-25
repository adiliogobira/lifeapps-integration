<?php


namespace App\Helper\Lifeapps;


/**
 * Class Pagamento
 * @package App\Helper\Lifeapps
 */
class Pagamento extends LifeAppsHelper
{

    /**
     * @param $idcliente
     * @return mixed
     */
    public function formPayment($idcliente = null)
    {
        $cliente = ($idcliente ?? "?idcliente={$idcliente}");
        $this->endPoint .= "/v2/app/" . self::LIFEAPPS_TOKEN_FORNECEDOR . "/fornecedor/" . self::LIFEAPPS_TOKEN_FORNECEDOR . "/formas-pagamento{$cliente}";
        $this->get();
        return $this->callback;
    }

    /**
     * @param $idpedido
     * @param $dados
     * @return mixed
     */
    public function processaPagamento($idpedido, $dados)
    {
        $this->endPoint = "/v4/app/payment/confirm-payment/{$idpedido}";
        $this->params = $dados;
        $this->post();
        return $this->callback;
    }
}
