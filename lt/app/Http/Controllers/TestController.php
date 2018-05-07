<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mol;
use Validator,Hash;
use DB;

class TestController extends Controller
{
    public function __construct() {
        $sel = new mol();
        $data["name"] = "zhanghui";
        $sel->add("demo_test", $data);
    }
}
