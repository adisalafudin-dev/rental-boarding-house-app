<?php

namespace App\Http\Controllers;

use App\Models\BrandRentBoardings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandRentBoardingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rent_boarding = BrandRentBoardings::with("owners")->get();

        $data = $rent_boarding->map(function ($boarding) {
            return [
                "nama_brand" => $boarding->nama_brand,
                "pemilik" => $boarding->owners,
                "logo" => $boarding->logo,
                "alamat" => $boarding->alamat,
            ];  
        });

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        
        if (!$user || !$user->isOwner()) {
        return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'nama_brand' => 'required|string|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string',
            'dokumen_izin' => 'nullable|string',
            'dokumen_ktp' => 'nullable|string',
            'dokumen_npwp' => 'nullable|string',
            'dokumen_lain' => 'nullable|string',
        ]);

        $imageName = null;
        if($request->hasFile("logo")){
            $logo = $request->file("logo");
            $imageName = $logo->hashName();
            $logo->storeAs("public/images/logo", $imageName);
        }

        $brand = BrandRentBoardings::create([
            "nama_brand" => $validated["nama_brand"],
            'logo' => $imageName,
            'alamat' => $validated["alamat"],
            'dokumen_izin' =>  $validated["dokumen_izin"],
            'dokumen_ktp' => $validated["dokumen_ktp"],
            'dokumen_npwp' => $validated["dokumen_npwp"],
            'dokumen_lain' => $validated["dokumen_lain"],
            "id_pemilik" => $user->id
        ]);


        return response()->json(["message" => "Created successfully", "data" => $brand], 200);
    }

    public function show(string $id)
    {
        $rent_boarding = BrandRentBoardings::with('owners')->findOrFail($id);

        return response()->json([
            "nama_brand" => $rent_boarding->nama_brand,
            "pemilik" => $rent_boarding->owners,
            "logo" => $rent_boarding->logo,
            "alamat" => $rent_boarding->alamat,
        ], 200);
    }


    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        if (!$user || !$user->isOwner()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'nama_brand' => 'required|string|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string',
            'dokumen_izin' => 'nullable|string',
            'dokumen_ktp' => 'nullable|string',
            'dokumen_npwp' => 'nullable|string',
            'dokumen_lain' => 'nullable|string',
        ]);

        $rent_boarding = BrandRentBoardings::findOrFail($id);

        if($request->hasFile("logo")){
            if($rent_boarding->logo){
                Storage::delete('public/images/logo/' . $rent_boarding->logo);
            }
            $logo = $request->file("logo");
            $imageName = $logo->hashName();
            $logo->storeAs("public/images/logo", $imageName);
            $rent_boarding->logo = $imageName;
        }

        $rent_boarding->nama_brand = $request->nama_brand;
        $rent_boarding->alamat = $request->alamat;
        $rent_boarding->dokumen_izin = $request->dokumen_izin;
        $rent_boarding->dokumen_ktp = $request->dokumen_ktp;
        $rent_boarding->dokumen_npwp = $request->dokumen_npwp;
        $rent_boarding->dokumen_lain = $request->dokumen_lain;
        
        $rent_boarding->save();

        return response()->json(["message" => "Updated successfully", "data" => $rent_boarding], 200);
    }

    public function destroy(string $id)
    {
        $user = auth()->user();
        if (!$user || ( !$user->isOwner() && !$user->isAdmin())) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $rent_boarding = BrandRentBoardings::findOrFail($id);
        $rent_boarding->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }

}
