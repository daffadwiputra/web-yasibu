<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products['products'] = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('products.index', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'price' => 'required',
            'size' => 'required',
            'description' => 'nullable',
            'product_image' => 'image|nullable|max:1999'
        ]);
        
        //Handle Upload
        if($request->hasFile('product_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('product_image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        Product::create([
            'product_name' => $request -> product_name,
            'price' => $request -> price,
            'size' => $request -> size,
            'description' => $request -> description,
            'product_image'=> $fileNameToStore
        ]);

        return redirect('/products')->with('success', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product['product'] = Product::find($id);
        if(isset($product['product']))
            return view('products.show',$product);
        else
            return redirect('/products')->with('error','Produk does not exists.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product['product'] = Product::find($id);
        return view ('products.edit', $product);
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
        $this->validate($request, [
            'product_name' => 'required',
            'price' => 'required',
            'size' => 'required',
            'sold_out' => 'required',
            'description' => 'nullable',
            'product_image' => 'image|nullable|max:1999'
        ]);

         //Handle Upload
         if($request->hasFile('product_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('product_image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        if($request->hasFile('product_image')){
            Product::find($id)->update([
                'product_name' => $request -> product_name,
                'price' => $request -> price,
                'size' => $request -> size,
                'sold_out' => $request -> sold_out,
                'description' => $request -> description,
                'product_image'=> $fileNameToStore
            ]);
        } else {
            Product::find($id)->update([
                'product_name' => $request -> product_name,
                'price' => $request -> price,
                'size' => $request -> size,
                'sold_out' => $request -> sold_out,
                'description' => $request -> description,
            ]);
        }
        return redirect('/products')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->product_image != 'noimage.jpg'){
            //Delete image
            Storage::delete('public/product_images/'.$product->product_image);
        }
        Product::destroy([$id]);

        return redirect('/products')->with('success', 'Product Removed');
    }
}
