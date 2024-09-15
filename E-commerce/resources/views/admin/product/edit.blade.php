 @extends('layouts.admin')

 @section('content')
     <section class="content">
         <!-- Basic Forms -->
         <div class="box">
             <div class="box-header with-border">
                 <h4 class="box-title">Ürün Düzenle</h4>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <div class="row">
                     <div class="col">
                         <form method="POST" action="{{ route('admin.product.update', $product->id) }}"
                             enctype="multipart/form-data">
                             @csrf
                             @method('PATCH')
                             <div class="row">
                                 <!-- Kategori Seçimi -->
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <h5>Kategori Seçiniz <span class="text-danger">*</span></h5>
                                         <div class="controls">
                                             <select name="category_id" class="form-control">
                                                 <option value="" selected disabled>Kategori Seçiniz</option>
                                                 @foreach ($categories as $category)
                                                     <option value="{{ $category->id }}"
                                                         {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                         {{ $category->name }}
                                                     </option>
                                                 @endforeach
                                             </select>
                                             @error('category_id')
                                                 <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                         </div>
                                     </div>
                                 </div>

                                 <!-- Marka Seçimi -->
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <h5>Marka Seçiniz <span class="text-danger">*</span></h5>
                                         <div class="controls">
                                             <select name="brand_id" class="form-control">
                                                 <option value="" selected disabled>Marka Seçiniz</option>
                                                 @foreach ($brands as $brand)
                                                     <option value="{{ $brand->id }}"
                                                         {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                         {{ $brand->name }}
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

                             <!-- Diğer Alanlar -->
                             <div class="row">
                                 <div class="col-md-6 ">

                                     <div class="form-group">
                                         <h5>Ürün Adı <span class="text-danger">*</span></h5>
                                         <div class="controls">
                                             <input type="text" name="name" value="{{ $product->name }}"
                                                 class="form-control" required>
                                         </div>
                                     </div>
                                     @error('name')
                                         <span class="text-danger">{{ $message }}</span>
                                     @enderror

                                 </div>

                               
                                 <div class="col-md-6 ">

                        <div class="form-group">
                            <h5> Üretim Yılı <span class="text-danger"></span></h5>
                            <div class="input-group">
                                <input type="" name="stock_code" value="{{ $product->production_year }}"
                                    class="form-control" 
                                   >
                            </div>
                        </div>
                        @error('stock_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror



                                 </div>

                             </div>




                             <div class="row"><!--  üçüncü sıra -->
                                 <div class="col-md-4 ">

                                     <div class="form-group">
                                         <h5> Yükseklik <span class="text-danger">*</span></h5>
                                         <div class="input-group">
                                             <input type="number" value="{{ $product->aspect_ratio }}" name="aspect_ratio"
                                                 class="form-control" required
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
                                             <input type="number" name="width" value="{{ $product->width }}"
                                                 class="form-control" required
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
                                             <input type="number" name="rim_diameter" value="{{ $product->rim_diameter }}"
                                                 class="form-control" required
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
                                             <input type="number" name="stock" value="{{ $product->stock }}"
                                                 class="form-control" required
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
                                             <input  name="price" value="{{ $product->price }}"
                                                 class="form-control" required
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
                                             <input  value="{{ $product->discount_price }}"
                                                 name="discount_price" class="form-control" 
                                                 data-validation-required-message="Bu alan zorunludur">
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
                                            <option value="A" @if(old('fuel_consumption', $product->fuel_consumption) == 'A') selected @endif>A</option>
                                            <option value="B" @if(old('fuel_consumption', $product->fuel_consumption) == 'B') selected @endif>B</option>
                                            <option value="C" @if(old('fuel_consumption', $product->fuel_consumption) == 'C') selected @endif>C</option>
                                            <option value="D" @if(old('fuel_consumption', $product->fuel_consumption) == 'D') selected @endif>D</option>
                                            <option value="E" @if(old('fuel_consumption', $product->fuel_consumption) == 'E') selected @endif>E</option>
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
                                            <option value="A" @if(old('grip', $product->grip) == 'A') selected @endif>A</option>
                                            <option value="B" @if(old('grip', $product->grip) == 'B') selected @endif>B</option>
                                            <option value="C" @if(old('grip', $product->grip) == 'C') selected @endif>C</option>
                                            <option value="D" @if(old('grip', $product->grip) == 'D') selected @endif>D</option>
                                            <option value="E" @if(old('grip', $product->grip) == 'E') selected @endif>E</option>
                                        </select>
                                    </div>  
                                </div>
                                @error('grip')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Gürültü Seviyesi (dB) <span class="text-danger"></span></h5>
                                    <div class="input-group">
                                        <input type="number" name="noise_level" value="{{ old('noise_level', $product->noise_level) }}" class="form-control" required data-validation-required-message="Bu alan zorunludur">
                                    </div>
                                </div>
                                @error('noise_level')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Beşinci sıra bitiş -->

                                <div class="row">

                                <div class="col-md-4 ">

                            <div class="form-group">
                                <h5> Stok kodu <span class="text-danger"></span></h5>
                                <div class="input-group">
                                    <input type="" name="stock_code" value="{{ $product->stock_code }}"
                                        class="form-control" required
                                       >
                                </div>
                            </div>
                            @error('stock_code')
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
                                         <!-- /.box-header -->
                                         <div class="box-body">

                                             <textarea id="editor1" value= "{{ $product->description }}"name="description" rows="10" cols="80">
                                                {{ $product->description }}
                                              </textarea>

                                         </div>
                                     </div>
                                 </div>
                             </div>



                             <div class="form-group">
                                 <h5>Kısa açıklama<span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <textarea name="short_description" id="textarea" class="form-control" required placeholder="kısa açıklama">
                                        {{ $product->short_description }}
                                    </textarea>
                                 </div>
                             </div>


                             <div class="row">
                                 <div class="col-md-6">
                                 <div class="form-group">
                                    <h5>Durum</h5>
                                    <div class="controls">
                                        <input type="checkbox" id="status" name="status" value="1" {{ $product->status ? 'checked' : '' }}>
                                        <label for="status" id="check">Aktif</label>
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



                             <!-- Diğer Alanlar -->

                             <!-- Ürün Fotoğrafı -->
                             <div class="form-group row">
                                 <label class="col-form-label col-lg-2">Ürün Fotoğrafı seçiniz <img
                                         src="{{ asset("upload/products/$product->image") }}" id="product_image"></label>
                                 <div class="col-lg-10">
                                     <input type="file" name="image" class="form-control"
                                         onchange="productImage(this)">
                                 </div>
                                 @error('image')
                                     <span class="text-danger">{{ $message }}</span>
                                 @enderror
                             </div>

                             <!-- Kaydet Butonu -->
                             <button type="submit" class="btn btn-rounded btn-info">Güncelle</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <script>
         var checkbox = document.getElementById("status");
         var checkBoxText = document.getElementById("check");

         checkbox.onchange = function() {
             if (checkbox.checked) {
                 checkBoxText.innerText = "Aktif";
             } else {
                 checkBoxText.innerText = "Pasif";
             }
         };
     </script>

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
