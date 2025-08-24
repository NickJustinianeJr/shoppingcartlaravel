<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class ShoppingCartsController extends Controller
{
    //

    public function list() {

        return \App\Models\ShoppingCarts::all();
    }

    public function createShoppingCart(Request $request) {
        $cart = new \App\Models\ShoppingCarts;
        $cart->custId = $request->custId;
        
        $cart->save();
  
        return response()->json([
          "message" => "cart created"
        ], 201);
      }

      public function getShoppingCart($id) {
        if (\App\Models\ShoppingCarts::where('id', $id)->exists()) {
          $cart = \App\Models\ShoppingCarts::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);

          return response($cart, 200);
        } else {

          return response()->json([
            "message" => "cart not found"
          ], 404);
        }
      }
/*
       public function getShoppingCartByUsername($username) {
        if (\App\Models\ShoppingCarts::where('custId', $username)->exists()) {
          $cart = \App\Models\ShoppingCarts::where('custId', $id)->get()->toJson(JSON_PRETTY_PRINT);

          return response($cart, 200);
        } else {

          return response()->json([
            "message" => "cart not found"
          ], 404);
        }
      }
*/
      public function updateShoppingCart(Request $request, $id) {
        if (\App\Models\ShoppingCarts::where('id', $id)->exists()) {
          $cart = \App\Models\ShoppingCarts::find($id);
          $cart->custId = $request->custId;
          $cart->save();
  
          return response()->json([
            "message" => "cart updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "cart not found"
          ], 404);
        }
      }

      public function deleteShoppingCart ($id) {
        if(\App\Models\ShoppingCarts::where('id', $id)->exists()) {
          $cart = \App\Models\ShoppingCarts::find($id);
          $cart->delete();
  
          return response()->json([
            "message" => "cart deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "cart not found"
          ], 404);
        }
      }

}
