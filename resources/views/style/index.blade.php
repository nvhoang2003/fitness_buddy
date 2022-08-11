@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h2 id="icons" class="display-4 mb-0 col-md-8">Category Index</h2>
        <form class="d-flex col-md-4" role="search" action="#">
            <i class="bi bi-search icon search"></i>
            <input class="form-control me-2 search" type="search" name="search" id="search" placeholder="Search" aria-label="Search Name">
            <button type="submit" class="btn btn-outline-success search">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                </svg>
            </button>
        </form>
        @include('partials.sessionMessage')
        <table class="table table-hover">
            <thead class="thead" style="background-color: #acb2c7">
            <tr>
                <th scope="col">Name </th>
                <th scope="col"> </th>
                <th scope="col"> </th>
            </tr>
            </thead>
            <tbody>
            @foreach($style as $s)
                <tr>
                    <td>{{$s->style_name}}</td>
                    <td><a type="button" class="btn btn-success btn-sm"
                           href="
                           {{route('style.edit', ['styleID' => $s->styleID])}}
                           "
                        >Edit</a>
                    </td>

                    <td>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>
                        @include('style.modal')
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')

@endsection
