<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function AllProductview(){
    	$allproduct=Product::all();
    	return response()->json($allproduct);
    }
   
   public function showAProduct($id){
    	$showAproduct=$update=Product::find($id);
    	return response()->json($showAproduct);
    }

    public function Productsave(Request $request){
    	   $data= new Product;
    	   $data->name=$request->name;
    	   $data->category=$request->category;
    	   $data->price=$request->price;
    	   $data->save();

    	   return response()->json($data);

    }

    public function AllProductUpdate(Request $request,$id){
    	$update=Product::findorfail($id);
    	   $update->name=$request->name;
    	   $update->category=$request->category;
    	   $update->price=$request->price;
    	   $update->save();

    	   return response()->json($update);


    }


    public function DeleteProduct($id){
    	 //Product::where('id',$id)->delete();
    	$delete=Product::find($id);
       $delete->delete();
        return response('delete has been successfully');

    }
}
