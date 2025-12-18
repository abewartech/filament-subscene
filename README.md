# Filament Subscene

[![Latest Version](https://img.shields.io/packagist/v/abewartech/filament-subscene.svg?style=flat-square)](https://packagist.org/packages/abewartech/filament-subscene)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/abewartech/filament-subscene?style=flat-square)](https://www.php.net/)
[![License](https://img.shields.io/github/license/abewartech/filament-subscene?style=flat-square)](./LICENSE)
[![Tests](https://img.shields.io/github/actions/workflow/status/abewartech/filament-subscene/tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/abewartech/filament-subscene/actions)
[![Total Downloads](https://img.shields.io/packagist/dt/abewartech/filament-subscene.svg?style=flat-square)](https://packagist.org/packages/abewartech/filament-subscene)

<!-- GitAds-Verify: 7QHRIBAPZUV65K3BGWQLS5C9CD3NO2RL -->

## GitAds Sponsored
[![Sponsored by GitAds](https://gitads.dev/v1/ad-serve?source=abewartech/filament-subscene@github)](https://gitads.dev/v1/ad-track?source=abewartech/filament-subscene@github)

![image](https://github.com/abewartech/filament-subscene/assets/29395602/034f24c4-9db0-4c45-badf-d7787340bf6b)

![image](https://github.com/abewartech/filament-subscene/assets/29395602/4c75cfb1-bb3d-47e3-8ccd-4e719cc3ca6d)

Filament Subscene is a Laravel package that integrates the Subscene subtitles catalog directly into your Filament admin panel.  
It lets you search, browse, and attach subtitles to your media resources without leaving your application.

---

## Features

- 🔍 Search Subscene for subtitles from within Filament
- 🎬 Associate subtitles with your own movie/series models
- 📥 Download and store subtitles locally
- 🌐 Support for multiple languages (depending on Subscene availability)
- 🧩 Seamless integration with existing Filament resources and pages
- ⚙️ Configurable endpoints, storage paths, and authorization

---

## Screenshots

> The following are example placeholders. Replace `screenshots/screen*.png` and captions with real application screenshots when available.

| ![Screenshot 1](screenshots/screen1.png) | ![Screenshot 2](screenshots/screen2.png) | ![Screenshot 3](screenshots/screen3.png) |
|:---:|:---:|:---:|
| *Subtitles search in Filament* | *Subtitle details panel* | *Attaching subtitles to a movie* |

---

## Installation

Ensure you have a working Laravel + Filament application before installing this package.

```bash
# Using Composer
composer require abewartech/filament-subscene
```

If the package ships with assets and configuration (typical for Filament packages), publish them:

```bash
php artisan vendor:publish --provider="Abewartech\FilamentSubscene\FilamentSubsceneServiceProvider" --tag="filament-subscene-config"
php artisan vendor:publish --provider="Abewartech\FilamentSubscene\FilamentSubsceneServiceProvider" --tag="filament-subscene-migrations"
php artisan migrate
```

If you are using Vite to build the front-end assets, rebuild them after installation:

```bash
npm install
npm run build    # or: npm run dev
```

---

## Usage

Once installed, the package should automatically register its Filament pages/panels via package discovery.

### Accessing the Subscene pages

After logging into your Filament panel, you should see a new navigation item (for example, **Subtitles** or **Subscene**) in the sidebar. Click it to:

- Search for subtitles by movie or series name
- Filter by language
- View available releases and details
- Download and attach a subtitle to your own models

### Example: Attaching subtitles to your Movie model

Below is a high-level example of how you might integrate this package into your own domain models.

```php
// app/Models/Movie.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'year',
        'subtitle_path',
    ];

    public function hasSubtitle(): bool
    {
        return ! is_null($this->subtitle_path);
    }
}
```

Then in a custom Filament resource, you can expose your subtitle field:

```php
// app/Filament/Resources/MovieResource.php

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;

class MovieResource extends Resource
{
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\TextInput::make('year'),
            Forms\Components\TextInput::make('subtitle_path')
                ->label('Subtitle File')
                ->helperText('Path to the downloaded subtitle file from Subscene'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            // ...
        ]);
    }
}
```

The package’s Filament pages can then be used to fetch and store subtitles; you only need to point your own logic to the stored files.

### Configuration

After publishing the config file (for example `config/filament-subscene.php`), you can tweak:

- API or scraping settings
- Default language
- Storage disk and path for downloaded subtitles
- Authorization gates or policies

---

## Project Structure

This is a standard Laravel + Filament project. Some notable paths:

```text
app/
  ├─ Models/           # Your Eloquent models
  ├─ Providers/        # Application and route service providers
  └─ ...
config/
  ├─ app.php           # Core application configuration
  ├─ database.php      # Database connection configuration
  └─ filament-subscene.php  # (After publish) Package configuration
resources/
  ├─ views/            # Blade templates
  ├─ js/               # Vite / front-end assets
  └─ css/
routes/
  ├─ web.php           # Web routes
  └─ api.php           # API routes
tests/
  └─ Feature/ and Unit/ tests
```

---

## Technologies

This project is built on top of the following technologies:

- ![PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white&style=for-the-badge)
- ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?logo=laravel&logoColor=white&style=for-the-badge)
- ![Filament](https://img.shields.io/badge/Filament-EB3A8A?style=for-the-badge)
- ![MySQL](https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white&style=for-the-badge)
- ![Node.js](https://img.shields.io/badge/Node.js-339933?logo=node.js&logoColor=white&style=for-the-badge)
- ![Vite](https://img.shields.io/badge/Vite-646CFF?logo=vite&logoColor=white&style=for-the-badge)
- ![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-06B6D4?logo=tailwind-css&logoColor=white&style=for-the-badge)

---

## Contributing

Contributions are welcome and appreciated.

1. Fork the repository
2. Create a new feature branch:
   ```bash
   git checkout -b feature/my-new-feature
   ```
3. Make your changes and add tests where appropriate
4. Run the test suite:
   ```bash
   php artisan test
   ```
5. Commit your changes with a clear message:
   ```bash
   git commit -m "feat: add amazing new feature"
   ```
6. Push the branch and create a Pull Request

Please follow the existing code style and conventions. Any changes that affect the public API should be documented in the README.

---

## Security Vulnerabilities

If you discover a security vulnerability, please send an e-mail to the maintainer listed on the Packagist page for this package. All security vulnerabilities will be promptly addressed.

---

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). See the [`LICENSE`](./LICENSE) file for details.

