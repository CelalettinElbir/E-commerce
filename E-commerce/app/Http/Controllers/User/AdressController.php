<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;

class AdressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jsonData = file_get_contents(storage_path('app/il.json'));
        $cities = json_decode($jsonData, true);

        return view("user.address.index", compact("cities"));
    }

    public function edit(Address $address)
    {


        $jsonData = file_get_contents(storage_path('app/il.json'));
        $cities = json_decode($jsonData, true);

        return view("user.address.edit", compact("cities", "address"));
    }

    public function update(Request $request, Address $address)
    {
        try {
            // dd($address);
            $validatedData = $request->validate([
                'addres_name' => 'string|max:20',
                'postal_code' => 'nullable|string|max:255',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'tel_no' => 'required|string|max:15',
                'tc' => 'required|string|max:11',
                'address_line_1' => 'required|string',

            ]);

            // Log::info('Güncellenen veriler: ', $validatedData);
            $address->update($request->all());
            return redirect()->route('user.address.index')->with(['type' => 'success', 'message' => 'Adres başarıyla güncellendi.']);
        } catch (Exception $e) {
            return redirect()->route('user.address.index')->with(['type' => 'error', 'message' => 'Bilinmeyen Bir Hata Oluştu.']);
        }
    }
}
