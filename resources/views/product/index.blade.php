@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4 text-center">All Product</h1>
        <div class="mr-5">
            <table class="table table-success table-hover">
                <thead >
                <tr>
                    <th scope="col">Product Name </th>
                    <th scope="col">Status</th>
                    <th scope="col">Price</th>
                    <th scope="col">Launch Date</th>
                    <th scope="col">Size</th>
                    <th scope="col">Style</th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($product as $p)
                        <tr>
                            <td>
                            <span class="mytooltip tooltip-effect-1" >
                                {{$p->product_name}}
                                <span class="tooltip-content" >
{{--                                    <form enctype="multipart/form-data">--}}
                                <img src="/images/product/{{ $p->image}}">
{{--                                    </form>--}}
                                </span>
                            </span>
                            </td>
                            <td>{{$p->product_status}}</td>
                            <td>{{$p->price}}</td>
                            <td>{{$p->launch_date}}</td>
                            <td>{{$p->size}}</td>
                            <td>{{$p->style}}</td>
                            <td><a type="button" class="btn btn-dark btn-sm"
{{--                                   href="{{route('Event.confirm',['eventid'=>$e->eventid])}}"--}}
                                ><i class="fa-solid fa-eye"></i></a></td>
                            <td><a type="button" class="btn btn-success btn-sm"
{{--                                   href="{{route('Event.edit',['eventid'=>$e->eventid])}}"--}}
                                ><i class="fa-solid fa-pen-to-square"></i></a> </td>
                            <td><a type="button" class="btn btn-danger btn-sm"
{{--                                   href="{{route('Event.confirm',['eventid'=>$e->eventid])}}"--}}
                                ><i class="fa-solid fa-trash-can"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

@endsection


