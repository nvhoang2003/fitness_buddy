<input type="hidden" name="product_id" value="{{old('productID') ?? $product->productID}}">

<div class="form-group">
    <label for="name" class="font-weight-bold">Product's Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('product_name') ?? $product->product_name}}">
</div>

<div class="form-group">
    <label for="image" class="font-weight-bold">Image</label>
    <input type="file" class="form-control image"  id="image" name="image" value="{{old('image') ?? $product->image}}">
</div>
<img src="/image/product/{{ $product->image}}" width="300px" alt="">

<div class="form-group">
    <label for="type" class="font-weight-bold">Product Status</label>
    <input type="text" class="form-control" id="type" name="product_status" value="{{old('product_status') ?? $product->product_status}}">
</div>

{{--@php--}}
{{--    $product->price = number_format($product->price)--}}
{{--    @endphp--}}
<div class="form-group">
    <label for="price" class="font-weight-bold">Price</label>
    <input type="number" step="any" class="form-control" id="price" name="price" value="{{old('price') ?? $product->price}}">
</div>

<div class="form-group">
    <label for="date" class="font-weight-bold">Launch Date</label>
    <input type="date" class="form-control" id="date" name="launch_date" value="{{old('launch_date') ?? $product->launch_date}}">
</div>

<div class="form-group">
    <label for="brand" class="font-weight-bold">Brand</label>
    <input type="text" class="form-control" id="brand" name="brand" value="{{old('brand') ?? $product->brand}}">
</div>

<div class="form-group">
    <label for="material" class="font-weight-bold">Material</label>
    <input type="text" class="form-control" id="material" name="material" value="{{old('material') ?? $product->material}}">
</div>



@php
    $sId = old('size') ?? $product->sizeID ?? null;
@endphp

<div class="form-group">
    <label for="size" class="font-weight-bold">Size</label>
    <select name="size" class="form-control" id="size" required>
        <option value="0">Please select a size !</option>
        @foreach($size as $s)
            <option value="{{$s->sizeID}}"
                {{($sId !== null && $s->sizeID == $sId) ? 'selected' : ''}}
            >{{$s->size_name }}</option>
        @endforeach
    </select>
</div>

@php
    $cId = old('color') ?? $product->colorID ?? null;
@endphp

<div class="form-group">
    <label for="color" class="font-weight-bold">Color</label>
    <select name="color" class="form-control" id="color" required>
        <option value="0">Please select a Color !</option>
        @foreach($color as $c)
            <option value="{{$c->colorID}}"
                {{($cId !== null && $c->colorID == $cId) ? 'selected' : ''}}
            >{{$c->color_name }}</option>
        @endforeach
    </select>
</div>
@php
    $styleId = old('style') ?? $product->SID ?? null;
@endphp

<div class="form-group">
    <label for="style" class="font-weight-bold">Style</label>
    <select name="style" class="form-control" id="style" required>
        <option value="0">Please select a Style !</option>
        @foreach($style as $st)
            <option value="{{$c->colorID}}"
                {{($styleId !== null && $st->styleId == $stId) ? 'selected' : ''}}
            >{{$st->style_name }}</option>
        @endforeach
    </select>
</div>

