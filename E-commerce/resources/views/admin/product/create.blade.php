@extends('layouts.admin')


@section('content')

<style>


.input-group > .form-control::placeholder {
    color: #888; /* Placeholder metin rengini değiştirir */
}


</style>
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Ürün Ekle</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <h5>Kategori Seçiniz <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control">
                                                        <option value="" selected="" disabled="">Kategori
                                                            Seçiniz
                                                        </option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-md-6 ">

                                            <div class="form-group">
                                                <h5>Marka seçiniz <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="brand_id" class="form-control">
                                                        <option value="" selected="" disabled="">Marka seçiniz
                                                        </option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 ">

                                            <div class="form-group">
                                                <h5>Ürün Adı <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" required>
                                                </div>
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Üretim Yılı <span class="text-danger"></span></h5>
                                                <div class="input-group">
                                                    <input type="number" name="production_year" class="form-control" required data-validation-required-message="Bu alan zorunludur" placeholder="YYYY" min="2020" max="{{ date('Y') }}">
                                                </div>
                                            </div>
                                            @error('production_year')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div><!--  ikinci sıra  bitiş-->



                                        <div class="row"><!--  üçüncü sıra -->
                                        <div class="col-md-4 ">

                                            <div class="form-group">
                                                <h5> Yükseklik <span class="text-danger">*</span></h5>
                                                <div class="input-group">
                                                    <input type="number" name="aspect_ratio" class="form-control" required
                                                        data-validation-required-message="Bu alan zorunludur">
                                                </div>
                                            </div>
                                            @error('aspect_ratio')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="col-md-4 ">

                                            <div class="form-group">
                                                <h5> Genişlik <span class="text-danger">*</span></h5>
                                                <div class="input-group">
                                                    <input type="number" name="width" class="form-control" required
                                                        data-validation-required-message="Bu alan zorunludur">
                                                </div>
                                            </div>
                                            @error('width')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror



                                        </div>



                                        <div class="col-md-4 ">

                                            <div class="form-group">
                                                <h5> Çap <span class="text-danger">*</span></h5>
                                                <div class="input-group">
                                                    <input type="number" name="rim_diameter" class="form-control" required
                                                        data-validation-required-message="Bu alan zorunludur">
                                                </div>
                                            </div>
                                            @error('rim_diameter')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div><!--  üçüncü sıra  bitiş-->



                                    <div class="row"><!--  üçüncü sıra -->
                                        <div class="col-md-4 ">

                                            <div class="form-group">
                                                <h5> Stok Sayısı <span class="text-danger">*</span></h5>
                                                <div class="input-group">
                                                    <input type="number" name="stock" class="form-control" required
                                                        data-validation-required-message="Bu alan zorunludur">
                                                </div>
                                            </div>
                                            @error('stock')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 ">

                                            <div class="form-group">
                                                <h5> Fiyat <span class="text-danger">*</span></h5>
                                                <div class="input-group">
                                                    <input  name="price" placeholder="1500.46" class="form-control" required
                                                        data-validation-required-message="Bu alan zorunludur">
                                                </div>
                                            </div>
                                            @error('product_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="col-md-4 ">

                                            <div class="form-group">
                                                <h5> İndirimli fiyat</h5>
                                                <div class="input-group">
                                                    <input  placeholder="1500.46" name="discount_price" class="form-control"
                                                    >
                                                </div>
                                            </div>
                                            @error('discount_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div><!--  üçüncü sıra  bitiş-->

                            
                                    <div class="row"><!-- Beşinci sıra -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Yakıt Tüketimi <span class="text-danger">*</span></h5>
                                                <div class="input-group">
                                                    <select name="fuel_consumption" class="form-control" required>
                                                        <option value="">Seçiniz</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            @error('fuel_consumption')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Yol Tutuşu <span class="text-danger">*</span></h5>
                                                <div class="input-group">
                                                    <select name="grip" class="form-control" required>
                                                        <option value="">Seçiniz</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            @error('grip')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Gürültü Seviyesi (dB) <span class="text-danger">*</span></h5>
                                                <div class="input-group">
                                                    <input type="number" name="noise_level" class="form-control" required data-validation-required-message="Bu alan zorunludur">
                                                </div>
                                            </div>
                                            @error('noise_level')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                      
                                    </div><!-- Beşinci sıra bitiş -->


                                    <div class="row">

                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Stok kodu  </h5>
                                                <div class="input-group">
                                                    <input  name="stock_code" placeholder="Sopyo.." class="form-control"  >
                                                </div>
                                            </div>
                                            @error('noise_level')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div>




                                    <div class="row">
                                        <div class="col-12">

                                            <div class="box">
                                                <div class="box-header">
                                                    <h4 class="box-title">Ürün açıklaması <br>
                                                    </h4>
                                                </div>
                                                <div class="box-body">
                                                    <textarea id="editor1" name="description" rows="10" cols="80">
                                                                          Ürün Açıklaması 
                                                      </textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Kısa açıklama<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_description" id="textarea" class="form-control" required placeholder="kısa açıklama"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Durum</h5>
                                        <div class="controls">
                                            <input type="checkbox" id="status" name="status" value="1" checked>
                                            <label for="status">Aktif</label>
                                        </div>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Ürün Tagleri <span class="text-danger">*</span></h5>
                                        <input type="text" value="Lastik .. " data-role="tagsinput"
                                            placeholder="add tags" />
                                    </div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Ürün Fotoğrafı seçiniz <img src=""
                                        id = "product_image"></label>
                                <div class="col-lg-10">
                                    <input type="file" name = "image" class="form-control"
                                        onchange="productImage(this)">
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


                            </div>

                    </div>

                </div>

                <button type="submit" class="btn btn-rounded btn-info">Kaydet</button>
                </form>

            </div>
        </div>

    </section>
    <script>
        function productImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = (e) => {

                    $("#product_image").attr('src', e.target.result).height(80).width(90);
                };

                reader.readAsDataURL(input.files[0]); // "readAsDataURL" doğru metodun adıdır
            }
        }
    </script>
@endsection






@section('js')
    <script src="{{ asset('AdminTheme/assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
@endsection
