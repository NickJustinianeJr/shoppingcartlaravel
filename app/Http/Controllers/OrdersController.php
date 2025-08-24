<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class OrdersController extends Controller
{
    //

    public function list() {

        return \App\Models\Orders::all();
    }

    public function createOrder(Request $request) {
        $order = new \App\Models\Orders;
        $order->custId = $request->custId;
        $order->orderDate = $request->orderDate;
        $order->totalAmount = $request->totalAmount;
        $order->save();
  
        return response()->json([
          "message" => "Order created"
        ], 201);
      }

      public function getOrder($id) {
        if (\App\Models\Orders::where('id', $id)->exists()) {
          $order = \App\Models\Orders::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);

          return response($order, 200);
        } else {

          return response()->json([
            "message" => "Order not found"
          ], 404);
        }
      }

      public function updateOrder(Request $request, $id) {
        if (\App\Models\Orders::where('id', $id)->exists()) {
          $order = \App\Models\Orders::find($id);
          
        $order->custId = $request->custId;
        $order->orderDate = $request->orderDate;
        $order->totalAmount = $request->totalAmount;
          $order->save();
  
          return response()->json([
            "message" => "Order updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "Order not found"
          ], 404);
        }
      }

      public function deleteOrder ($id) {
        if(\App\Models\Orders::where('id', $id)->exists()) {
          $order = \App\Models\Orders::find($id);
          $order->delete();
  
          return response()->json([
            "message" => "order deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "order not found"
          ], 404);
        }
      }

}
