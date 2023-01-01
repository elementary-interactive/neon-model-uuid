# NEON &mdash; UUID

This Trait is one of the very basic parts of the NEON. It turns Laravel Eloquent Model to use UUID as primary key.

## Installation

You can install the package via composer:

``` bash
composer require neon/model-uuid
```

This will install the Trait itself.

## Usage

To use it on a Model, you have to make the migration ready to use string key isntead of incrementing integer:

```php
  /** Create `awesome_uuids` table.
   * 
   * @return void
   */
  public function up()
  {
    Schema::create('awesome_uuids', function (Blueprint $table) {
      $table->uuid('id')
        ->primary();
    });
  }
```

You just should use the Trait on the Model.

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Neon\Models\Traits\Uuid;

class AwesomeUuid extends Model
{
    use Uuid;
}
```

## How It Works?

The trait initializes itself to change to related attribute of a model:
- `incrementing` is set to false.
- `keyType` is set to "string".

The model's booting is also changed: After the model is booted, a UUID being set as primary key value. This is like auto incrementing a number, but set it on PHP side not on database side.

<!-- ## Credits -->

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.