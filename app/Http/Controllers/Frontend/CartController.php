<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\cart;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $id=Auth::user()->id;
        $cart=Cart::where('user_id',$id)->get();
        return view('Frontend.cart.item',compact('cart'));
    }
    public function create($id){
        // dd($id);
        if(Auth::check()){
        $check=Cart::where('post_id',$id)->where('user_id',Auth::user()->id)->first();
        if (!$check) {
            $cart=new cart();
            $cart->user_id=Auth::user()->id;
            $cart->post_id=$id;
            $cart->save();
            return redirect()->route('cart.item')->with('msg','Asset successfully Added to Cart.');
        }
       else{
        return redirect()->route('cart.item')->with('msg','This asset already added to cart.');
       }
    }
    else{
        return redirect()->route('login')->with('msg','You have to login first!');
    }
    }
   public function delete($user){
    Cart::destroy($user);
    return redirect()->back()->with('msg','Item removed from Cart!');
    }

   }

