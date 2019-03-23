# Slick Framework

This framework is based off the [Slim Framework][1], but adds some conveniences, like the ability to instantiate
controllers with action methods wherever you would use a closure when routing (this feature came directly from [rka-slim-controller][2]).

The controller can optionally be loaded from DI container, allowing you to inject dependencies as required.

Mostly this copy-pastes and rewrites only base Slim app class, so this still depends on Slim2 framework.
It requires **PHP 5.3** at least, assumes that you install it with composer and use Composer's autoloader.

[1]: http://www.slimframework.com/
[2]: https://github.com/akrabat/rka-slim-controller

## Additional to Slim2 features
- Configuring routes with Yaml file
- Support for Controller classes in routing config

## Installation

    composer require ed-sukharev/slick-framework


## Usage

Use the string format `{controller class name}:{action method name}`
wherever you would usually use a closure:

e.g.

    $app = new \Slick\Slick();
    $app->get('/hello:name', 'App\IndexController:home');


You can also register the controller with Slim's DI container:

    $app = new \Slick\Slick();

    $app->container['App\IndexController'] = function ($container) {
        // Retrieve any required dependencies from the container and
        // inject into the constructor of the controller

        return new \App\IndexController();
    };

    $app->get('/', 'App\IndexController:index');


## Controller class methods

Just as Slim does, Slick passes controller actions it's arguments. Additionally, if the first argument of controller
action is type hinted as `\Slim\Http\Request`, then actual request will be passed in as first parameter, and then the 
rest of Slim parameters.
*Slick* assumes that you inject all dependencies into your controller inside DI container. For that rare case when you 
still need DI container, Slick provides `\Slick\ContainerAwareInterface`, which you may implement in controller, 
or better yet, extend you controller from `\Slick\SlickController`.
Slick will set *PSR-11* compatible DI container into it.
