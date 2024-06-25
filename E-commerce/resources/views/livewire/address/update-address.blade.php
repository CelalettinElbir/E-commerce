<div>

    <div id="editAddress" tabindex="-1" aria-labelledby="editAddressLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">







            {{-- <div class="modal-body">
                        <div class="account__login register">
                            <div class="account__login--header mb-25">
                                <h2 class="account__login--header__title mb-10"></h2>
                                <p class="account__login--header__desc"></p>
                            </div>
                            <div class="account__login--inner">


                                <div class="row">
                                    <div class="col-md-6">


                                        <label for="addres_name">
                                            Adres addadasdası
                                            <input type="text" name="addres_name"
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
                    </div> --}}

            <div class="account__login register">
                <div class="account__login--header mb-25">
                    <h2 class="account__login--header__title mb-10"></h2>
                    <p class="account__login--header__desc"></p>
                </div>
                <div class="account__login--inner">
                    <form action="{{ route('user.adress.update', $address->id) }}" method="POST">
                        <!-- Güncelleme rotası ve ID -->
                        @csrf <!-- CSRF koruması -->
                        @method('PUT') <!-- Veri güncelleme için HTTP PUT metodu -->

                        <!-- Form içeriği -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="address_name">Adres</label>
                                <input type="text" name="address_name" class="account__login--input"
                                    id="address_name" value="{{ $address->address_name }}">
                                <!-- Hata mesajları eklenebilir -->
                            </div>
                            <div class="col-md-6">
                                <label for="postal_code">Posta Kodu</label>
                                <input type="text" name="postal_code" class="account__login--input" id="postal_code"
                                    value="{{ $record->postal_code }}">
                                <!-- Hata mesajları eklenebilir -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="first_name">Ad</label>
                                <input type="text" name="first_name" class="account__login--input" id="first_name"
                                    value="{{ $record->first_name }}">
                                <!-- Hata mesajları eklenebilir -->
                            </div>
                            <div class="col-md-6">
                                <label for="last_name">Soyad</label>
                                <input type="text" name="last_name" class="account__login--input" id="last_name"
                                    value="{{ $record->last_name }}">
                                <!-- Hata mesajları eklenebilir -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="city">Şehir</label>
                                <input type="text" name="city" class="account__login--input" id="city"
                                    value="{{ $record->city }}">
                                <!-- Hata mesajları eklenebilir -->
                            </div>
                            <div class="col-md-6">
                                <label for="state">İlçe</label>
                                <input type="text" name="state" class="account__login--input" id="state"
                                    value="{{ $record->state }}">
                                <!-- Hata mesajları eklenebilir -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="tel_no">Telefon</label>
                                <input type="tel" name="tel_no" class="account__login--input" id="tel_no"
                                    maxlength="17" placeholder="(5XX) XXX XX XX" value="{{ $record->tel_no }}"
                                    oninput="formatPhoneNumber(this)">
                                <!-- Hata mesajları eklenebilir -->
                            </div>
                            <div class="col-md-6">
                                <label for="tc">Tc Kimlik No</label>
                                <input type="text" name="tc" class="account__login--input" id="tc"
                                    pattern="\d*" maxlength="11" value="{{ $record->tc }}">
                                <!-- Hata mesajları eklenebilir -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="address_line_1">Detaylı Adres</label>
                                <textarea name="address_line_1" class="account__login--input" id="address_line_1" rows="5">{{ $record->address_line_1 }}</textarea>
                                <!-- Hata mesajları eklenebilir -->
                            </div>
                        </div>

                        <button type="submit">Güncelle</button>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">İptal</button>
                <button type="submit" class="btn primary__btn" data-dismiss="modal">Kaydet </button>
            </div>
        </div>





    </div>
</div>



<div class="modal fade" id="editaddress" tabindex="-1" aria-labelledby="editaddressLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editaddressLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>





</div>
