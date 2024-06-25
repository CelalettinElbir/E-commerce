<div>
    <div class="container address-container">

        @foreach ($addresses as $address)
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            {{ $address->addres_name }}

                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $address->first_name }}
                                {{ $address->last_name }}</h5>
                            <p class="card-text">

                                {{ Str::limit($address->address_line_1, 20) }}

                            </p>
                            <p class="card-text">

                                {{ $address->city }} / {{ $address->state }}

                            </p>
                            <div class="actions d-flex justify-content-between ">
                                <button class="btn btn-danger" wire:click="delete({{ $address }})"
                                    wire:confirm="Bu Adresi silmek istediğinize emin misiniz?"> <i class="fa fa-trash"
                                        aria-hidden="true"></i> Sil
                                </button>


                                <a href="{{ route('user.address.edit', $address) }}" class="btn btn-primary">
                                    Düzenle
                                </a>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


</div>
