<div>

    <a href="#"
        wire:click.prevent="save({{ $product->id }}, '{{ $product->name }}', '{{ $product->image }}', {{ $product->price }}, '{{ $product->brand->name }}')"
        class="primary__btn">Sepete Ekle</a>

   
</div>
