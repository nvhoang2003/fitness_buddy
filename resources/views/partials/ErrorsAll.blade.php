@if(count($errors->all()))
    <div class="row mx-5">
        <div class="col-md-12">
            <div class="alert alert-danger text-center">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
