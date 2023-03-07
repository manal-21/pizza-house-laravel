<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Type;
use App\Models\Order;
use App\Models\Buyer;

class OrderController extends Controller
{
    public function index () {
        //$pizzas = Pizza::all();
        // $pizzas = Pizza::orderBy('title')->get();
        // $pizzas = Pizza::where('title', 'pizza1')->get();
        //$pizzas = Pizza::join('posts', 'users.id', '=', 'posts.user_id')->get(['users.*', 'posts.descrption']);
        //$orders = Order::join('buyers','orders.buyer_id','=','buyers.id')->select('orders.*','buyers.name')->get();
        
        $orders = Order::select('orders.*','buyers.name','pizzas.title')->join('buyers', 'orders.buyer_id', '=', 'buyers.id')
                        ->join('pizzas', 'orders.pizza_id', '=', 'pizzas.id')->get();
        
        return view('orders/index',['orders' => $orders]);
    }
    
    public function create () {
        $pizzas = Pizza::all();

        return view('orders/create', ['pizzas' => $pizzas]);
    }

    public function typeDropDownMenue () {
        
    }

    public function store() {
        $order = new Order();
        $order->pizza_id = request('pizza');
        $buyerName = request('buyer');
        $buyer = Buyer::where('name', $buyerName)->firstOrFail();
        $order->buyer_id = $buyer->id;
        $order->base = request('base');
        $order->toppings = request('toppings');
        $order->save();

        // return redirect('/')->with('key', 'value') the things inside the () are session data;
        return redirect('/')->with('mssg', 'Thanks for Ordering!');
    }

    public function show ($id) {
        //$order = Order::where('orders.id',$id)->firstOrFail();
        $order = Order::select('orders.*','buyers.name','pizzas.title')->join('buyers', 'orders.buyer_id', '=', 'buyers.id')
                        ->join('pizzas', 'orders.pizza_id', '=', 'pizzas.id')->where('orders.id',$id)->firstOrFail();
        //join('buyers','orders.buyer_id','=','buyers.id')->where('orders.id', '=', $id)->get(['orders.*','buyers.name']);

       // $order = Order::findOrFail('2')->join('buyers', 'orders.buyer_id', '=', 'buyers.id')
         //               ->join('pizzas', 'orders.pizza_id', '=', 'pizzas.id')->get(['orders.*','buyers.name','pizzas.title']);
        // $order = Order::join('buyers', function ($join) {
        //     $join->on('buyers.id', '=', 'orders.buyer_id')
        //          ->where('orders.id', 2)->firstOrFail();
        // })
        // ->get();
        return view('orders/details',['order' => $order]);
    }

    public function destroy ($id) {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect('/orders');
    }
}
