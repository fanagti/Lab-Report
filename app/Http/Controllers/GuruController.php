<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Lab;
use App\Models\Mapel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    public function createWithMapels()
    {
        $gurus = Guru::with('mapels')->get();
        $labs = Lab::all();
        return view('admin.guru', compact('gurus', 'labs'));
    }
    public function storeWithMapels(Request $request)
    {
        $request->validate([
            'guru_name' => 'required|string|max:255', // Validasi nama guru
            'mapels' => 'required|array', // Validasi bahwa mapel adalah array
            'mapels.*' => 'required|string|max:255', // Validasi setiap mapel
        ]);

        // Buat Guru baru
        $guru = Guru::create(['name' => $request->guru_name]);

        // Tambahkan Mapel
        foreach ($request->mapels as $mapelName) {
            Mapel::create([
                'name' => $mapelName,
                'guru_id' => $guru->id,
            ]);
        }

        return back()->with('success', 'Guru and Mapels created successfully.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'guru_name' => 'required|string|max:255',
            'mapels' => 'nullable|array',
            'mapels.*' => 'nullable|string|max:255',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->update(['name' => $request->guru_name]);

        // Perbarui mapels
        $guru->mapels()->delete(); // Hapus mapel lama
        if ($request->has('mapels')) {
            foreach ($request->mapels as $mapelName) {
                if (!empty($mapelName)) {
                    $guru->mapels()->create(['name' => $mapelName]);
                }
            }
        }

        return back()->with('success', 'Guru updated successfully.');
    }

    /**
     * Menghapus guru beserta mapelnya.
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete(); // Hapus guru beserta relasi mapelnya

        return back()->with('success', 'Guru deleted successfully.');
    }
}
