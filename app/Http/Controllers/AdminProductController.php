<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Mark;
use App\Models\Image;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('images')->orderByDesc('id')->get();
        return view('admin/products',array( 'products' => $products ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marks = Mark::all()->sortByDesc("id");

        return view('admin/product-create-edit',array('marks' => $marks));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $product = new Product();
     $this->validateAndPersist($request,$product);

     return redirect()->route('products.index');
    }

    private function validateAndPersist(Request $request,Product $product){

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'mark' => 'required',
            //'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
         ]);
        //  Store data in database
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->price_promo = $request->input('price_promo');
        $product->mark_id = $request->input('mark');
         $product->save();

        // upload images
        $product->refresh();
        if($request->hasFile('images')){
            $i=0;
            foreach($request->file('images') as $image){
                $imageName = $i.time().'.'.$image->extension(); 
                $image->move(public_path('images'), $imageName);
                $img = new Image(['file_name' => $imageName]);
                $product->images()->save($img);
                $i++; 
            }
        }
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
        $product=Product::where('id',$id)->get()->first();
        $marks = Mark::all()->sortByDesc("id");
        return view('admin/product-create-edit',array( 'product' => $product, 'marks' => $marks));
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

     $product=Product::where('id',$id)->get()->first();
     $this->validateAndPersist($request,$product);

     return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->route('products.index');
    }

    public function saveMark(Request $request){
        $mark = new Mark();
        $this->validate($request, [
            'mark_name' => 'required',
         ]);
        //  Store data in database
        $mark->name = $request->input('mark_name');
        $mark->save();
        return redirect()->back();


    }
}
