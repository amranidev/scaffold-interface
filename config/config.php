<?php

    /*
     |-----------------------------------------------------------------
     | Default Files Storage , (Model , Views , Controller , Migration)
     |-----------------------------------------------------------------
     |
     | Here is where you can register you storage paths.
     |
     |*/

  return [
    
        'model' => app_path(),

        'views' => base_path('resources/views'),
        
        'controller' => app_path('Http/Controllers'),
        
        'migration' => database_path('migrations'),

        'routes' => app_path('Http/routes.php')
    
    ];