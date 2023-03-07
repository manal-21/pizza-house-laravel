<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Type;

class PizzaController extends Controller
{
    public function index () {
        //$pizzas = Pizza::all();
        // $pizzas = Pizza::orderBy('title')->get();
        // $pizzas = Pizza::where('title', 'pizza1')->get();
        //$pizzas = Pizza::join('posts', 'users.id', '=', 'posts.user_id')->get(['users.*', 'posts.descrption']);
        $pizzas = Pizza::join('type','pizzas.type_id','=','type.id')->select('pizzas.*','type.type_title')->get();
        
        return view('pizzas/index',['pizzas' => $pizzas]);
    }

    public function create () {
        $types = Type::all();

        return view('pizzas/create', ['types' => $types]);
    }

    public function store () {
        $pizza = new Pizza();
        $pizza->title = request('title');
        $pizza->type_id = request('type');
        $pizza->price = request('price');
        $pizza->save();

        // return redirect('/')->with('key', 'value') the things inside the () are session data;
        return redirect('/pizzas');
    }

    public function show ($id) {
        $pizza = Pizza::select('pizzas.*','type.type_title')->join('type', 'pizzas.type_id', '=', 'type.id')->where('pizzas.id',$id)->firstOrFail();

        return view('pizzas/details',['pizza' => $pizza]);
    }

    public function destroy ($id) {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');
    }
}
