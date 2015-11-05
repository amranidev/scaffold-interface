[![Latest Unstable Version](https://poser.pugx.org/amranidev/scaffold-interface/v/unstable)](https://packagist.org/packages/amranidev/scaffold-interface) [![License](https://poser.pugx.org/amranidev/scaffold-interface/license)](https://packagist.org/packages/amranidev/scaffold-interface)

# ScaffoldInterface
####this is a test version####

![Scaffold](http://d.pr/i/1gf7L)


Scaffold Interface for laravel v5.1 using materailize

####features :

+ generate your model,views,controller and migrations just in few clicks.

+ rollbacking possibility.

+ using an interface to design your table

#Package installation#

Add scaffold-interface to your composer.json file to require Ajaxis :

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

The next required step is to add the service provider to config/app.php :

```php

Amranidev\ScaffoldInterface\ScaffoldInterfaceServiceProvider::class,
Amranidev\Ajaxis\AjaxisServiceProvider::class,

```

The next required step is to publish assets in your application with :

```
php artisan vendor:publish

```

The last required step is to migrate scaffoldinterface

```
php artisan migrate

```

Congratulations, you have successfully installed Scafold !

###contact : amranidev@gmail.com