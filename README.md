[![Build Status](https://travis-ci.org/amranidev/scaffold-interface.svg?branch=master)](https://travis-ci.org/amranidev/scaffold-interface)
[![Latest Stable Version](https://poser.pugx.org/amranidev/scaffold-interface/v/stable)](https://packagist.org/packages/amranidev/scaffold-interface)
[![License](https://poser.pugx.org/amranidev/scaffold-interface/license)](https://packagist.org/packages/amranidev/scaffold-interface)

# ScaffoldInterface (CRUD Generator)

![Scaffold](http://i.imgur.com/KHDtfP1.png)


Scaffold Interface for laravel v5.1 it's simple and useful


####features :

+ Generate your model,views,controller and migrations just in few clicks.

+ Delete confirmation message.

+ Using an interface to design your table.

+ Rollbacking possibility.

+ Template changing possibility.

+ Craft your laravel application faster and easier.

###I. Package installation

  1. Add scaffold-interface to your composer.json file to require Scaffold-Interface :

    ```json
    require : {
    "laravel/framework": "5.1.*",
    "Amranidev/scaffold-interface": "1.0.*"
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
    
    "localhost:8000/scaffold" to get into scaffoldinterface.
  
  2. Table creation :

     create your table . you can add many of attributes such like (String,date,longtext,etc.) 

  3. After creation :
     
     to complete your scaffolding . go to your terminal and type.  
     
     ```
     $ php artisan migrate
     
     ```
  
  4. Finally :
     
     scaffolding it's done. just check it. for example : localhost:8000/product   

####Contribution

 Any ideas are welcome. Feel free to submit any issues or pull requests

####contact : amranidev@gmail.com
