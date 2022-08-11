@if(\Illuminate\Support\Facades\Session::get('msg') != null)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        {{\Illuminate\Support\Facades\Session::get('msg')}}
    </div>
@endif
