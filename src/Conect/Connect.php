<?php

namespace Lifeapps\Integra\Conect\Connect;

abstract class Connect {

    protected $endPoint;
    protected $versionEndpoint;
    protected $headers;
    public const LIFEAPPS_API_URL = "https://superon.lifeapps.com.br/api";
    public const LIFEAPPS_TOKEN_FORNECEDOR = config(env("keys.idfornecedor"));
    public const LIFEAPPS_TOKEN_SPLIT = config(env("keys.tokensplit"));
    public const LIFEAPPS_SEGMENT = "ccc4ce04-2c6a-4364-b42a-898ad83d1878";
    protected $params;
    protected $callback;
    protected $dispach;

    public function __construct()
    {
        //set_time_limit(0);
        $this->headers = [
            'Content-Type: application/json',
            'X-idfornecedor: ["'.self::LIFEAPPS_TOKEN_FORNECEDOR.'"]'
        ];
        //Session::put("dispach", false);
    }

    protected function post()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => self::LIFEAPPS_API_URL . $this->endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($this->params),
            CURLOPT_HTTPHEADER => $this->headers,
        ]);
        $this->callback = json_decode(curl_exec($curl));
        curl_close($curl);
    }

    protected function get()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => self::LIFEAPPS_API_URL . $this->endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => $this->headers,
        ]);
        $this->callback = json_decode(curl_exec($curl));
        curl_close($curl);
    }

    protected function getWin($endpoint)
    {
        set_time_limit(0);
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);
        $this->callback = json_decode(curl_exec($curl));
        curl_close($curl);
    }
}
