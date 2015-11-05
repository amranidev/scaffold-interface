[![Latest Unstable Version](https://poser.pugx.org/amranidev/scaffold-interface/v/unstable)](https://packagist.org/packages/amranidev/scaffold-interface) [![License](https://poser.pugx.org/amranidev/scaffold-interface/license)](https://packagist.org/packages/amranidev/scaffold-interface)

# ScaffoldInterface
####this is a test version####

![Scaffold](http://i.imgur.com/KHDtfP1.png)


Scaffold Interface for laravel v5.1 using materailize

####features :

+ Generate your model,views,controller and migrations just in few clicks.

+ Rollbacking possibility.

+ Using an interface to design your table

#Package installation#

1. Add scaffold-interface to your composer.json file to require Ajaxis :

```json
require : {
"laravel/framework": "5.1.*",
"Amranidev/scaffold-interface": "dev-master"
}
```

Update Composer :


```
composer update

```

2. Add the service provider to config/app.php :

```php

Amranidev\ScaffoldInterface\ScaffoldInterfaceServiceProvider::class,
Amranidev\Ajaxis\AjaxisServiceProvider::class,

```

3. Publish assets in your application with :

```
php artisan vendor:publish

```

4. Migrate scaffoldinterface

```
php artisan migrate

```

Congratulations, you have successfully installed Scafold !

###contact : amranidev@gmail.com