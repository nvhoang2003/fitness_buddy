<input type="hidden" name="styleID" value="{{old('styleID') ?? $style->styleID}}">

<div class="form-group">
    <label for="style_name" class="font-weight-bold">Style Name</label>
    <input type="text" class="form-control" id="style_name" name="style_name" value="{{old('style_name') ?? $style->style_name}}">
    @if($errors->has('style_name'))
        @foreach($errors->get('style_name') as $e)
            <div class="danger help-box">
                <i class="bi bi-x"></i>
                {{$e}}
            </div>
        @endforeach
    @endif
</div>



<div class="form-group">
    <label for="image" class="font-weight-bold">Image</label>
    <input type="file" class="form-control inputfile" id="image" name="image" value="{{old('image') ?? $style->image}}">
    @if($errors->has('image'))
        @foreach($errors->get('image') as $e)
            <div class="danger help-box">
                <i class="bi bi-x"></i>
                {{$e}}
            </div>
        @endforeach
    @endif
</div>

@if($style->image)
    <div>
        <img src="/images/style/{{old('image') ?? $style->image}}" width="50%" height="50%">
    </div>
@endif

<div class="form-group">
    <label for="description" class="font-weight-bold">Description</label>
    <input type="text" class="form-control" id="description" name="description" value="{{old('description') ?? $style->description}}">
    @if($errors->has('description'))
        @foreach($errors->get('description') as $e)
            <div class="danger help-box">
                <i class="bi bi-x"></i>
                {{$e}}
            </div>
        @endforeach
    @endif
</div>

