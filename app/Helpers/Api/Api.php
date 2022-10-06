<?php

namespace App\Helpers\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

abstract class Api
{
    protected $client;

    protected $errorMessageKey;

    abstract protected function getBaseUrl(): string;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->getBaseUrl()
        ]);
    }

    public function get(string $path, string $returnKey = NULL, array $options = [])
    {
        return $this->request('GET', $path, $returnKey, $options);
    }

    public function post(string $path, string $returnKey = NULL, array $options = [])
    {
        return $this->request('POST', $path, $returnKey, $options);
    }

    protected function request(string $method, string $path, string $returnKey = NULL, array $options = [])
    {
        $exception = null;

        try {
            Log::debug(sprintf('URL: %s', Str::finish($this->getBaseUrl(), '/') . $path));
            Log::debug(sprintf('Options: %s', json_encode($options)));
            $response = $this->client->request($method, $path, array_merge(['verify' => FALSE], $options));
            $content = $response->getBody()->getContents();
            Log::debug(sprintf('Content: %s', $content));
            Log::debug(sprintf('Headers: %s', json_encode($response->getHeaders())));
            $content = json_decode($content);

            $errorMessage = $this->errorMessageKey ? data_get($content, $this->errorMessageKey) : NULL;
            if ($errorMessage) {
                Log::error(sprintf('%s - %s',  get_class($this), $errorMessage));
                return NULL;
            }

            return $returnKey ? data_get($content, $returnKey) : $content;
        } catch (ConnectException $e) {
            $exception = 'ConnectException';
        } catch (ClientException $e) {
            $exception = 'ClientException';
        } catch (ServerException $e) {
            $exception = 'ServerException';
        } catch (RequestException $e) {
            $exception = 'RequestException';
        } catch (\Throwable $e) {
            $exception = 'GeneralException';
        }

        if ($exception) {
            Log::error(sprintf(
                'API error (%s): %s, class: %s, path: %s.',
                $exception,
                $e->getMessage(),
                get_class($this),
                $path
            ));
        }

        return NULL;
    }
}
