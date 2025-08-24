<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class CustomersController extends Controller
{
    //

    public function list() {

        return \App\Models\Customers::all();
    }

    public function createCustomer(Request $request) {
        $customer = new \App\Models\Customers;
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->email = $request->email;
        $customer->contactNumber = $request->contactNumber;
        $customer->address = $request->address;
        $customer->save();
  
        return response()->json([
          "message" => "Customer created"
        ], 201);
      }

      public function getCustomer($id) {
        if (\App\Models\Customers::where('id', $id)->exists()) {
          $customer = \App\Models\Customers::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);

          return response($customer, 200);
        } else {

          return response()->json([
            "message" => "Customer not found"
          ], 404);
        }
      }

      public function updateCustomer(Request $request, $id) {
        if (\App\Models\Customers::where('id', $id)->exists()) {
          $customer = \App\Models\Customers::find($id);
         $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->email = $request->email;
        $customer->contactNumber = $request->contactNumber;
        $customer->address = $request->address;
          $customer->save();
  
          return response()->json([
            "message" => "Customer updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "Customer not found"
          ], 404);
        }
      }

      public function deleteCustomer ($id) {
        if(\App\Models\Customers::where('id', $id)->exists()) {
          $customer = \App\Models\Customers::find($id);
          $customer->delete();
  
          return response()->json([
            "message" => "Customer deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Customer not found"
          ], 404);
        }
      }

}
