# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.2] - 2021-02-11
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
