<?php

namespace App\Livewire\Forms;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateAddressForm extends Form
{


    public ?Address $address;

    #[Validate('required|string')]
    public $address_line_1;


    #[Validate('required|string|max:20')]
    public $addres_name;

    #[Validate('required|string|max:255')]
    public $first_name;

    #[Validate('required|string|max:255')]
    public $last_name;

    #[Validate('required|string|max:255')]
    public $city;


    #[Validate('required|string|max:255')]
    public $state;

    #[Validate('string|max:255')]
    public $postal_code;

    #[Validate('required|string|max:15')]
    public $tel_no;

    #[Validate('required|string|max:11')]
    public $tc;

    public function store()
    {
        $this->validate();
        Address::create([
            "addres_name" => $this->addres_name,
            "user_id" =>  Auth::id(),
            "postal_code" => $this->postal_code,
            "address_line_1" => $this->address_line_1,
            "city" => $this->city,
            "state" => $this->state,
            "tc" => $this->tc,
            "tel_no" => $this->tel_no,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
        ]);
    }
}
