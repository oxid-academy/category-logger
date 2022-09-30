# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.3] - 2022-09-30
### Changed
- Simplified `services.yaml` by removing unnecessary loc.
- Enhanced the `README.md`.

## Fixed
- `LoggerEventSubscriber` handle methods now using specific event types to be compatible with OXID eShop 6.5.

## [1.0.2] - 2022-02-14
### Changed
- `composer.json` Increased the PHP requirement to ^8.0.
- `LoggerEventSubscriber` 
  - Declared strict types.
  - Simplifed if statements.
- `metadata.php` changed the module title to "OXID Academy :: Category Logger".

## [1.0.1] - 2020-09-25
### Changed
- `LoggerEventSubscriber` strict comparison to namespace w/o creating Category model.

## [1.0.0] - 2020-08-14
### Added
- `LoggerEventSubscriber` subscriber class to react to model insert, update and deletion.
