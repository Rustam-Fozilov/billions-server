<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function ordersCount()
    {
        return $this->success('test message');
    }
}
