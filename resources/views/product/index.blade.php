@extends('Master.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4 text-center">All Product</h1>
        <div class="mr-5">
            <table class="table table-hover">
                <thead style="background-color: #acb2c7">
                <tr>
                    <th scope="col">Product Name </th>
                    <th scope="col">Price</th>
                    <th scope="col">Launch Date</th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($product as $p)
                        <tr>
                            @php
                                $p->price = number_format($p->price, 0, ',', '.');
                                $p->price .= ' USD';
                                $date = explode('-',$p->launch_date);
                                $date = $date[2].'/'.$date[1].'/'.$date[0];
                            @endphp
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
                            <td>{{$p->price}}</td>
                            <td>{{$date}}</td>
                            <td><a type="button" class="btn btn-primary btn-sm"
                                   href="{{route('product.show',['productID'=>$p->productID])}}"
                                ><i class="fa-solid fa-eye"></i></a></td>
                            <td><a type="button" class="btn btn-success btn-sm"
                                   href="{{route('product.edit',['productID'=>$p->productID])}}"
                                ><i class="fa-solid fa-pen-to-square"></i></a> </td>
                            <td><a type="button" class="btn btn-danger btn-sm"
                                   href="{{route('product.confirm',['productID'=>$p->productID])}}"
                                ><i class="fa-solid fa-trash-can"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="center">
                {{$product->links()}}
            </div>
        </div>
    </div>

@endsection

