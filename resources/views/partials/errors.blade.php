@if(count($errors->all()))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $e)
            <li>{{$e}}</li>
            @endforeach
        </ul>
    </div>
@endif
