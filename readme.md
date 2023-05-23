#PHP CUBE
######Cube is a minimal php framework (Sorta) for ....

Getting started is pretty much very easy as it is very straight-forward.

#####*Setting up.
Set up is very easy.
Upon download, In the root directory, there are 6 directories and 5 files.

**```/app```**: the app directory is where all your code and logic goes.

The app directory has 6 sub-folders

1. ```controllers```: This folder contains all route controllers

2. ```core:``` This folder contains 2 files. The ```routes.php``` file which should contain all the app's routes and the bootstrap file. Which can contain pretty much any other function/method you want to run on runtime.

3. ```helpers```: All the files here are automatically included for use on runtime. You can add all other custom methods here.

4. ```providers```: I see providers to be the link up between the model and the controller, since cube is a simple MVC framework, the provider should contain other logic classes that don't feel suitable in the controller (eg. re-usable methods/classes).

5. ```views```: This directory should contain all the view files. Using the ```dwoo/dwoo``` templating engine for cube.


**```/config```**: The config directory has 4 files in which 2 are required and the other 2 are optional.


1. ```app.php```: This contains the app's basic configuration


2. ```auth.php```: This is an option configuration file, It will be required when you want to use the authentication module


3. ```database.php```: This contains the database configuration


4. ```middleware.php```: This contains all middlewares selected to be used at runtime


**```/main```**: This contains all the frameworks source codes and methods.


**```/storage```**: This should contain all the assets required by your app.

**The assets you want public available (such as: css, javascript, images, etc) should be in ```storage/public``` directory**

**/vendor**: Composer installed modules

**/webroot**: As the name denotes, it typically receives and handles requests, sends requests and logic to the appropraite channels.

#####Files
**.env**: This should contain key and value pairs (Enviroment variables) and are available system wide with the ``` Env::get('key')``` method

**cube.php**: This is the Command-Line-Interface helper to run some specific tasks faster. Like creating a model, a controller and a provider.

###Adding Routes
Defining routes is very easy. Routes are defined in ```app/core/routes.php``` file

```php
#Use the router class
use Cube\Router\Router;

#Instance of router
$router = new Router();

#Now we can add routes
$router->get('/', 'MyController.index');
```
I assumed that you already have class ```App\Controllers\MyController``` created and it has method ```index```
So we assigned a route which will be listened to whenever the index of our app is sent a request via the "GET" request method.
You might want to assign a different controller controller when visited with any other request method eg. Post. 

```php
$router->post('/', 'MyController.indexPost');
```

But mostly we'd want same content displayed on the index via any request method right, We can:
```php
$router->any('/', 'MyController.index');
```

**Grouping routes**
To keep things clean, the **```Router::group()```** method is added so your routes can be grouped. Let's say you want to assign routes for users. We can:
```php
$router->group('/users', function ($route){

    #Basically, when the url http://yoursite.com/users/me
    #is visited, the UserController::self() method
    #gets called
    $route->get('/me', 'UserController.self');

    #User logout link
    $route->any('/logout', 'UserController.logout');
});
```
**Routing with attributes**


There are situations you want a value retrieved from the requested url, this is where the attributes come in:
```php
$router->get('/users/{:userid}', 'Users.getUser');
```
From the controller, the value for user id can be retrieved.
```php
public function getUser(Request $request, Response $response)
{
    $userId = $request->getAttribute('userid');
    //Or can also use
    //$request->userid;
    return $response->write('Hello user ' . $userid);
}
```
so if /users/1000 is visited, the above code should return
```Hello user 1000```

With the above method, any value can be specified for the userId parameter which at times might not be suitable due to one reason or another.
We can enforce only integer values by doing:
```php
$router->get('/users/{*int:userid}', 'UserController.getUser');
```
Other methods available are:

```{*string:name}```: Accept only strings values for attribute

```{*bool:name}```: Accept only true or false as value for attribute

You can as well use custom values:

```{value1|value2|value3:name}``` If the attribute did not fall within these values, it'll return a page not found error


**Using Closures Instead Of Controllers**

At some instances where there isn't the need to create a controller, cube allows to as well use closures instead

```php
$router->any('/book/{*int:id}', function (Request $request, Response $response) {
    //Do whatever logic
})
```

**Rendering Only Views On Routes**

Situations whereby, only a view has to be rendered when a route is visited, cube let's you save time. Instead of creating a controller then rendering a view like this.
```php
#Router file
$router->any('/about-us', 'SomeController.aboutUs');

#SomeController.php
public function aboutUs(Request $request, Response $response)
{
    return $response->view('pages.about');
}
```

It's easier and faster to do that like this:
```php
$router->any('/about-us', '@pages.about');
```