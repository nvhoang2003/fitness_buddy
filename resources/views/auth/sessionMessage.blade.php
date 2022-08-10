@if(\Illuminate\Support\Facades\Session::get('msg') != null)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{\Illuminate\Support\Facades\Session::get('msg')}}
    </div>
@endif
