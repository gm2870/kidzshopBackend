<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::with('Products')->get();
        $products = Product::all();
        $productWithCategory = [];
        foreach ($products as $product) {
            $product->category_name = $product->category->name;
            array_push($productWithCategory, $product);
        }
        return response()->json($productWithCategory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|string|max:191',
        //     'price' => 'required|integer',
        //     'category_id' => 'required|integer',
        //     'quantity' => 'required',
        // ]);
        // $currentPhoto = 'shirt6.jpg';

        // $name = time() . '.' .
        //     explode('/', explode(
        //         ':',
        //         substr($request->photo, 0, strpos($request->photo, ';'))
        //     )[1])[1];

        // \Image::make($request->photo)->save(public_path('images') . DIRECTORY_SEPARATOR . $name);
        // $request->merge(['photo' => $name]);

        // $productPhoto = public_path('images') . DIRECTORY_SEPARATOR . $currentPhoto;
        // if (file_exists($productPhoto)) {
        //     @unlink($productPhoto);
        // }
        // $product = Product::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'category_id' => $request->category_id,
        //     'photo' => $name,
        //     'description' => $request->description,
        //     'quantity' => $request->quantity
        // ]);

        // return response()->json([
        //     'status' => 'true',
        //     'product' => $product
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $product->category_name = $product->category->name;
        return response()->json([
            'product' => $product
        ]);
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
        // $product = Product::findOrFail($id);
        // $this->validate($request, [
        //     'name' => 'required|string|max:191',
        //     'price' => 'required|integer',
        //     'category_id' => 'required|integer',
        //     'quantity' => 'required',
        // ]);
        // $currentPhoto = $product->photo;

        // $name = time() . '.' .
        //     explode('/', explode(
        //         ':',
        //         substr($request->photo, 0, strpos($request->photo, ';'))
        //     )[1])[1];

        // \Image::make($request->photo)->save(public_path('images') . DIRECTORY_SEPARATOR . $name);
        // $request->merge(['photo' => $name]);

        // $productPhoto = public_path('images') . DIRECTORY_SEPARATOR . $currentPhoto;
        // if (file_exists($productPhoto)) {
        //     @unlink($productPhoto);
        // }
        // $product->update($request->all());
        // $product->category_name = $product->category->name;
        // return response()->json([
        //     'status' => 'true',
        //     "product" => $product,
        //     'description' => $request->description
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json([
            'status' => 'true',
            'message' => 'deleted'
        ]);
    }
}
