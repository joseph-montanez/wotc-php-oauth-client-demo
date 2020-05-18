<?php

namespace Wotc\Api\Client;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Token\AccessToken;

class Api
{
    public $client_id;
    public $client_secret;
    public $access_token;
    public $refresh_token;
    public $expires;
    public $endpoint;

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @param mixed $client_id
     *
     * @return Api
     */
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientSecret()
    {
        return $this->client_secret;
    }

    /**
     * @param mixed $client_secret
     *
     * @return Api
     */
    public function setClientSecret($client_secret)
    {
        $this->client_secret = $client_secret;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRefreshToken()
    {
        return $this->refresh_token;
    }

    /**
     * @param mixed $refresh_token
     *
     * @return Api
     */
    public function setRefreshToken($refresh_token)
    {
        $this->refresh_token = $refresh_token;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * @param mixed $expires
     *
     * @return Api
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param mixed $endpoint
     *
     * @return Api
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * @param string $client_id
     * @param string $client_secret
     *
     * @return GenericProvider
     */
    public function getProvider(string $client_id = '', string $client_secret = ''): GenericProvider
    {
        if ($client_id) {
            $this->setClientId($client_id);
        }
        if ($client_secret) {
            $this->setClientSecret($client_secret);
        }

        $provider = new GenericProvider([
            'clientId'                => $this->client_id,
            'clientSecret'            => $this->client_secret,
            'urlAuthorize'            => 'https://' . $this->endpoint . '/oauth/authorize',
            'urlAccessToken'          => 'https://' . $this->endpoint . '/oauth/token/refresh',
            'urlResourceOwnerDetails' => 'https://' . $this->endpoint . '/api/v1/me',
        ]);

        return $provider;
    }

    /**
     * @return \League\OAuth2\Client\Token\AccessToken
     */
    public function getAccessToken(): AccessToken
    {
        $token = new AccessToken([
            'access_token'  => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'expires'       => $this->expires,
        ]);

        return $token;
    }

    /**
     * Get to url
     *
     * @param string $url     The URL to access
     * @param array  $data    The data to send as query string
     * @param array  $headers The extra headers
     * @param bool   $json    To encode the body as json
     *
     * @return array|mixed
     */
    public function get($url, $data = [], $headers = [], $json = true)
    {
        return $this->send('GET', $url, $data, $headers, $json);
    }


    /**
     * Post to url
     *
     * @param string $url     The URL to access
     * @param array  $data    The data to send as body
     * @param array  $headers The extra headers
     * @param bool   $json    To encode the body as json
     *
     * @return array|mixed
     */
    public function post($url, $data = [], $headers = [], $json = true)
    {
        return $this->send('POST', $url, $data, $headers, $json);
    }

    /**
     * Put to url
     *
     * @param string $url     The URL to access
     * @param array  $data    The data to send as body
     * @param array  $headers The extra headers
     * @param bool   $json    To encode the body as json
     *
     * @return array|mixed
     */
    public function put($url, $data = [], $headers = [], $json = true)
    {
        return $this->send('PUT', $url, $data, $headers, $json);
    }


    /**
     * Send request to url
     *
     * @param string $method  The HTTP method to send
     * @param string $url     The URL to access
     * @param array  $data    The data to send
     * @param array  $headers The extra headers
     * @param bool   $json    To encode the body as json
     *
     * @return array|mixed
     */
    public function send($method, $url, $data = [], $headers = [], $json = true)
    {
        $token  = $this->getAccessToken();
        $client = new Client();

        if ($json) {
            $headers['Accept']       = 'application/json';
            $headers['Content-Type'] = 'application/json';
        }

        $request = $this->getProvider()->getAuthenticatedRequest(
            $method,
            'https://' . $this->endpoint . '/api/v1/' . $url,
            $token,
            [
                'headers' => $headers,
                'body'    => $json ? json_encode($data) : $data,
            ]
        );

        try {
            $response = $client->send($request, ['verify' => false]);
        } catch (GuzzleException $e) {
            /**
             * @var $response1 \GuzzleHttp\Psr7\Response
             */
            $response1 = $e->getResponse();
            echo $e->getMessage(), PHP_EOL, $e->getTraceAsString(),
            PHP_EOL, $response1->getBody()->getContents();

            return null;
        }

        $json = [];
        if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
            $content = $response->getBody()->getContents();
            $json    = json_decode($content, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $json = $content;
            }
        } else if ($response->getStatusCode() >= 400 && $response->getStatusCode() <= 500) {
            $content = $response->getBody()->getContents();
            $json    = json_decode($content, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $json = $content;
            }
        }

        return $json;
    }


    /**
     * @param string $access_token
     */
    public function setAccessToken(string $access_token): void
    {
        $this->access_token = $access_token;
    }


    /**
     * Put to url
     *
     * @param string $url     The URL to access
     * @param array  $data    The data to send as body
     * @param array  $headers The extra headers
     * @param bool   $json    To encode the body as json
     *
     * @return array|mixed
     */
    public function delete($url, $data = [], $headers = [], $json = true)
    {
        return $this->send('DELETE', $url, $data, $headers, $json);
    }

}
