<?php

namespace Omniplay\Itch\Tests;

use Omniplay\Itch\ItchProvider;
use Omniplay\Testing\BareTestCase;

/** omniplay/itch's classes load with omnisense/omniplay and Symfony's HTTP client contracts alone. */
final class BareTest extends BareTestCase
{
    protected static function entryClass(): string
    {
        return ItchProvider::class;
    }

    protected static function requiredPackages(): array
    {
        return ['symfony/http-client-contracts'];
    }
}
