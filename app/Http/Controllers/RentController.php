<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rents = Rent::all();
        return response()->json([
            'message' => 'all rent data',
            'data' => $rents,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tenant_id' => 'required',
            'car_id' => 'required',
            'date_borrow' => 'required',
            'date_return' => 'required',
            'down_payment' => 'required',
            'discount' => 'required',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'invalid field',
            ], 422);
        }

        $rent = Rent::create($request->all());
        return response()->json([
            'message' => 'create rent success',
            'data' => $rent,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rent = Rent::find($id);

        if (!$rent) {
            return response()->json([
                'message' => 'rent not found',
            ], 404);
        }

        return response()->json([
            'message' => 'success find rent$rent',
            'rent$rent' => $rent,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rent = Rent::find($id);

        if (!$rent) {
            return response()->json([
                'message' => 'rent$rent not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'tenant_id' => 'required',
            'car_id' => 'required',
            'date_borrow' => 'required',
            'date_return' => 'required',
            'down_payment' => 'required',
            'discount' => 'required',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'invalid field',
            ], 422);
        }

        $rent->update($request->all());

        return response()->json([
            'message' => 'success update rent',
            'rent' => $rent,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rent = Rent::find($id);

        if (!$rent) {
            return response()->json([
                'message' => 'rent not found',
            ], 404);
        }

        $rent->delete();

        return response()->json([
            'message' => 'success delete rent',
        ], 200);
    }
}
