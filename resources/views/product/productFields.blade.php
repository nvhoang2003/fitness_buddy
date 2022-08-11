<input type="hidden" name="product_id" value="{{old('productID') ?? $product->productID}}">

<div class="form-group">
    <label for="name" class="font-weight-bold">Product's Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('product_name') ?? $product->product_name}}">
</div>

<div class="form-group">
    <label for="image" class="font-weight-bold">Image</label>
    <input type="file" class="form-control image"  id="image" name="file_upload" value="{{old('image') ?? $product->image}}">
</div>
{{--<img src="/image/{{ $product->image}}" width="300px">--}}

<div class="form-group">
    <label for="type" class="font-weight-bold">Product Status</label>
    <input type="text" class="form-control" id="type" name="type" value="{{old('product_status') ?? $product->product_status}}">
</div>

{{--@php--}}
{{--    $product->price = number_format($product->price)--}}
{{--    @endphp--}}
<div class="form-group">
    <label for="price" class="font-weight-bold">Price</label>
    <input type="number" step="any" class="form-control" id="price" name="price" value="{{old('price') ?? $product->price}}">
</div>

<div class="form-group">
    <label for="brand" class="font-weight-bold">Brand</label>
    <input type="text" class="form-control" id="brand" name="brand" value="{{old('brand') ?? $product->brand}}">
</div>

<div class="form-group">
    <label for="material" class="font-weight-bold">Material</label>
    <input type="text" class="form-control" id="material" name="material" value="{{old('material') ?? $product->material}}">
</div>

<div class="form-group">
    <label for="stock" class="font-weight-bold">Stock</label>
    <input type="number" class="form-control" id="stock" name="stock" value="{{old('stock') ?? $product->stock}}">
</div>


