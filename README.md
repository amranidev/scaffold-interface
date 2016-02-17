[![Build Status](https://travis-ci.org/amranidev/scaffold-interface.svg?branch=master)](https://travis-ci.org/amranidev/scaffold-interface)
[![Latest Stable Version](https://poser.pugx.org/amranidev/scaffold-interface/v/stable)](https://packagist.org/packages/amranidev/scaffold-interface)
[![Latest Unstable Version](https://poser.pugx.org/amranidev/scaffold-interface/v/unstable)](https://packagist.org/packages/amranidev/scaffold-interface)
[![License](https://poser.pugx.org/amranidev/scaffold-interface/license)](https://packagist.org/packages/amranidev/scaffold-interface)

# ScaffoldInterface (CRUD Generator)

![Scaffold](http://i.imgur.com/62HTlvT.png)

####Features :

+ Generate your model,views,controller and migrations just in few clicks.

+ Generate OneToMany relationship.

+ Generate dashboard template.

+ Delete confirmation message.

+ Using an interface to design your table.

+ Rollbacking possibility.

+ Craft your laravel application faster and easier.

###What's new in v1.2.x

+ A helper FAB button.

+ Migration button.

+ Table rollback (database) button.

+ Dashboard template generate.

###I. Package installation

  1. Add scaffold-interface to your composer.json file to require Scaffold-Interface :
  
    ```json
    require : {
    "laravel/framework": "5.2.*",
    "Amranidev/scaffold-interface": "v1.2.*"
    }
    ```

  2. Update Composer :

  
    ```
    composer update
  
    ```

  3. Add the service provider to config/app.php :

    ```php

    Amranidev\ScaffoldInterface\ScaffoldInterfaceServiceProvider::class,
    Amranidev\Ajaxis\AjaxisServiceProvider::class,
  
    ```

  4. Publish assets in your application with :

    ```
    $ php artisan vendor:publish
  
    ```

  5. Migrate scaffoldinterface :
  
    ```
    $ php artisan migrate

    ```

Congratulations, you have successfully installed Scaffold Interface!

###II. Usage
  
  1. Access to scaffold interface :
    
     http://{your-project}/scaffold to get into scaffoldinterface.
  
  2. Table creation :

     create your table . you can add many of attributes such like (String,date,longtext,etc.) 

  3. After creation :
     
     to complete your scaffolding . go to your terminal and type.  
     
     ```
     $ php artisan migrate
     
     ```
  
  4. Finally :
     
     scaffolding it's done. go to http://{your-project}/{your-model} 
      
  5. Rollback  

      Now if you want to rollback your table just check this
      
      ![Imgur](http://i.imgur.com/dnYc2ZE.png)

      Before you make your rollback make sure that you have rollbacked your table from database and avoid to keep routes recoureces.
  
  6. OneToMany Relationship
      
      example : 

      basically we want to generate a small app that contain (Clients , Products , Orders). 

      so the Orders must include the Clients and products foreign keys. 
      then first things first is to generate Clients and Products normally. 
      
      after that you could generate Orders and adding two relation to Clients and products.

  7. Check this out
      
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

 - [x] Add a select for OneToMany (on data fields) in interface.  
 - [x] Laravel 5.2 supported.
 - [x] Laravel 5.1 supported.

####contact : amranidev@gmail.com