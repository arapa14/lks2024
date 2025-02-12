<?php

namespace App\Http\Controllers;

use App\Models\Penaltie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenaltieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penalties = Penaltie::all();
        return response()->json([
            'message' => 'all penaltie data',
            'data' => $penalties,
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
            'penalties_name' => 'required',
            'description' => 'required',
            'car_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'invalid field',
            ], 422);
        }

        $penaltie = Penaltie::create($request->all());
        return response()->json([
            'message' => 'create penaltie success',
            'data' => $penaltie,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penaltie = Penaltie::find($id);

        if (!$penaltie) {
            return response()->json([
                'message' => 'penaltie not found',
            ], 404);
        }

        return response()->json([
            'message' => 'success find penaltie',
            'penaltie' => $penaltie,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penaltie $penaltie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $penaltie = Penaltie::find($id);

        if (!$penaltie) {
            return response()->json([
                'message' => 'penaltie not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'penalties_name' => 'required',
            'description' => 'required',
            'car_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'invalid field',
            ], 422);
        }

        $penaltie->update($request->all());

        return response()->json([
            'message' => 'success update penaltie',
            'penaltie' => $penaltie,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penaltie = Penaltie::find($id);

        if (!$penaltie) {
            return response()->json([
                'message' => 'penaltie not found',
            ], 404);
        }

        $penaltie->delete();

        return response()->json([
            'message' => 'success delete penaltie',
        ], 200);
    }
}
