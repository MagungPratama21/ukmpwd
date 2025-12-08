<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;

class UkmController extends Controller
{
    public function index()
    {
        $ukms = Ukm::all();
        return view('ukm.list', compact('ukms'));
    }

    public function show($id)
    {
        $ukm = Ukm::where('id_ukm', $id)->firstOrFail();

        return view('ukm.detail', compact('ukm'));
    }

    public function search(Request $request)
    {
        $q = $request->get('q');

        $data = Ukm::where('nama_ukm', 'LIKE', "%$q%")
            ->orWhere('kategori', 'LIKE', "%$q%")
            ->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ukm' => 'required',
            'kategori' => 'required'
        ]);

        return Ukm::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $ukm = Ukm::where('id_ukm', $id)->firstOrFail();
        $ukm->update($request->all());

        return response()->json(['status' => 'updated']);
    }

    public function destroy($id)
    {
        Ukm::where('id_ukm', $id)->delete();

        return response()->json(['status' => 'deleted']);
    }
}
