@if(\Illuminate\Support\Facades\Session::get('msg') != null)
    <div class="alert alert-danger alert-success fade show" role="alert">
        {{\Illuminate\Support\Facades\Session::get('msg')}}
    </div>
@endif
