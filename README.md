
# PHP Boilerplate for IM



## Guide


Entry point for every php files goes here.

```bash
    index.php
```


Core
-  
- Classes like Database, Router, Response are within this directory, optionally you can add a middleware directory.

```bash
    Core
    |
    |---> Database.php
    |---> Router.php
```


Controllers
-  
-  The controllers files handles the logic for your web application such as fetching data from the database. 
- The "require(___.view.php)" statement is for the UI.

```bash
    controllers dir
```

Views
- 
-  The views files are for front end, it handles rendering of component to the browser. 
- The partials directory are for components like nav, footer, and  header to avoid redundancy and for cleaner integration of the components.

```bash
    views dir
    |
    |---> partials
          |
          |---> nav.php
```

Config file
- 
- Inside the config file are the details for the database connection.
```bash
    return[
        // just change the dbname in here, the rest are default 
        'database' => [
            'host' => 'localhost',
            'port' => '3306',
            'dbname' => 'myapp',
            'charset' => 'utf8mb4'
        ]
    ];
```


Routes file
- 
- This file handles the http request to the server. e.g if you want to get or view the about page then you will use the "get" method from the router class.
- The params of each router method are URI and Controllers.
- There are different http request, you can view it in the Core\Router.php
```bash
    $router->get('/about', 'controllers/about.php');
    $router->post('/contact', 'controllers/store.php');
    $router->patch('/contact', 'controllers/update.php');
```

