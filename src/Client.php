<?php

namespace Gentor\BnpPF;


/**
 * Class Client
 *
 * @package Gentor\BnpPF
 */
class Client
{
    /**
     *
     */
    const TEST_ENDPOINT = 'https://ws-test.bnpparibas-pf.bg/ServicesPricing/';
    /**
     *
     */
    const LIVE_ENDPOINT = 'https://ws.bnpparibas-pf.bg/ServicesPricing/';

    /**
     * @var
     */
    protected $certificate;

    /**
     * @var
     */
    protected $privateKey;

    /**
     * @var
     */
    protected $password;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var
     */
    protected $curl;

    /**
     * @var
     */
    protected $curlOptions;

    /**
     * Client constructor.
     *
     * @param      $certificate
     * @param      $privateKey
     * @param      $password
     * @param bool $testMode
     */
    public function __construct($certificate, $privateKey, $password, $testMode = false)
    {
        $this->certificate = $certificate;
        $this->privateKey = $privateKey;
        $this->password = $password;
        $this->url = $testMode ? static::TEST_ENDPOINT : static::LIVE_ENDPOINT;
    }

    /**
     * @param $urlParams
     *
     * @return mixed
     * @throws \Gentor\BnpPF\BnpException
     */
    public function getResult($urlParams)
    {
        $this->setCurlOptions($urlParams);

        $result = curl_exec($this->curl);

        $code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        $error = curl_error($this->curl);

        curl_close($this->curl);

        if (200 != $code) {
            throw new BnpException($error, $code);
        }

        return $result;
    }

    /**
     * @param $urlParams
     */
    protected function setCurlOptions($urlParams)
    {
        $this->curl = curl_init();

        $this->curlOptions = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_ENCODING => '',
            CURLOPT_USERAGENT => 'MerchantPos',
            CURLOPT_AUTOREFERER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_NOBODY => false,
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSLCERT => $this->certificate,
            CURLOPT_SSLCERTTYPE => 'PEM',
            CURLOPT_SSLCERTPASSWD => '',
            CURLOPT_SSLKEY => $this->privateKey,
            CURLOPT_SSLKEYTYPE => 'PEM',
            CURLOPT_SSLKEYPASSWD => $this->password,
            CURLOPT_SSLVERSION => 1,
            CURLOPT_URL => $this->url . $urlParams,
        ];

        curl_setopt_array($this->curl, $this->curlOptions);
    }

}