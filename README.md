[![Build Status](https://travis-ci.org/amranidev/scaffold-interface.svg?branch=master)](https://travis-ci.org/amranidev/scaffold-interface)
[![Latest Stable Version](https://poser.pugx.org/amranidev/scaffold-interface/v/stable)](https://packagist.org/packages/amranidev/scaffold-interface)
[![Latest Unstable Version](https://poser.pugx.org/amranidev/scaffold-interface/v/unstable)](https://packagist.org/packages/amranidev/scaffold-interface)
[![License](https://poser.pugx.org/amranidev/scaffold-interface/license)](https://packagist.org/packages/amranidev/scaffold-interface)

## A Smart CRUD Generator

![Scaffold](http://i.imgur.com/65uhrP7.gif)

####Features :

+ Generate your model,views,controller and migrations just in a few clicks.

+ Views support Bootstrap and Materializecss.

+ Generate OneToMany relationships including views and controllers.

+ Generate a dashboard template.

+ A delete confirmation message.

+ Using an interface to design your table.

+ Rollbacking possibility.

+ Craft your laravel application faster and easier.

###I. Package installation

  1. Run composer require to install Scaffold-Interface :
  
    ```
    composer require Amranidev/scaffold-interface:1.3.*
  
    ```

    Or add in composer.json: 
    
    ```json
    require : {
        "laravel/framework": "5.1.*",
        "Amranidev/scaffold-interface": "v1.3.*"
    }
    ```
    
    Then update composer :
    
    ```
    $ composer update
    ```
    
  3. Add the service providers to config/app.php :

    ```php

    Amranidev\ScaffoldInterface\ScaffoldInterfaceServiceProvider::class,
    Amranidev\Ajaxis\AjaxisServiceProvider::class,
  
    ```

  4. Publish the assets in your application with:

    ```
    $ php artisan vendor:publish
  
    ```

  5. Migrate for the Scaffold Interface table:
  
    ```
    $ php artisan migrate

    ```

Congratulations, you have successfully installed Scaffold Interface!

###II. Usage
  
  1. Access to Scaffold Interface:
    
     http://{your-project}/scaffold to get into Scaffold Interface.
  
  2. Table creation:

     You can add many of attributes such as a string, date, longtext,etc.

  3. After the creation, to complete your scaffolding, go to the terminal and run:  
     
     ```
     $ php artisan migrate
     
     ```
  
  4. Finally:
     
     Go to http://{your-project}/{your-model} to see the result.
      
  5. Rollback  

      If you want to rollback the table just check this:
      
      ![Imgur](http://i.imgur.com/dnYc2ZE.png)

      Before you make your rollback make sure that you have rolled back your table in the database.
  
  6. OneToMany Relationship
      
      Example: 

      Basically we want to generate a small app that contain Clients, Products and Orders. 

      So the Orders must include the Clients and products foreign keys. 
      The first thing to do is to generate the Clients and Products normally. 
      
      After that you could generate Orders and adding two relations to Clients and Products.

  7. Check this out:
      
     Add (route::group) to *vendor/amranidev/scaffold-interface/src/Http/routes.php* if you're using **laravel 5.2** 
      
```php
  Route::group(['middleware' => 'web'], function () {

    Route::get('scaffold', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@index');

    Route::post('scaffold/guipost', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@store');

    Route::get('scaffold/guirollback/{id}', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@destroy');

    Route::get('scaffold/guidelete/{id}', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@deleteMsg');

    Route::get('scaffold/getAttributes/{table}', '\Amranidev\ScaffoldInterface\Http\Controllers\GuiController@GetResult');

  });
```

####Contribution

 Any ideas are welcome. Feel free to submit any issues or pull requests.

####TODOS

 - [ ] 100% Code coverage + Maximum code quality.

####DONE
  
 - [x] Improve Vuejs.
 - [x] Add a select for OneToMany (on data fields) in interface.  
 - [x] Laravel 5.2 supported.
 - [x] Laravel 5.1 supported.

####contact : amranidev@gmail.com
