<?php

namespace Omnipay\Solana;

use Omnipay\Common\AbstractGateway;
use Omnipay\Solana\Message\FetchBalanceRequest;
use Omnipay\Solana\Message\FetchTransactionRequest;

class Gateway extends AbstractGateway
{
    const API_URL = 'https://public-api.solscan.io';

    public function getName()
    {
        return 'Solana';
    }

    public function getDefaultParameters()
    {
        return [
            'api_url' => self::API_URL,
        ];
    }

    public function getApiUrl(): string
    {
        return $this->getParameter('api_url');
    }

    public function setApiUrl(string $value): Gateway
    {
        $this->setParameter('api_url', $value);

        return $this;
    }

    public function fetchBalance(array $parameters = [])
    {
        return $this->createRequest(FetchBalanceRequest::class, $parameters);
    }

    public function fetchTransaction(array $parameters = [])
    {
        return $this->createRequest(FetchTransactionRequest::class, $parameters);
    }
}
