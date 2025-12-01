# WARP.md

This file provides guidance to WARP (warp.dev) when working with code in this repository.

## Project overview

This repository is a standard Laravel 12 skeleton application with a minimal custom setup. It uses PHP 8.2+, composer-managed backend dependencies, and a Vite + Tailwind CSS 4 toolchain for frontend assets.

Laravel conventions apply throughout: HTTP entry is via `public/index.php`, the framework is bootstrapped in `bootstrap/app.php`, configuration lives in `config/`, and application code is primarily under `app/`.

## Common commands

### Initial setup (fresh clone)

All-in-one project setup (recommended for first run):

- `composer setup`
  - Installs PHP dependencies.
  - Copies `.env.example` to `.env` if it does not exist.
  - Generates the application key.
  - Runs database migrations (using your configured DB).
  - Installs Node dependencies and builds frontend assets.

If you prefer to run steps manually:

- `composer install`
- `cp .env.example .env` (on Windows PowerShell: `Copy-Item .env.example .env`)
- `php artisan key:generate`
- `php artisan migrate`
- `npm install`
- `npm run build`

### Development server / full dev stack

The main development entrypoint is a Composer script that orchestrates PHP and frontend tooling:

- `composer dev`
  - Disables Composer’s process timeout.
  - Runs `php artisan serve` for the HTTP server.
  - Runs `php artisan queue:listen --tries=1` for background jobs.
  - Runs `php artisan pail --timeout=0` (live log viewer).
  - Runs `npm run dev` (Vite dev server with HMR).

You can also run individual processes in separate terminals if needed:

- `php artisan serve`
- `php artisan queue:listen --tries=1`
- `php artisan pail --timeout=0`
- `npm run dev`

### Building frontend assets

- Development (HMR via Vite): `npm run dev`
- Production build: `npm run build`

The Laravel Vite plugin is configured in `vite.config.js` with entrypoints:

- `resources/css/app.css`
- `resources/js/app.js`

The `welcome` view includes these via `@vite([...])` when a Vite dev server or built manifest is present.

### Testing

Tests use PHPUnit with Laravel’s testing layer. `phpunit.xml` is configured to:

- Use an in-memory SQLite database for tests.
- Include the `app/` directory as the source under test.

Main commands:

- Run the full test suite (preferred):
  - `composer test`
    - Clears configuration cache: `php artisan config:clear --ansi`
    - Runs the test suite: `php artisan test`
- Directly via Artisan: `php artisan test`
- Directly via PHPUnit: `./vendor/bin/phpunit`

Run a single test or subset of tests:

- By class or method name (through Artisan):
  - `php artisan test --filter=ExampleTest`
  - `php artisan test --filter="ExampleTest::test_the_application_returns_a_successful_response"`
- By file path (through Artisan):
  - `php artisan test tests/Feature/ExampleTest.php`
- Directly via PHPUnit with a filter:
  - `./vendor/bin/phpunit --filter ExampleTest tests/Unit/ExampleTest.php`

### Linting and formatting

PHP code style is handled by Laravel Pint (installed as a dev dependency):

- Run Pint over the default paths:
  - `./vendor/bin/pint`
- Or target specific directories:
  - `./vendor/bin/pint app tests`

## High-level architecture and structure

### Application code (`app/`)

- `app/Http/Controllers/Controller.php`
  - Base controller class; new HTTP controllers should extend this.
- `app/Models/User.php`
  - Default Eloquent model representing application users.
- `app/Providers/AppServiceProvider.php`
  - Primary place to register and bootstrap application services.
  - Use `register()` for container bindings and `boot()` for runtime initialization.

As the project grows, domain logic should typically live in Eloquent models and dedicated service classes under `app/`, with HTTP-specific concerns remaining in controllers.

### Routing and HTTP layer

- `routes/web.php`
  - Defines browser-facing web routes. Currently only `GET /` is defined, returning the `welcome` Blade view.
  - Add additional pages and controllers here (e.g., dashboard pages, forms, etc.).
- `routes/console.php`
  - Place custom Artisan commands and scheduled tasks here.

HTTP requests enter via `public/index.php`, which boots the Laravel kernel and dispatches to route definitions in `routes/web.php`.

### Views and frontend (`resources/` + Vite)

- `resources/views/welcome.blade.php`
  - Default landing page using Tailwind-based markup.
  - Uses `@vite(['resources/css/app.css', 'resources/js/app.js'])` when Vite assets are available.
- `resources/css/app.css`
  - Tailwind CSS 4 entrypoint using `@import 'tailwindcss';`.
  - `@source` directives point Tailwind at Blade templates and views under `resources/` and generated view files under `storage/`.
  - Defines a custom font theme for the UI (`--font-sans`).
- `resources/js/app.js`
  - JavaScript entrypoint; currently imports `./bootstrap` (Laravel’s default JS bootstrap file under `resources/js`).

The asset pipeline is coordinated via:

- `vite.config.js`
  - Uses `laravel-vite-plugin` for Laravel asset integration.
  - Includes the Tailwind CSS Vite plugin (`@tailwindcss/vite`).
- `package.json`
  - `npm run dev` starts Vite.
  - `npm run build` builds production assets.

When adding new CSS/JS entrypoints or significant frontend pieces, update `vite.config.js` and reference them via `@vite` in your Blade templates.

### Configuration and environment

- `.env.example`
  - Template for environment configuration; copied to `.env` during `composer setup` or via the post-install script.
- `config/*.php`
  - Standard Laravel configuration files (app, database, cache, filesystem, logging, mail, queue, session, services, etc.).

Environment-specific settings (DB connection, mail drivers, queues, etc.) should be adjusted via `.env` and the corresponding `config/` files, not hard-coded in application code.

### Database and persistence

- `database/migrations/*.php`
  - Schema migrations for users, cache, and jobs tables (standard Laravel defaults).
- `database/factories/UserFactory.php`
  - Factory for generating test users.
- `database/seeders/DatabaseSeeder.php`
  - Entry point for seeding data; customize to seed application-specific data.

Tests run against an in-memory SQLite database configured in `phpunit.xml` (`DB_CONNECTION=sqlite`, `DB_DATABASE=:memory:`). When writing tests that hit the database, rely on migrations and factories rather than assuming a persistent DB.

### Testing structure

- `tests/Feature/`
  - HTTP- and framework-integrated tests (e.g., requests to routes, database interactions via Laravel’s testing helpers).
  - Example: `tests/Feature/ExampleTest.php` exercises the `/` route.
- `tests/Unit/`
  - Pure PHP unit tests independent of the full framework bootstrapping.
  - Example: `tests/Unit/ExampleTest.php`.
- `tests/TestCase.php`
  - Base Laravel test case for feature tests, bootstraps the application for each test case.

When adding new tests, place framework-aware tests under `tests/Feature` using `Tests\TestCase` and non-Laravel, pure PHP logic tests under `tests/Unit` using `PHPUnit\Framework\TestCase`.

### README and upstream docs

`README.md` is the stock Laravel README and does not contain project-specific instructions. For deeper details on framework behavior, refer to the official Laravel documentation at `https://laravel.com/docs` and related resources referenced there.
