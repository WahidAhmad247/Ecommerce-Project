<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .table{
            /* width:80%; */
            border:2px solid yellowgreen;
        }
        th{
            background-color:skyblue;
            color:white;
            font-size:19px;
            font-weight:bold;
            padding:15px;
            text-align: center;
        }
        .table td { 
            text-align:center;
            padding:10px;
            border:1px solid skyblue;
            color:white;
        }
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top:60px;
        }
    </style>
</head>

<body>
    @include('admin.header')

    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

        <table class="table">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product Tile</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Change Status</th>
                <th>Print PDF</th>
            </tr>
            @foreach($data as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->rec_address}}</td>
                <td>{{$product->phone}}</td>
                <td>{{$product->product->title}}</td>
                <td>{{$product->product->price}}</td>
                <td><img width="150" height="100" src="products/{{$product->product->image}}" alt=""></td>
                <td>
                    @if($product->status == 'in progress')
                <span style="color: red;" > {{$product->status}}</span>
                
                @elseif($product->status == 'on the way')
                
                <span style="color: skyblue;" > {{$product->status}}</span>
                
                @else
                
                <span style="color: yellow;" > {{$product->status}}</span>


                @endif
                </td>
                <td><a class="btn btn-primary" href="{{url('on_the_way' , $product->id)}}">On the way</a>
                <a class="btn btn-success" href="{{url('delivered' , $product->id)}}">Delivered</a></td>
                
                <td ><a class="btn btn-secondary" href="{{url('print_pdf' , $product->id)}}">Print PDF</a></td>
                
            </tr>
            @endforeach
        </table>

            </div>
            <div>
                
            <div class="div_deg">
                    
                    <p>{{$data->onEachSide(1)->links()}}</p>
                   </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->

    @include('admin.js')
</body>

</html>