<?php

namespace Omnipay\Solana\Message;

class FetchBalanceRequest extends Request
{
    protected $responseClass = FetchBalanceResponse::class;

    protected function getEnpoint(): string
    {
        return '/account/%s';
    }

    public function getAddress(): string
    {
        return $this->getParameter('address');
    }

    public function setAddress(string $value): Request
    {
        $this->setParameter('address', $value);

        return $this;
    }

    protected function validateRequest(): void
    {
        $this->validate('address');
    }

    protected function getRequestUrlParameters(): array
    {
        return [
            $this->getAddress()
        ];
    }
}
