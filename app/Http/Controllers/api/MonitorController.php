<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MonitorResource;
use App\Models\Lab;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function monitorData(){
        return MonitorResource::collection(Lab::with('user')->get());
    }
}
