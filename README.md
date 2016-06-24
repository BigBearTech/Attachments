# BigBearTech Attachments
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/BigBearTech/Attachments/master/LICENSE.md)

## Installation

Install via [composer](https://getcomposer.org/) - In the terminal:
```bash
composer require bigbeartech/attachments
```

Now add the following to the `providers` array in your `config/app.php`
```php
BigBearTech\Attachments\AttachmentsServiceProvider::class,
```

and this to the `aliases` array in `config/app.php`
```php
"Attachment" => "BigBearTech\Attachments\Facades\Attachment",
```

Then you will need to run these commands in the terminal in order to copy the config and migration files
```bash
php artisan vendor:publish --provider="BigBearTech\Attachments\AttachmentsServiceProvider"
```

Before you run the migration you may want to take a look at `config/attachments.php` and change the `table` property to a table name that you would like to use. After that run the migration
```bash
php artisan migrate
```
