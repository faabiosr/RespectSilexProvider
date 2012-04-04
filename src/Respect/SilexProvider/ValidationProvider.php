<?php

namespace Respect\SilexProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;

use Respect\Validation\Validator as v;

class ValidationProvider implements ServiceProviderInterface
{
    
    public function register(Application $app)
    {
        $app['respect.validation'] = $app->share(function() use ($app){
            
            return v::create();
            
        });
    }
}