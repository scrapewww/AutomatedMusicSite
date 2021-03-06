[https://mp3foo.com](https://mp3foo.com "Mp3 Search Engine")

# Automated Music Site
Automated music download platform using Laravel 5.4.

Exact clone of [http://www.leakedearly.com](http://www.leakedearly.com "Hip Hop MP3 Download") 100% automated.

# Laravel 5.4 based automated music download platform.
To install upload files to server, you may need to change your DocumentRoot to reflect the public directory provided in script.

# Requirements
 - PHP >= 5.6.4
 - OpenSSL PHP Extension
 - PDO PHP Extension
 - Mbstring PHP Extension
 - Tokenizer PHP Extension
 - XML PHP Extension
 - Fileinfo Extension
 
 # Installation
 - Make bootstrap/cache directory and all it's contents writable (777).
 - Make storage directory and all directories within it writable (777).

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

# Need help?
Add me on Skype! Username: AmbitionPHP or on BHW username [selfpaidinc](https://www.blackhatworld.com/members/selfpaidinc.786559/)

# F help, install it for me!
$20 via bitcoin and I'll install it for you. Must have vps, dedicated, aws, etc that meets the above requirements.

# Install Wizard Preview
Step 1
![Install Wizard Step 1](http://i.imgur.com/PXtEFaR.png)

Step 2
![Install Wizard Step 2](http://i.imgur.com/rV8klN9.png)

Wizard Finished
![Platform Homepage](http://i.imgur.com/9eQCHar.jpg)
