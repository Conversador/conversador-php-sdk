# AGENTS.md - Conversador PHP SDK

## Overview
This is a PHP SDK for the Conversador API, used to send WhatsApp messages.

## Project Structure
```
src/              # Source code (PSR-4: Conversador\)
tests/            # PHPUnit test cases
env.php           # Environment configuration (not committed)
```

## Build & Test Commands

### Running Tests
```bash
# Run all tests
./vendor/bin/phpunit

# Run a single test file
./vendor/bin/phpunit tests/MessageTest.php

# Run a specific test method
./vendor/bin/phpunit tests/MessageTest.php --filter=testGetNumber
```

### Dependencies
```bash
# Install dependencies
composer install

# Update dependencies
composer update
```

## Code Style Guidelines

### PHP Version
- Minimum PHP 8.2

### Naming Conventions
- **Classes**: PascalCase (e.g., `Conversador`, `Message`)
- **Methods**: camelCase (e.g., `sendMessage`, `getNumber`)
- **Properties**: camelCase (e.g., `$token`, `$client`)
- **Constants**: UPPER_CASE with underscores

### Type Hints
- Use strict type hints (PHP 8.2+): `string`, `int`, `array`, `bool`, `?Type`
- Return types required on all methods
- Parameter types required on all methods

### Code Organization
- One class per file
- PSR-4 autoloading: namespace `Conversador\` maps to `src/`
- Use single quotes for simple strings, double quotes for interpolation
- Opening brace on same line for classes/functions

### Imports
- Use fully qualified class names or `use` statements
- Group standard library, third-party, then project imports
- Sort alphabetically within groups

### Error Handling
- Catch specific exceptions (e.g., `GuzzleException`)
- Re-throw as `Exception` with descriptive message
- Include context in error messages (e.g., `'Erro ao enviar mensagem: '.$e->getMessage()`)

### Testing
- Test class names end with `Test.php`
- Test methods start with `test` prefix
- Use PHPUnit's `TestCase` base class
- Use `@internal` and `@coversNothing` docblock for integration tests that hit real API

### Property Visibility
- Use `private` for internal state
- Use `public` only for API that must be accessible
- Avoid `protected` unless extending is expected

### Getters/Setters
- Use `get` prefix for accessors (e.g., `getNumber()`, `getBody()`)
- No setters needed for immutable value objects

### Docblocks
- Include `@param` and `@return` for all public methods
- Use `@internal` for test classes that shouldn't be part of public API

### General
- No comments unless clarifying complex logic
- Avoid abbreviations in public API names
- Use early returns to reduce nesting
- 4 spaces for indentation (no tabs)