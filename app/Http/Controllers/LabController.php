<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\LaporanLab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabController extends Controller
{
    public function index()
    {
        $labs = Lab::all();

        return view('admin.labs', compact('labs'));
    }

    public function statusChange($id)
    {
        // Temukan lab berdasarkan ID
        $lab = Lab::findOrFail($id);

        // Toggle status
        $lab->status = !$lab->status;
        $lab->used = false;

        // Simpan perubahan
        $lab->save();

        // Redirect kembali dengan pesan sukses
        return back()->with('success', 'Status lab berhasil diperbarui!');
    }

    public function store(Request $request)
    {

        // Validasi input hanya untuk name
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Membuat instance Lab dengan name dari request dan nilai default untuk lainnya
    $lab = Lab::create([
        'name' => $validatedData['name'],
        'status' => true, // Default value
        'used' => false, // Default value
        'network' => true, // Default value
    ]);

        // Menambahkan 36 PC ke lab yang baru dibuat
        for ($i = 1; $i <= 36; $i++) {
            $lab->pcs()->create([
                'name' => 'PC ' . $i,
                'has_monitor' => true,
                'has_keyboard' => true,
                'has_mouse' => true,
                'has_pc' => true,
            ]);
        }

        return back()->with('success', 'Lab created successfully with 36 PCs.');
    }
    public function update(Request $request,$id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Update hanya field 'name'
        Lab::where('id', $id)->update([
            'name' => $request->name
        ]);
    
        return back()->with('success', 'Lab updated successfully.');
    }

    public function destroy($id)
    {
        Lab::where('id', $id)->delete();
        return back()->with('success', 'Lab deleted successfully.');
    }
}
