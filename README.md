# Setup sail

> [Official Laravel Documentation](https://laravel.com/docs/9.x/sail#main-content)

Download sail package

    composer require laravel/sail --dev

Install images

    php artisan sail:install

Create alias

    alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'


Up container

    sail up -d

To check running instance

    sail ps

Run migration 
    
    sail migrate 

Install packages

    yanr install 

Compile packages 
    
    yarn run dev 
