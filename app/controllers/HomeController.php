<?php

class HomeController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
     */

    public function showWelcome(){
        return View::make('hello');
    }

    public function updateDBVersion(){
        $filename = 'CampsDB.db';
        if (file_exists($filename)) {
            if (filemtime($filename) <= strtotime(file_get_contents('dbmtime.txt'))) {
                //echo "Old version";
            } else {
                //echo "Newer version";
                //Save new modification date
                file_put_contents('dbmtime.txt', date("F d Y H:i:s.", filemtime('dbmtime.txt')));
                //Add +1 to version in file
                file_put_contents('version.txt', file_get_contents('version.txt')+1);
                //print version number
            }
            return file_get_contents('version.txt');
            //echo "$filename was last modified: " . date ("F d Y H:i:s.", filemtime($filename));
        }
        
    }

}
