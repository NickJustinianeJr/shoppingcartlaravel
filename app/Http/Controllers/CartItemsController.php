<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class CartItemsController extends Controller
{
    //

    public function list() {

        return \App\Models\CartItems::all();
    }

    public function createCartItem(Request $request) {
        $cartItem = new \App\Models\CartItems;
        $cartItem->cartId  = $request->cartId;
        $cartItem->prodId = $request->prodId;
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
  
        return response()->json([
          "message" => "cartItem created"
        ], 201);
      }

      public function getCartItem($id) {
        if (\App\Models\CartItems::where('id', $id)->exists()) {
          $cartItem = \App\Models\CartItems::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);

          return response($cartItem, 200);
        } else {

          return response()->json([
            "message" => "cartItem not found"
          ], 404);
        }
      }

 public function getCartItemByUsername($username) {
  
 $user = \App\Models\Users::where('userName', $username)->first();
         if ($user)
         {
          $customer = \App\Models\Customers::where('userId', $user->id)->first();
          if ($customer)
          {
            $shoppingCart = \App\Models\ShoppingCarts::where('custId', $customer->id)->first();
            if ($shoppingCart)
            {
              $cartItems =  \App\Models\CartItems::where('cartId', $shoppingCart->id)->get()->toJson(JSON_PRETTY_PRINT);
            
              return response($cartItems, 200);
            }
          }
         }

         return response()->json([
            "message" => "cartItem not found"
          ], 404);

      }


      public function updateCartItem(Request $request, $id) {
        if (\App\Models\CartItems::where('id', $id)->exists()) {
          $cartItem = \App\Models\CartItems::find($id);
          $cartItem->cartId  = $request->cartId;
        $cartItem->prodId = $request->prodId;
        $cartItem->quantity = $request->quantity;
          $cartItem->save();
  
          return response()->json([
            "message" => "cartItem updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "cartItem not found"
          ], 404);
        }
      }

      public function deleteCartItem ($id) {
        if(\App\Models\CartItems::where('id', $id)->exists()) {
          $cartItem = \App\Models\CartItems::find($id);
          $cartItem->delete();
  
          return response()->json([
            "message" => "cartItem deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "cartItem not found"
          ], 404);
        }
      }

}
