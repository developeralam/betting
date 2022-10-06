<?php

namespace Omnipay\Solana\Message;

use Omnipay\Common\Message\AbstractRequest as OmnipayAbstractRequest;

abstract class Request extends OmnipayAbstractRequest
{
    protected $responseClass = Response::class;

    /**
     * Get endpoint for specific API request
     *
     * @return string
     */
    abstract protected function getEnpoint(): string;

    /**
     * Validate request parameters
     */
    abstract protected function validateRequest(): void;

    public function getApiUrl(): string
    {
        return $this->getParameter('api_url');
    }

    public function setApiUrl(string $value): Request
    {
        $this->setParameter('api_url', $value);

        return $this;
    }

    /**
     * Get parameters that should be used (substituted) in the endpoint
     *
     * @return array
     */
    protected function getRequestUrlParameters(): array
    {
        return [];
    }

    /**
     * Get parameters that should be appended to the endpoint as query string
     *
     * @return array
     */
    protected function getRequestQueryParameters()
    {
        return [];
    }

    /**
     * Get relative URL for the request (to be passed to sendData() function)
     *
     * @return string
     */
    public function getData(): string
    {
        $this->validateRequest();

        $query = http_build_query($this->getRequestQueryParameters(), '', '&');

        return sprintf($this->getEnpoint(), ...$this->getRequestUrlParameters()) . ($query ? '?' . $query : '');
    }

    /**
     * Make an API request
     *
     * @param $url
     * @return \Omnipay\Common\Message\ResponseInterface|Response
     */
    public function sendData($url)
    {
        $httpResponse = $this->httpClient->request('GET', $this->getApiUrl() . $url);

        return $this->createResponse(json_decode($httpResponse->getBody()->getContents()));
    }

    /**
     * Make a response
     *
     * @param $data
     * @return Response
     */
    protected function createResponse($data): Response
    {
        return $this->response = new $this->responseClass($this, $data);
    }
}
