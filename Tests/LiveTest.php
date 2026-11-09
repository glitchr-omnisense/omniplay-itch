<?php

namespace Omniplay\Itch\Tests;

use Omniplay\Itch\ItchFactory;
use Omniplay\Itch\ItchProvider;
use Omniplay\Model\GameRef;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

/** A game page's data.json on itch.io itself (one request). Never in the default run. */
#[Group('live')]
final class LiveTest extends TestCase
{
    public function testAPage(): void
    {
        $provider = (new ItchFactory(HttpClient::create(['timeout' => 30])))->create(['user_agent' => 'omniplay-tests/1.0 (+https://github.com/glitchr-omnisense/omniplay)']);
        self::assertInstanceOf(ItchProvider::class, $provider);

        $game = $provider->game(GameRef::itch('leafo/x-moon'));
        self::assertSame(['X-Moon', ['leafo']], [$game?->title, $game?->developers]);
    }
}
