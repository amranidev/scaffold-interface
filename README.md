[![SensioLabsInsight](https://insight.sensiolabs.com/projects/de72e940-3c06-4664-b84c-425838cd68ea/big.png)](https://insight.sensiolabs.com/projects/de72e940-3c06-4664-b84c-425838cd68ea)

![Imgur](http://i.imgur.com/9PkXGOV.jpg)
[![Gitter chat](https://img.shields.io/badge/chat-gitter-F50057.svg)](https://gitter.im/amranidev-scaffold-interface/Lobby)
[![Build Status](https://travis-ci.org/amranidev/scaffold-interface.svg?branch=master)](https://travis-ci.org/amranidev/scaffold-interface)
[![StyleCI](https://styleci.io/repos/45497055/shield?style=flat)](https://styleci.io/repos/45497055)
[![Built For Laravel](https://img.shields.io/badge/built%20for-laravel-blue.svg)](http://laravel.com)
[![Total Downloads](https://poser.pugx.org/amranidev/scaffold-interface/downloads)](https://packagist.org/packages/amranidev/scaffold-interface)
[![Latest Stable Version](https://poser.pugx.org/amranidev/scaffold-interface/v/stable)](https://packagist.org/packages/amranidev/scaffold-interface)
[![Latest Unstable Version](https://poser.pugx.org/amranidev/scaffold-interface/v/unstable)](https://packagist.org/packages/amranidev/scaffold-interface)
[![License](https://poser.pugx.org/amranidev/scaffold-interface/license)](https://packagist.org/packages/amranidev/scaffold-interface)

![Scaffold](http://i.imgur.com/65uhrP7.gif)

<a target='_blank' rel='nofollow' href='https://app.codesponsor.io/link/bKdeKqXkWfXFQxjLF424dL9f/amranidev/scaffold-interface'>
  <img alt='Sponsor' width='888' height='68' src='https://app.codesponsor.io/embed/bKdeKqXkWfXFQxjLF424dL9f/amranidev/scaffold-interface.svg' />
</a>

### Features

+ Generate your models,views,constrollers,routes and migrations just in a few clicks.

+ Models visualization through a graph presentation (**New Feature**).

+ Views scaffolding support Bootstrap and Materialize css.

+ Generate (OneToMany,ManyToMany) relationships including views and controllers.

+ Websockets using [pusher notifications](https://www.github.com/pusher).

+ AdminLTE dashboard template with users management system (users-roles-permissions) using [laravel-permission](https://github.com/spatie/laravel-permission).

+ Softdeletes and timestamps.

+ A delete confirmation message.

+ Using an interface to design your table.

+ Rollback possibility.

+ Generate CRUD for packages, see [Lpackager](https://github.com/amranidev/lpackager), [CRUD for packages/modules](http://amranidev.github.io/blog/site/crud-generator-for-packages/).


### Installation

1. Run the following command:

 `composer require amranidev/scaffold-interface`

2. Add the service providers to config/app.php:

 ```php
Amranidev\ScaffoldInterface\ScaffoldInterfaceServiceProvider::class,
Amranidev\Ajaxis\AjaxisServiceProvider::class,
Spatie\Permission\PermissionServiceProvider::class,
Pusher\Laravel\PusherServiceProvider::class,
 ```

3. Publish the assets in your application with:

 `php artisan vendor:publish`

4. Run migrations:

 `php artisan migrate`

5. Authentication scaffolding:

 `php artisan make:auth`

6. Add HasRole dependency to app/User.php:

```php
<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
}
 ```
 
Congratulations, you have successfully installed Scaffold Interface!
 
### Detailed Documentation

[Full documentation](https://amranidev.github.io/scaffold-interface/docs).

### Contribution

 Any ideas are welcome. Feel free to submit any issues or pull requests.

#### Author

+ [Amrani Houssain](https://github.com/amranidev)

#### Credits

+ [Athi Krishnan](https://github.com/athikrishnan)
+ [JeroenG](https://github.com/Jeroen-G)
+ [All Contributors](../../contributors)


#### Contact : amranidev@gmail.com
