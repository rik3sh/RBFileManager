## Installation

Require this package with composer. It is recommended to only require the package for development.

```shell
composer require barryvdh/laravel-debugbar --dev
```
### Laravel without auto-discovery:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
rik3sh\RBFileManager\FileManagerServiceProvider::class,
```

#### Copy the package config to your local config with the publish command:

```shell
php artisan vendor:publish --provider="rik3sh\RBFileManager\FileManagerServiceProvider"
```

The file manager needs a new environment variable named `RB_DISK` and set it's value to either `public` or `s3` according to your file system needs.

If your preffered file system is `s3`, then you will need to enter your s3 bucket cerdentials in the default respective environment variables provided by laravel i.e. `AWS_ACCESS_KEY_ID`, `AWS_SECRET_ACCESS_KEY`, `AWS_DEFAULT_REGION` and `AWS_BUCKET`.

## Usage
Once installed you can do stuff like this:

```php

use rik3sh\RBFileManager\FileManager;

// Storing a new file
FileManager::storeFile($request->the_file_input_name, 'ANY_FOLDER_NAME_YOU_WANT');

// Replacing/Updating a new file
FileManager::updateFile($request->the_file_input_name, 'ANY_FOLDER_NAME_YOU_WANT', $oldfilename);
// The $oldfilename is optional. If $oldfilename is provided, the new file will replace it.

// Deleting a file
FileManager::deleteFile('ANY_FOLDER_NAME_YOU_WANT', $filename);

```
