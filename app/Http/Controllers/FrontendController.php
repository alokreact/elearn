<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function about()
    {

        return view('eclipse-interface.about');
    }

    public function course()
    {

        return view('eclipse-interface.courses');
    }

    public function features()
    {

        return view('eclipse-interface.features');
    }

    public function contact(){

        return view('eclipse-interface.contact');
    }

    // public function addToCart($id){
    //     // $package = Course::findOrFail($id);

    //     $lab = \App\Lab::where(['id' => $package->lab_name])->first();


    //     $cart = session()->get('cart', []);

    //     if (isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             "name" => $package->package_name,
    //             "price" => $package->price,
    //             "lab_name" => $lab->lab_name,
    //             "quantity" => 1
    //         ];
    //     }

    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success', 'Product add to cart successfully!');
    // }

    public function cart()
    {
        return view('cart');
    }


}
