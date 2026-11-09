# Changelog

## Unreleased (1.x)

### Changed
- `omnigame/itch` is now `omniplay/itch` (2026-11-09: the omnigame family merged into omniplay, this
  repository's history kept, from omnigame-itch at 8f3bd42): the namespace `Omniplay\Itch`,
  requiring `omnisense/omniplay`; the default User-Agent `omniplay/1.0
  (+https://github.com/glitchr-omnisense/omniplay)`.

### Fixed
- Prices are in ISO 4217 minor units whatever their writing: the yen has none (`¥500` is 500 JPY,
  where it was 50000), and a thousands separator is read as such (`$1,000.00` is 100000, where it
  was 100).
