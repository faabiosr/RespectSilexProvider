<?php

namespace Respect\SilexProvider;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Respect\SilexProvider;


class ValidationProviderTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        if(!is_file(__DIR__.'/../../../src/Respect/Validation/Validator.php'))
        {
            $this->markTestSkipped('Respect\Validation was not installed');
        }
    }
    
    public function testRegister()
    {
        $app = new Application();
        
        $app->register(new ValidationProvider());        
        
        $app->get('/',function() use ($app){
            return $app['respect.validation']->numeric()->validate(rand(0,2000));
        });        
        
        $request = Request::create('/');
        $response = $app->handle($request);        
        
        $this->assertInstanceOf('Respect\\Validation\\Validator',$app['respect.validation']);
        $this->assertEquals(TRUE,$response->getContent());
    }
}