<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Carrier;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
       
        $shopId = Auth::user()->shop_id ?? null;

        
        $carrierCount = Carrier::where('shop_id', $shopId)->count();
        $areaCount = Area::where('shop_id', $shopId)->count();
        $customerCount = Customer::where('shop_id', $shopId)->count();

        return view('home', compact('carrierCount', 'areaCount', 'customerCount'));
    }
}
