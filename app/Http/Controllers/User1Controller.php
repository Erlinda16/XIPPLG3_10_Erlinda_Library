<?php

namespace App\Http\Controllers;

use App\Models\User1;
use Illuminate\Http\Request;

class User1Controller extends Controller
{
    public function index()
    {
        $user1s = User1::all();

        return response()->json([
            'status' => 200,
            'message' => 'User1s retrieved successfully.',
            'data' => $user1s
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'username' => 'required|string',
            'phone' => 'required|integer'
        ]);

        $user1s = User1::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'User1 retrieved successfully.',
            'data' => $user1s
        ], 201);
    }

    public function show($id)
    {
            $user1s = User1::find($id);

            if (!$user1s) {
                return response()->json([
                    'status' => 404,
                    'message' => 'User1 not found.',
                    'data' => null
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'User1 retrieved successfully.',
            'data' => $user1s
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user1s = User1::find($id);

            if (!$user1s) {
                return response()->json([
                    'status' => 404,
                    'message' => 'User1 not found.',
                    'data' => null
            ], 404);
        }

        $request->validate([
            'name' => 'string|max:255',
            'email' => 'required|string',
            'password' => 'required|string',
            'username' => 'required|string',
            'phone' => 'required|integer']);
        $user1s->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'User1 updated successfully.',
            'data' => $user1s
        ], 200);
    }

    public function destroy($id)
    {
        $user1s = User1::find($id);

            if (!$user1s) {
                return response()->json([
                    'status' => 404,
                    'message' => 'User1 not found.',
                    'data' => null
            ], 404);
        }

        $user1s->delete();

        return response()->json([
            'status' => 200,
            'message' => 'User1 deleted successfully.',
            'data' => null
        ], 200);
    }
}
