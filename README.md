# Automated Music Site
Automated music download platform using Laravel 5.4.

Exact clone of http://www.leakedearly.com 100% automated.

# Laravel 5.4 based automated music download platform.
To install upload files to server, you may need to change your DocumentRoot to reflect the public directory provided in script.

Make storage directory and all directories within it writable (777).

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

# How TF do I install this on cPanel?
Create a directory named "clone" at the same level as public_html. i.e.
 - domain.com
   - clone
   - public_html
   
Now upload the script files into the clone directory.

Using SSH cd to /var/www/yourdomain.com, delete your public_html directory and replace it with a shortcut leading to clone/public.
```
cd /var/www/yourdomain.com
rm -rf public_html
ln -s clone/public/ public_html
```

# If you use the script buy me a beer or a spliff!
Bitcoin: 1HXARUmfLSwyqyMC2yTAktwQh61SVFCQaN
