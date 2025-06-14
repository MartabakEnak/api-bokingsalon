<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Data dummy, nanti bisa diganti dari database
        $orders = [
            [
                'id' => '#2632',
                'name' => 'Brooklyn Zoe',
                'address' => '302 Snider Street, RUTLAND, VT',
                'date' => '31 Jul 2020',
                'price' => '$64.00',
                'status' => 'Pending'
            ],
            [
                'id' => '#2633',
                'name' => 'John McCormick',
                'address' => '1096 Wiseman Street, CALMAR, IA',
                'date' => '01 Aug 2020',
                'price' => '$35.00',
                'status' => 'Dispatch'
            ],
            [
                'id' => '#2634',
                'name' => 'Sandra Pugh',
                'address' => '1840 Thorn Street, SALE CITY, GA',
                'date' => '02 Aug 2020',
                'price' => '$74.00',
                'status' => 'Completed'
            ],
        ];

        return view('admin', compact('orders'));
    }
}
