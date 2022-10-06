<?php

namespace Omnipay\Solana\Message;

use Omnipay\Common\Message\AbstractResponse;

class FetchBalanceResponse extends Response
{
    public function isSuccessful()
    {
        return is_object($this->data)
            && isset($this->data->lamports)
            && !isset($this->data->error);
    }

    /**
     * Get the response data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data->lamports;
    }
}
