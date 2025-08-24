<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class ProductsController extends Controller
{
    //

    public function list() {

        return \App\Models\Products::all();
    }

    public function createProduct(Request $request) {
        $product = new \App\Models\Products;
       // $product->id =  $request->id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
         $product->image = $request->image;
          $product->price = $request->price;
          
        $product->save();
  
        return response()->json([
          "message" => "Product created"
        ], 201);
      }

      public function getProduct($id) {
        if (\App\Models\Products::where('id', $id)->exists()) {
          $product = \App\Models\Products::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);

          return response($product, 200);
        } else {

          return response()->json([
            "message" => "Product not found"
          ], 404);
        }
      }

      public function updateProduct(Request $request, $id) {
        if (\App\Models\Products::where('id', $id)->exists()) {
          $product = \App\Models\Products::find($id);
  
         // $product->id = $request->id;
         $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
         $product->image = $request->image;
          $product->price = $request->price;
          $product->save();
  
          return response()->json([
            "message" => "Product updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "Product not found"
          ], 404);
        }
      }

      public function deleteProduct ($id) {
        if(\App\Models\Products::where('id', $id)->exists()) {
          $product = \App\Models\Products::find($id);
          $product->delete();
  
          return response()->json([
            "message" => "Product deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Product not found"
          ], 404);
        }
      }

}
