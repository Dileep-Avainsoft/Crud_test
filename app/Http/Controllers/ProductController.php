<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Products::get();
        return view('products.view',['products'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//         dd($request->all());
        $request->validate([
            'name' => 'Required',
            'email' => 'Required',
            'description' => 'Required',
            'image' => 'Required|mimes:png,jpg,gif,webp,jpeg|max:10000',

        ]);
         $imageName =time().'.'.$request->image->extension();
         $request->image->move(public_path('products_image'),$imageName);
//         dd($imageName);

         $products =new Products;
         $products->image =$imageName;
         $products->name = $request->name;
         $products->description =$request->description;
         $products->email =$request->email;
         $products->save();
        //  return back()->withSuccess('Products Create !!!!');
        
        return redirect()->route('products.view')->withSuccess('Products Create !!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::where('id',decrypt($id))->first();
        return view('products.show',['products'=> $product]);
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
//            dd($id);
         $product = Products::where('id',decrypt($id))->first();
//         print_r($product);

//    dd($product);
         return view('products.edit',['products'=> $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dump($request->all());
        $request->validate([
            'name' => 'Required',
            'email' => 'Required',
            'description' => 'Required',
            'image' => 'nullable|mimes:png,jpg,gif,webp,jpeg|max:10000',

        ]);
        
                $products = Products::where('id',$id)->first();
           
             if(isset($request->image)){
               
                unlink('products_image/'.$products->image);
                
            $imageName =time().'.'.$request->image->extension();
            $request->image->move(public_path('products_image'),$imageName);
            
            $products->image =$imageName;
          
}
         $products->name = $request->name;
         $products->description =$request->description;
         $products->email =$request->email;
         $products->save();
         return redirect()->route('products.view')->withSuccess('Products Upadte !!!!');
        //  return view('products.view')->withSuccess('Products Update !!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::where('id',decrypt($id))->first();
        $product->delete();
        return redirect()->route('products.view')->withSuccess('Products Delete !!!!');
    }
}
