<?php

namespace App\Http\Controllers;

use App\Services\SimpleServices;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;

class SimpleController extends Controller
{
    /**
     * @var SimpleServices
     */
    private $simpleServices;
    //dependency inject service, class like a forward in constructor 2.way
    public function __construct(SimpleServices $simpleServices)
    {
        $this->simpleServices = $simpleServices;
    }
    //dependency inject service, class like a function parameter 1.way

    /**
     * @throws BindingResolutionException
     */
    public function index(Request $request, SimpleServices $simpleServices): array
    {
        $this->simpleServices->log('Start In index');
//        $this->check1($simpleServices); //$simpleServices like a forward function parameter
        $this->check1();
        return [1, 2, 3, $request->input('name')];
    }

    /**
     * @throws BindingResolutionException
     */
    private function check1() {
//        $simpleServices->log('Hello parameter check 1'); //$simpleServices like a forward function parameter
        $this->simpleServices->log('Hello forward constructor check1');
        $this->check2();

        //with app
        $simpleServicesWithApp = app()->make(SimpleServices::class);
        $simpleServicesWithApp->log('app make check1');
    }

    /**
     * @throws BindingResolutionException
     */
    private function check2()
    {
//        $simpleServices->log('Hello parameter check 2'); //$simpleServices like a forward function parameter
        $this->simpleServices->log('Hello forward constructor check2');

        //with app
        $simpleServicesWithApp = app()->make(SimpleServices::class);
        $simpleServicesWithApp->log('app make check2');
    }

}
