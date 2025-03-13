<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    // Menampilkan semua data peminjaman
    public function index()
    {
        $loans = Loan::with(['books', 'user1s'])->get();
        return response()->json($loans, 200);
    }

    // Menyimpan data peminjaman baru
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'user1_id' => 'required|exists:user1s,id',
            'loans_date' => 'required|date',
            'return_date' => 'nullable|date',
            'status' => 'required|in:borrowed,returned',
        ]);

        // Pastikan return_date tidak dikirim kalau null
    $data = $request->all();
    if ($request->return_date === null) {
        unset($data['return_date']);
    }

        $loans = Loan::create($request->all());

        return response()->json([
            'message' => 'Loan created successfully',
            'data' => $loans
        ], 201);
    }

    // Menampilkan satu data peminjaman
    public function show($id)
    {
        $loan = Loan::with(['books', 'user1s'])->findOrFail($id);
        return response()->json($loan, 200);
    }

    // Mengupdate data peminjaman
    public function update(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);

        $request->validate([
            'return_date' => 'nullable|date',
            'status' => 'in:borrowed,returned',
        ]);

        $loan->update($request->all());

        return response()->json([
            'message' => 'Loan updated successfully',
            'data' => $loan
        ], 200);
    }

    // Menghapus data peminjaman
    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();

        return response()->json([
            'message' => 'Loan deleted successfully'
        ], 200);
    }
}
