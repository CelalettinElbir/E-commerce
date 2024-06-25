<?php

namespace App\Livewire\Address;

use App\Http\Controllers\user\AdressController;
use App\Livewire\Forms\CreateAddressForm;
use App\Models\Address;
use Livewire\Component;

class ListAdresses extends Component
{
    public function delete(Address $address)
    {
        try {
            $address->delete();
            // Başarılı bir şekilde silindiğine dair mesaj gönder
            session()->flash('success', 'Adres başarıyla silindi.');
            $this->redirectRoute("user.address.index");
        } catch (\Exception $e) {
            // Silme işlemi sırasında bir hata oluşursa hata mesajını gönder
            session()->flash('error', 'Adres silinirken bir hata oluştu: ' . $e->getMessage());
        }
    }


    public function render()
    {

        $jsonData = file_get_contents(storage_path('app/il.json'));
        $cities = json_decode($jsonData, true);
        $addresses = auth()->user()->address;
        return view('livewire.address.list-adresses', compact("addresses", "cities"));
    }
}
