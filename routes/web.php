<?php

use App\Http\Controllers\SimpleController;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//What is Facade
//Why we need Facade Code is much cleaner, we do not worry about class initialization, everything
// on the Laravel, easy to test, easy dependency
//How to implement our own Facade

//cache()->set('name', 'Nikola');


/*
 * Facade call non-static function like a static function, "set" is not static function
 * Any Facade is simple class but extend Facade and just contain one function
 * "protected static function getFacadeAccessor()" and return binding name of Facade
 *
 */
//Cache::set('name', 'Nikola');
//dd(Cache::get('name'));

//CREATING OWN FACADE
class Fish {
    public function swim() {
        return 'swimming';
    }
    public function eat() {
        return 'eating';
    }
}

app()->bind('fish', function () {
    return new Fish;
});

class Bike {
    public function start() {
        return 'starting';
    }
}

app()->bind('bike', function () {
    return new Bike;
});

//CREATING FACADE

class Facade {
    /**
     * @throws BindingResolutionException
     */
    public static function __callStatic($name, $arg) {
//        return app()->make('fish')->$name();
        return app()->make(static::getFacadeAccessor())->$name();
    }

    protected static function getFacadeAccessor() {

    }
}
class FishFacade extends Facade {
//    /**
//     * @throws BindingResolutionException
//     */
//    public static function __callStatic($name, $arg) {
////        dd($name);//dump name of these function "anyRandomFunction"
//        return app()->make('fish')->$name();
//    }

    protected static function getFacadeAccessor() {
        return 'fish';
    }
}
class BikeFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'bike';
    }
}
//dd('test');
//FishFacade::anyRandomFunction(); //dump name of these function "anyRandomFunction"

dump(FishFacade::eat());//eatind
dump(FishFacade::swim());//swimming
dd(BikeFacade::start());//starting

//for now is all clean because we do not forward new Class like a parameter in new Fish()
//$fish = new Fish();
//dd($fish->swim());
