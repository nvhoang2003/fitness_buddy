@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4 text-center">Style All</h1>
        <table class="table table-hover">
            <thead class="thead" style="background-color: #acb2c7">
            <tr>
                <th scope="col">Name </th>
                <th scope="col"> </th>
                <th scope="col"> </th>
                <th scope="col"> </th>
            </tr>
            </thead>
            <tbody>
            @foreach($style as $s)
                <tr>
                    <td>{{$s->style_name}}</td>

                    <td>
                        <a type="button" class="btn btn-primary btn-sm" href="{{route('style.show', ['styleID'=>$s->styleID])}}">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>

                    <td>
                        <a type="button" class="btn btn-success btn-sm" href="{{route('style.edit', ['styleID' => $s->styleID])}}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>

                    <td>
                        <a type="button" class="btn btn-danger btn-sm" href="{{route('style.confirm',['styleID'=> $s->styleID])}}">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')

@endsection
