<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class OrderItemsController extends Controller
{
    //

    public function list() {

        return \App\Models\OrderItems::all();
    }

    public function createOrderItem(Request $request) {
        $orderitem = new \App\Models\OrderItems;
        $orderitem->orderId  = $request->orderId ;
        $orderitem->prodId = $request->prodId;
        $orderitem->quantity = $request->quantity;
        $orderitem->priceAtPurchased = $request->priceAtPurchased;
        $orderitem->save();
  
        return response()->json([
          "message" => "orderitem created"
        ], 201);
      }

      public function getOrderItem($id) {
        if (\App\Models\OrderItems::where('id', $id)->exists()) {
          $orderitem = \App\Models\OrderItems::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);

          return response($orderitem, 200);
        } else {

          return response()->json([
            "message" => "orderitem not found"
          ], 404);
        }
      }

      public function updateOrderItem(Request $request, $id) {
        if (\App\Models\OrderItems::where('id', $id)->exists()) {
          $orderitem = \App\Models\OrderItems::find($id);
           $orderitem->orderId  = $request->orderId ;
        $orderitem->prodId = $request->prodId;
        $orderitem->quantity = $request->quantity;
        $orderitem->priceAtPurchased = $request->priceAtPurchased;
          $orderitem->save();
  
          return response()->json([
            "message" => "orderitem updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "orderitem not found"
          ], 404);
        }
      }

      public function deleteOrderItem ($id) {
        if(\App\Models\OrderItems::where('id', $id)->exists()) {
          $orderitem = \App\Models\OrderItems::find($id);
          $orderitem->delete();
  
          return response()->json([
            "message" => "orderitem deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "orderitem not found"
          ], 404);
        }
      }

}
