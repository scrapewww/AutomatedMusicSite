# Automated Music Site
Automated music download platform.

Laravel based automated music download platform.
To install upload files to server, you may need to change your DocumentRoot to reflect the public directory provided in script.

Visit yoursite.com and you'll be prompted with an install wizard.
After you complete the wizard set the your cron job correctly.
* * * * * php /path-to-this-script/artisan schedule:run >> /dev/null 2>&1

thanks and other things coming soon.
