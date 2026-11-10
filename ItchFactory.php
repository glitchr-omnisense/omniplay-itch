<?php

namespace Omniplay\Itch;

use Omniplay\Config;
use Omniplay\Http\JsonClient;
use Omniplay\ProviderFactory;
use Omniplay\ProviderInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * "itch": options key (a server-side API key, from the account's settings or
 * OAuth: only for ownership and library; the pages need none), user_agent,
 * api ("https://api.itch.io").
 */
final class ItchFactory extends ProviderFactory
{
    public function __construct(private readonly ?HttpClientInterface $http = null)
    {
    }

    protected function populate(Config $c): void
    {
        $c->defaults([
            'omniplay.factory_name' => 'itch',
            'omniplay.factory_title' => 'itch.io',
            'omniplay.required_options' => [],
            'key' => null,
            'user_agent' => 'omniplay/1.0 (+https://github.com/glitchr-omnisense/omniplay)',
            'api' => 'https://api.itch.io',
        ]);
    }

    protected function build(Config $c): ProviderInterface
    {
        return new ItchProvider(new JsonClient($this->http ?? HttpClient::create(['timeout' => 20]), 'itch.io', ['Accept' => 'application/json', 'User-Agent' => (string) $c->string('user_agent')], $c->backoff()), $c->string('key'), rtrim((string) $c->string('api'), '/'));
    }
}
