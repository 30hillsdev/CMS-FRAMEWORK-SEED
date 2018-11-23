Cms_Framework_Seed package that provides settings management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `cms_framework_seed/settings`.

    "cms_framework_seed/settings": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Cms_Framework_Seed\Settings\Providers\SettingsServiceProvider::class,

And also add it to alias

    'Settings'  => Cms_Framework_Seed\Settings\Facades\Settings::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Cms_Framework_Seed\\SettingsTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Cms_Framework_Seed\Settings\Providers\SettingsServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Cms_Framework_Seed\Settings\Providers\SettingsServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Cms_Framework_Seed\Settings\Providers\SettingsServiceProvider" --tag="view"


## Usage


