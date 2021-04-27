<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Mark;
use App\Models\Image;
use Redirect,Response;


class ProductController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array();
		$product = Product::find($id);
        if($product) { 
	    $data['product'] = $product;
	    $data['product']['price'] = number_format($product["price"],2,",","")."€";

	    if($product['price_promo']) {
	    	$data['product']['price_promo'] = number_format($product["price_promo"],2,",","")."€";
	    }

	    return view('product', $data);
       } else {
    	return view('404');
      }
    }

    /**
* Receive product id by method ajax.
* Add to cart
*
* @return string 
*/
  public function addCart(Request $request){
    if(request()->ajax()) {
    	$product_id = request()->product_id;
    	$quantity = request()->quantity;
    	$product = Product::find($product_id);
    	$price = (float)$product->price_promo?$product->price_promo:$product->price;
    	$total = $price * (int)$quantity;

    	$data = array(
    		"product_id"  => $product_id,
    		"name"    		=> $product->name,
    		"quantity"    => $quantity,
    		"image"       => $product->images[0]->file_name,
    		"price"       => $price,
    		"total"       => $total
    	);
        
        $cart = session()->get('cart');
		$cart[] = $data;
		session()->put('cart', $cart);
		return Response::json($data);
    } else {
    	return Response::json(array("error"=>"No product data!"));
    }
	}

/**
* Receive product id by method ajax.
* Remove product(s) from the cart
*
* @return string 
*/
  public function removeCart(Request $request){
    if(request()->ajax()) {
    	$cart_id = request()->cart_id;
        $cart = session()->get('cart');
        if(isset($cart[$cart_id])) unset($cart[$cart_id]);
		session()->put('cart', $cart);
		return Response::json($cart_id);
    } else {
    	return Response::json(array("error"=>"cannt find cart_id!"));
    }
	}

/**
* Display cart HTML.
*
*/
public function loadCart(Request $request) {
    $cart = session()->get('cart');
    $data = array();
    $totalAll = 0;
    $quantityAll = 0;
    if($cart) {
        foreach ($cart as &$crt) {
            $totalAll+=$crt["total"];
            $quantityAll+=$crt["quantity"];
            $crt["price"] = number_format($crt["price"],2,",","")."&euro;";
            $crt["total"] = number_format($crt["total"],2,",","")."&euro;";
        }
    }
    $data["cart"] = $cart;
    $data["totalAll"] = number_format($totalAll,2,",","")."&euro;";
    $data["quantityAll"] = $quantityAll;
    return view('cart', $data);
}

}
