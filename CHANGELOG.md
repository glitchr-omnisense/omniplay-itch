# Changelog

## [Unreleased]

## [1.0.0] - 2026-11-13

The first stable release.

### Release

- Requires `omnisense/contracts: ^1.0`, `omnisense/omniplay: ^1.0`: stable versions, so `composer
  require omniplay/itch` installs in a project at Composer's default minimum-stability.
  `extra.branch-alias` names 1.x (`1.x-dev`); the CI (`.github/workflows/ci.yml`, glitchr-studio/ci's
  php-package.yml) is callable, and `release.yml` runs it on a tag before glitchr-studio/ci's
  php-release.yml.

### Changed
- 2026-11-10: the usage policy declared as data, in `policy.json` (omnisense/contracts' schema, named in `composer.json`'s `extra.omnisense.policy`). The provider implements `DeclaresUsagePolicyInterface` and gives the policy to its Capabilities. The factory hands the provider's Backoff to its JsonClient, so that a 429 and its Retry-After hold every call. `Tests/PolicyTest.php`.
- `omnigame/itch` is now `omniplay/itch` (2026-11-09: the omnigame family merged into omniplay, this
  repository's history kept, from omnigame-itch at 8f3bd42): the namespace `Omniplay\Itch`,
  requiring `omnisense/omniplay`; the default User-Agent `omniplay/1.0
  (+https://github.com/glitchr-omnisense/omniplay)`.

### Fixed
- Prices are in ISO 4217 minor units whatever their writing: the yen has none (`¥500` is 500 JPY,
  where it was 50000), and a thousands separator is read as such (`$1,000.00` is 100000, where it
  was 100).
