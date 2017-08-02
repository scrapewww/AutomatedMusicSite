# Automated Music Site
Automated music download platform.

Exact clone of http://www.leakedearly.com 100% automated.

# Laravel based automated music download platform.
To install upload files to server, you may need to change your DocumentRoot to reflect the public directory provided in script.

Visit yoursite.com and you'll be prompted with an install wizard.
After you complete the wizard set the your cron job correctly.
```
* * * * * php /path-to-this-script/artisan schedule:run >> /dev/null 2>&1
```
thanks to:
 - Intervention Image (https://github.com/Intervention/image)
 - Laravel Page Visit Counter (https://github.com/cyrildewit/laravel-page-visits-counter)
 - laravel-sitemap package (https://github.com/RoumenDamianoff/laravel-sitemap)
 - php-curl (https://github.com/anlutro/php-curl)
