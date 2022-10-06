<?php

namespace Omnipay\Solana\Message;

use Omnipay\Common\Message\AbstractResponse;

class Response extends AbstractResponse
{
    public function isSuccessful()
    {
        return is_object($this->data)
            && isset($this->data->status)
            && !isset($this->data->error)
            && $this->data->status == 'Success';
    }

    /**
     * Get error message
     *
     * @return string|null
     */
    public function getMessage()
    {
        return $this->data->error->message ?? 'Unknown error';
    }

    /**
     * Get the response data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
