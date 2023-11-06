<?php namespace App\Http;
use Illuminate\Http\Request as Base;

class Request extends Base {

    public function secure()
    {
        return true;
    }

}
