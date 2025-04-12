<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('home.css')

    <style>
        .div_center{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        table{
            text-align: center;
            border: 2px solid black;
            width: 800px;

        }
        th{
            border: 2px solid skyblue;
            text-align: center;
            font-size: 19px;
            font-weight: bold;
            background-color: black;
            color: white;
        }
        td{
            padding: 10px;
            border: 1px solid skyblue;
        }
    </style>
</head>
<body>
    
    
  <div class="hero_area">
    <!-- header section strats -->
   @include('home.header')
</div>

    <div class="div_center">

        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Delivery Status</th>
                <th>Image</th>
            </tr>

            @foreach($order as $order)
            <tr>
                <td>{{ $order->product->title}}</td>
                <td>{{ $order->product->price}}</td>
                <td>{{ $order->status}}</td>
                <td>
                    <img src="products/{{ $order->product->image}}" width="150px" alt="">
                </td>
            </tr>
            @endforeach
        </table>
    </div>




@include('home.footer')
</body>
</html>