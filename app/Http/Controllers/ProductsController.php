<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $title = 'Laravel Beginner from Nguyen Trung Hung';
        //truyen bang = compact
        $x = 1;
        $y = 3.5;
        $z = 's';
        // return view('products.index', compact('title', 'x', 'y', 'z'));

        //truyen bang with -> chi chuyen dc 1 => không hay
        // $name = 'Hung';
        // return view('products.index')->with('name', $name);

        //associative array
        // $myphone = [
        //     'name' => 'iphone 14',
        //     'year' => 2024
        //     'isFavorited' => true
        // ];
        // return view('products.index', compact('myphone'));
        print_r(route('products'));
        return view('products.index');
    }
    public function about()
    {
        return 'This is About page';
    }
    // public function details($id)
    // {
    //     // return "product's id is: $id";
    //     return view('products.index', ['product' => ['name' => 'iphone Ne', 'year' => '2024']]);
    // }
    // public function details($productName)
    // {
    //     $phone = ['iphone' => 'iphone 11'];
    //     $samsung = ['samsung' => 'samsung s24'];
    //     $oppo = ['oppo f11' => 'oppo 11 pro hehe'];
    //     // return "product's id is: $id";
    //     return view('products.index', ['product' => $samsung[$productName] ?? 'unknow products']);
    // }
    public function details($productName, $id)
    {
        return "product's name is: $productName";
        return ", product's id is: $id";
        return view('products.index', compact('product'));
    }
}
