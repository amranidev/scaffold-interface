[![Build Status](https://travis-ci.org/amranidev/scaffold-interface.svg?branch=master)](https://travis-ci.org/amranidev/scaffold-interface)
[![Latest Stable Version](https://poser.pugx.org/amranidev/scaffold-interface/v/stable)](https://packagist.org/packages/amranidev/scaffold-interface)
[![License](https://poser.pugx.org/amranidev/scaffold-interface/license)](https://packagist.org/packages/amranidev/scaffold-interface)

# ScaffoldInterface (CRUD Generator)

![Scaffold](http://i.imgur.com/oDl3i1N.png)

Scaffold Interface for laravel. it's simple and useful

>Generate OneToMany RelationShip just in few clicks available only on dev-master.


>if you want to test it. Require dev-master.


####Features :

+ Generate your model,views,controller and migrations just in few clicks.

+ OneToMany relationship . only (dev-master)

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
     
     scaffolding it's done. go to http://{your-project}/scaffold 
      
  5. Rollback  

      Now if you want to rollback your table just check this
      
      ![Imgur](http://i.imgur.com/dnYc2ZE.png)

      Before you make your rollback make sure that you have rollbacked your table from database and avoid to keep routes recoureces.

####Contribution

 Any ideas are welcome. Feel free to submit any issues or pull requests.

####contact : amranidev@gmail.com
