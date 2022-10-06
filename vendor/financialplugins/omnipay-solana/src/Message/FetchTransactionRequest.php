<?php

namespace Omnipay\Solana\Message;

class FetchTransactionRequest extends Request
{
    protected function getEnpoint(): string
    {
        return '/transaction/%s';
    }

    public function getSignature(): string
    {
        return $this->getParameter('signature');
    }

    public function setSignature(string $value): Request
    {
        $this->setParameter('signature', $value);

        return $this;
    }

    protected function validateRequest(): void
    {
        $this->validate('signature');
    }

    protected function getRequestUrlParameters(): array
    {
        return [
            $this->getSignature()
        ];
    }
}
