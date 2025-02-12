<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return response()->json([
            'message' => 'all car data',
            'data' => $cars,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // tidak digunakan
    }

    /** nn
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_car' => 'required',
            'name_car' => 'required',
            'type_car' => 'required',
            'year' => 'required',
            'seat' => 'required',
            'image' => 'required',
            'total' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'message' => 'invalid field',
            ], 422);
        }

        $car = Car::create($request->all());
        return response()->json([
            'message' => 'create Car success',
            'data' => $car,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json([
                'message' => 'car not found',
            ], 404);
        }

        return response()->json([
            'message' => 'success find car',
            'car' => $car,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json([
                'message' => 'car not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'no_car' => 'required',
            'name_car' => 'required',
            'type_car' => 'required',
            'year' => 'required',
            'seat' => 'required',
            'image' => 'required',
            'total' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'message' => 'invalid field',
            ], 422);
        }

        $car->update($request->all());

        return response()->json([
            'message' => 'success update car',
            'car' => $car,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json([
                'message' => 'car not found',
            ], 404);
        }

        $car->delete();

        return response()->json([
            'message' => 'success delete car',
        ], 200);
    }
}
