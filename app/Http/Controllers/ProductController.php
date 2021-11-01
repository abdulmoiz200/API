<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function addProducts(Request $request){

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category = $request->input('category');
        $product->file_path = $request->file('file')->store('products');
        $product->save();
        if($product){
            return response()->json(["status"=>"201","product"=>"Product Added"]);

        }
        else{
            return response()->json(["status"=>"Failed","product"=>"Product not Added"]);
        }
        



    }

    public function listProduct(){
        return Product::all();
    }

    public function delete($id){
        
        $return= Product::where('id',$id)->delete();
        if($return){
            return respose()->json(["status"=>"204","return"=> "Product has Deleted"]);
        }
        else{
            return respose()->json(["status"=>"Failed","return"=>"Operation Failed"]);
        }
    }

    public function getSingleProduct($id){
        return Product::find($id);
    }

    public function updateProduct(Product $product, Request $request){  

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category = $request->input('category');
        if($request->file('file')){
            $product->file_path = $request->file('file')->store('products');
        }
        
    
        if($product->save()){
            return response()->json(["status"=>'204',"product"=>"Product Updated"]);
        }
        else{
            return response()->json(["status"=>"Failed", "product"=>"Product not Updated"]);
        }
    }


    public function search($key){
        
        return Product::where('name','LIKE',"%$key%")->get();
    }
}
