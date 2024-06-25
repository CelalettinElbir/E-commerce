<div>


    <div class="modal fade " id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">


            <form wire:submit.prevent="save">
                @csrf
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="account__login register">
                            <div class="account__login--header mb-25">
                                <h2 class="account__login--header__title mb-10"></h2>
                                <p class="account__login--header__desc"></p>
                            </div>
                            <div class="account__login--inner">


                                <div class="row">
                                    <div class="col-md-6">


                                        <label for="addres_name">
                                            Adres adı
                                            <input type="text" wire:model="form.addres_name"
                                                class="account__login--input" id="addres_name">
                                        </label>
                                        @error('form.addres_name')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        posta kodu
                                        <label for="postal_code">
                                            <input type="text" class="account__login--input"
                                                wire:model="form.postal_code" id="postal_code">
                                        </label>
                                        @error('form.postal_code')
                                            <span class="error">{{ $message }}</span>
                                        @enderror

                                    </div>




                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="first_name">
                                            Ad
                                            <input type="text" wire:model="form.first_name"
                                                class="account__login--input" id="first_name">
                                        </label>
                                        @error('form.first_name')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name">
                                            Soyad
                                            <input type="text" wire:model="form.last_name"
                                                class="account__login--input" id="last_name">
                                        </label>
                                        @error('form.last_name')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-6">
                                        Şehir
                                        <select wire:model="form.city" id = "city" class="account__login--input">
                                            <option value="">Şehir Seçiniz</option>
                                            @foreach ($cities['data'] as $city)
                                                <option value="{{ $city['il_adi'] }}">{{ $city['il_adi'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('form.city')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <label class="col-md-6">
                                        İlçe
                                        <select wire:model="form.state" id="state" class="account__login--input">
                                            <option value="">İlçe Seçiniz</option>
                                            <!-- İlçeler buraya dinamik olarak gelecek -->
                                        </select>
                                        @error('form.state')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="tel_no">
                                            Telefon
                                            <input type="tel" wire:model="form.tel_no" class="account__login--input"
                                                id="tel_no" maxlength="17" placeholder="(5XX) XXX XX XX"
                                                oninput="formatPhoneNumber(this)">
                                        </label>
                                        @error('form.tel_no')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        Tc Kimlik No
                                        <label for="tc">
                                            <input type="text" id= "tc" wire:model="form.tc"
                                                class="account__login--input" pattern="\d*" maxlength="11">
                                        </label>
                                    </div>
                                </div>
                                <label for="address_line_1">
                                    Adres
                                    <textarea wire:model="form.address_line_1" class="account__login--input" id="address_line_1" rows="5"></textarea>
                                    @error('form.address_line_1')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </label>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">İptal</button>
                        <button type="submit" class="btn primary__btn" data-dismiss="modal">Kaydet </button>
                    </div>
                </div>
            </form>





        </div>
    </div>
</div>
