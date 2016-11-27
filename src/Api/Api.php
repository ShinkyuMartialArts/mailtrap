<?php

namespace ShinkyuMartialArts\Mailtrap\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use ShinkyuMartialArts\Mailtrap\Exceptions\InvalidEndpointException;
use ShinkyuMartialArts\Mailtrap\Exceptions\InvalidHttpMethodException;

class Api
{
    const URL = 'https://mailtrap.io/api/';
    const METHODS = [
        'post',
        'patch',
        'put',
    ];

    const DEFAULT_TIMEZONE = 'UTC';

    /**
     * @var Client
     */
    private $client;
    /**
     * @var string
     */
    private $token;
    /**
     * @var string
     */
    private $version;
    /**
     * @var array
     */
    private $endpoints = [];

    /**
     * Api constructor.
     * @param string $token
     * @param string $version
     */
    public function __construct(string $token, $version = 'v1')
    {
        $this->client = new Client();
        $this->token = $token;
        $this->version = $version;
        $this->endpoints = require __DIR__.'/endpoints.php';
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @return array
     */
    public function get(string $endpoint, array $params = [])
    {
        $ids = $params['ids'] ?? [];
        unset($params['ids']);

        $response = $this->client->get($this->url($endpoint, $ids), [
            'headers' => $this->headers(),
            'query' => $params
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @param array $ids
     * @return array
     */
    public function post(string $endpoint, array $data = [], array $ids = [])
    {
        return $this->send('post', $endpoint, $data, $ids);
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @param array $ids
     * @return array
     */
    public function patch(string $endpoint, array $data = [], array $ids = [])
    {
        return $this->send('patch', $endpoint, $data, $ids);
    }

    /**
     * @param string $endpoint
     * @param array $data
     * @param array $ids
     * @return array
     */
    public function put(string $endpoint, array $data = [], array $ids = [])
    {
        return $this->send('put', $endpoint, $data, $ids);
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $data
     * @param array $ids
     * @return array
     * @throws InvalidHttpMethodException
     */
    private function send(string $method, string $endpoint, array $data = [], array $ids = [])
    {
        if (! in_array($method, self::METHODS, true)) {
            throw new InvalidHttpMethodException;
        }

        /** @var Response $response */
        $response = $this->client->$method($this->url($endpoint, $ids), [
            'headers' => $this->headers(),
            'body'    => json_encode($data)
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @return bool
     */
    public function delete(string $endpoint, array $params = [])
    {
        $ids = $params['ids'] ?? [];
        unset($params['ids']);

        $response = $this->client->get($this->url($endpoint, $ids), [
            'headers' => $this->headers(),
            'query' => $params
        ]);

        return $response->getStatusCode() === 200;
    }

    /**
     * @param string $endpoint
     * @param array $ids
     * @return string
     */
    private function url(string $endpoint, array $ids = [])
    {
        return self::URL.$this->version.$this->endpoint($endpoint, $ids);
    }

    /**
     * @param array $additional
     * @return array
     */
    private function headers($additional = [])
    {
        return array_merge([
            'Content-Type'  => 'application/json',
            'Authorization' => sprintf('Token token=%s', $this->token)
        ], $additional);
    }

    /**
     * @param string $endpoint
     * @param array $ids
     * @return string
     * @throws InvalidEndpointException
     */
    public function endpoint(string $endpoint, array $ids = [])
    {
        $apiEndpoint = $this->endpoints[$endpoint] ?? null;

        if (null === $apiEndpoint) {
            throw new InvalidEndpointException;
        }

        foreach ($ids as $entity => $id) {
            $apiEndpoint = str_replace('{'.$entity.'Id}', $id, $apiEndpoint);
        }

        return $apiEndpoint;
    }

    /**
     * @param string $class
     * @param array $dataCollection
     * @return array
     */
    public static function collection(string $class, array $dataCollection)
    {
        foreach ($dataCollection as $data) {
            $entities[] = new $class($data);
        }

        return $entities ?? [];
    }
}
