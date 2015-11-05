[![Latest Unstable Version](https://poser.pugx.org/amranidev/scaffold-interface/v/unstable)](https://packagist.org/packages/amranidev/scaffold-interface) [![License](https://poser.pugx.org/amranidev/scaffold-interface/license)](https://packagist.org/packages/amranidev/scaffold-interface)

# ScaffoldInterface
####this is a test version####

![Scaffold](https://d1zjcuqflbd5k.cloudfront.net/files/acc_443008/1gf7L?response-content-disposition=inline;%20filename=scaffoldinterface.png&Expires=1446730446&Signature=GxclGxMC-s0NnmSC7zc8CuhJkZtUaT-e0ahaxhHM3J1sl8R9w6Z1UDFmkeuPIbJ3hwPBII9tSyEbGZJ82bcCQgv-K0Lw-oxHBBePv3wLoj1Va1gDeteVmxAfIrd9NAebgLe2IuQ9Xq~PhTENJqWzhJXkDbctpgyUojqxfGKdNPU_&Key-Pair-Id=APKAJTEIOJM3LSMN33SA)


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