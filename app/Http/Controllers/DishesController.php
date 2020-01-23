<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dishes;
use Carbon\Carbon;
use Session;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $dishes = DB::select('select * from dishes');
        $dishes = Dishes::all();
        return view('admin.dish.index',compact('dishes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/dish/create');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $this->validate($request,[
            'InputNameofDish' => 'required',
            'InputCategory' => 'required',
            'InputPrice' => 'required',
            'InputImageFile' => 'required|mimes:jpeg,jpg,bmp,png'
        ]);
        $image = $request->file('InputImageFile');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/item'))
            {
                mkdir('uploads/item',0777,true);
            }
            $image->move('uploads/item',$imagename);
        }else{
            $imagename = "default.png";
            return "NO image";
        }
        $item = new Dishes();
        $item->name = $request->InputNameofDish;
        $item->category = $request->InputCategory;
        $item->price = $request->InputPrice;
        $item->image = $imagename;
        $item->save();
        return redirect()->route('dish.create')->with('success','Dish Added Successfully');
    } 
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dish = Dishes::where('id',$id)->first();
        return view('admin/dish/edit',compact('dish'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $dish = Dishes::where('id',$id)->first();
        $dish->name = $request->InputNameofDish;
        $dish->category = $request->InputCategory;
        $dish->price = $request->InputPrice;

        $image = $request->file('InputImageFile');
        $slug = str_slug($request->InputNameofDish);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/item'))
            {
                mkdir('uploads/item',0777,true);
            }
            $image->move('uploads/item',$imagename);
        }else{
            $imagename = "default.png";
            return "NO image";
        }

        $dish->image = $imagename;
        $dish->save();
        
        return redirect()->route('dish.index')->with('success','Dish Updated Successfully');

        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dish = Dishes::find($id);
        if (file_exists('uploads/item/'.$dish->image))
        {
            unlink('uploads/item/'.$dish->image);
        }
        $dish->delete();
        return redirect()->back()->with('success','Dish successfully Deleted');
    }

    

    public function menu()
    {
        $dishes = Dishes::all();
        $path= "uploads/item/";
        return view('user/menu',compact('dishes','path')); 
       }

    // public function addtocart(Request $request, $id){
    //     $dish = Dish::find($id);
    //      $oldCart = Session::has('cart') ? Session::get('cart') : null;
    //      $cart = new Cart($oldCart);
    //      $cart->add($dish, $dish->id);
    //  }

    public function addToCart($id){

        $dish = dishes::find($id);

 
        if(!$dish) {
 
            abort(404);
 
        }
 
        $cart = session()->get('cart');
 
        // if cart is empty then this the first product
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "name" => $dish->name,
                        "quantity" => 1,
                        "price" => $dish->price,
                        "image" => $dish->image
                    ]
            ];
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']++;
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $dish->name,
            "quantity" => 1,
            "price" => $dish->price,
            "image" => $dish->image
        ];
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
 
            $cart[$request->id]["quantity"] = $request->quantity;
 
            session()->put('cart', $cart);
 
            session()->flash('success', 'Cart updated successfully');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
        }
    }
    




}
