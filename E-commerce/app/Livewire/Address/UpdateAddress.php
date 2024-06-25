<?php

namespace App\Livewire\Address;

use App\Livewire\Forms\CreateAddressForm;
use App\Models\Address;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateAddress extends Component
{

    public CreateAddressForm $form;

    public function mount(Address $address)
    {
       
        $this->form->setAddress($address);
    }

    #[On("update-adress")]
    public function fill($id)
    {

        $address =  Address::findOrFail($id);

        $this->form->setAddress($address);
    }
    public function save()
    {
        $this->form->update();

        return $this->redirect("");
    }

    public function render()

    {



        $jsonData = file_get_contents(storage_path('app/il.json'));
        $cities = json_decode($jsonData, true);
        return view('livewire.address.create-address', compact("cities"));
    }
}
