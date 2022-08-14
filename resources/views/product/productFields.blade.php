<input type="hidden" name="productID" value="{{old('productID') ?? $product->productID}}">

<div class="form-group">
    <label for="product_name" class="font-weight-bold">Product's Name</label>
    <input type="text" class="form-control" id="product_name" name="product_name" value="{{old('product_name') ?? $product->product_name}}">
    @if($errors->has('product_name'))
        @foreach($errors->get('product_name') as $e)
            <div class="danger help-box">
                <i class="bi bi-x"></i>
                {{$e}}
            </div>
        @endforeach
    @endif
</div>

<div class="form-group">
    <label for="image" class="font-weight-bold">Image</label>
    <input type="file" class="form-control inputfile" id="image" name="image" value="{{old('image') ?? $product->image}}">
    <label for="image">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
        </svg>
         Choose a image...
    </label>
    @if($errors->has('image'))
        @foreach($errors->get('image') as $e)
            <div class="danger help-box">
                <i class="bi bi-x"></i>
                {{$e}}
            </div>
        @endforeach
    @endif
</div>

@if($product->image)
    <div>
        <img src="/images/product/{{old('image') ?? $product->image}}" width="50%" height="50%">
    </div>
@endif

{{--<img src="/image/product/{{ $product->image}}" width="300px" alt="">--}}

<div class="form-group">
    <label for="product_status" class="font-weight-bold">Product Status</label>
    <input type="text" class="form-control" id="product_status" name="product_status" value="{{old('product_status') ?? $product->product_status}}">
    @if($errors->has('product_status'))
        @foreach($errors->get('product_status') as $e)
            <div class="danger help-box">
                <i class="bi bi-x"></i>
                {{$e}}
            </div>
        @endforeach
    @endif
</div>

{{--@php--}}
{{--    $product->price = number_format($product->price)--}}
{{--    @endphp--}}
<div class="form-group">
    <label for="price" class="font-weight-bold">Price</label>
    <input type="number" step="any" class="form-control" id="price" name="price" value="{{old('price') ?? $product->price}}">
    @if($errors->has('price'))
        @foreach($errors->get('price') as $e)
            <div class="danger help-box">
                <i class="bi bi-x"></i>
                {{$e}}
            </div>
        @endforeach
    @endif
</div>

<div class="form-group">
    <label for="launch_date" class="font-weight-bold">Launch Date</label>
    <input type="date" class="form-control" id="launch_date" name="launch_date" value="{{old('launch_date') ?? $product->launch_date}}">
    @if($errors->has('launch_date'))
        @foreach($errors->get('launch_date') as $e)
            <div class="danger help-box">
                <i class="bi bi-x"></i>
                {{$e}}
            </div>
        @endforeach
    @endif
</div>

<div class="form-group">
    <label for="material" class="font-weight-bold">Material</label>
    <input type="text" class="form-control" id="material" name="material" value="{{old('material') ?? $product->material}}">
    @if($errors->has('material'))
        @foreach($errors->get('material') as $e)
            <div class="danger help-box">
                <i class="bi bi-x"></i>
                {{$e}}
            </div>
        @endforeach
    @endif
</div>

<div class="form-group">
    <label for="size" class="font-weight-bold">Size</label>
    <input type="text" class="form-control" id="size" name="size" value="{{old('size') ?? $product->size}}">

    @if($errors->has('size'))
        @foreach($errors->get('size') as $e)
            <div class="danger help-box">
                <i class="bi bi-x"></i>
                {{$e}}
            </div>
        @endforeach
    @endif
</div>

<div class="form-group">
    <label for="color" class="font-weight-bold">Color</label>
    <input type="text" class="form-control" id="color" name="color" value="{{old('color') ?? $product->color}}">
    @if($errors->has('color'))
        @foreach($errors->get('color') as $e)
            <div class="danger help-box">
                <i class="bi bi-x"></i>
                {{$e}}
            </div>
        @endforeach
    @endif
</div>
@php
    $styleID = old('style') ?? $product->styleID ?? null;
@endphp

<div class="form-group">
    <label for="style" class="font-weight-bold">Style</label>
    <select name="style" class="form-control" id="style" required>
        <option value="0">Please select a Style !</option>
        @foreach($style as $st)
            <option value="{{$st->styleID}}"
                {{($styleID !== null && $st->styleID == $styleID) ? 'selected' : ''}}
            >{{$st->style_name }}</option>
        @endforeach
    </select>
    @if($errors->has('style'))
        @foreach($errors->get('style') as $e)
            <span class="danger help-box">
                <i class="bi bi-x"></i>
                {{$e}}
            </span>
        @endforeach
    @endif
</div>

<div class="form-group">
    <label for="description" class="font-weight-bold">Description</label>
    <input type="text" class="form-control" id="description" name="description" value="{{old('description') ?? $product->description}}">
</div>


