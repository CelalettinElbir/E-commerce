<?php

namespace App\Livewire\Address;

use App\Livewire\Forms\CreateAddressForm;
use App\Models\Address;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateAddress extends Component
{
    public CreateAddressForm $form;


    public function save()
    {
        $this->form->store();
        session()->flash('success', 'Post successfully updated.');
        return $this->redirectRoute("user.address.index");
    }



    public function render()
    {
        $jsonData = file_get_contents(storage_path('app/il.json'));
        $cities = json_decode($jsonData, true);
        return view('livewire.address.create-address', compact("cities"));
    }
}
