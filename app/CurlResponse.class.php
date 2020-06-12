<?php

namespace App;

class CurlResponse
{

    /**
     * Array associativo contendo os dados da resposta.
     * Esta variável será populada apenas se o tipo de dados for XML/JSON.
     */
    var $responseData;

    /**
     * Array associativo contendo os dados do cabeçalho
     */
    var $headers;

    /**
     * Inteiro contendo o código de status HTTP (200 Ok, 404 Not Found, etc)
     */
    var $statusCode;

    /**
     * String contendo o texto literal retornado da requisição.
     */
    var $responseText;

    /**
     * Número de erro do cURL
     */
    var $errno;


    
    /**
     * Cria uma novo objeto com os dados da resposta do servidor.
     * Todos os parâmetros são opcionais. É possível instanciar a classe e definir os parâmetros posteriormente.
     *
     * @param  array  $body Array contendo os dados do corpo da requisição. Será populado apenas se o tipo de dados for XML/JSON.
     * @param  int    $intStatusCode Código de status HTTP (200, 301, 400, 404, etc.)
     * @param  array  $arrHeaders Array contendo os dados do cabeçalho da resposta
     * @param  string $responseText Texto literal da resposta do servidor
     * @param  int    $errno Número de erro cURL
     *
     * @return void
     */
    public function __construct($body = null, $intStatusCode = 200, $arrHeaders = [], $responseText = '', $errno = 0)
    {
        $this->responseData = $body;
        $this->statusCode = $intStatusCode;
        $this->headers = $arrHeaders;
        $this->responseText = $responseText;
        $this->errno = $errno;
    }

    
    /**
     * Retorna o valor do array de dados como propriedade do objeto.
     * Ex.: $curlResponse->data
     *
     * @param  string $name Nome do atributo
     *
     * @return mixed
     */
    public function __get($name)
    {
        return (isset($this->responseData[$name]) ? $this->responseData[$name] : null);
    }
    
    
    public function getResponseData()
    {
        return $this->responseData;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getResponseText()
    {
        return $this->responseText;
    }

    public function getCurlErrorNumber()
    {
        return $this->errno;
    }

    
    /**
     * Verifica se o status da resposta do servidor é um status de erro.
     * Ex.: 400 (Bad Request), 401 (Unauthenticated), 404 (Not Found), etc.
     *
     * @return bool Retorna True se for um status de erro, ou False, caso contrário.
     */
    public function isStatusError()
    {
        return $this->statusCode >= 400;
    }

}
