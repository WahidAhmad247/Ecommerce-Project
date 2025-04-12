<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            margin: 60px;
        }
        table{
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }
        th{
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: black;
        }
        td{
            border: 1px solid skyblue;
            padding: 10px;
            font: 20px;
            background-color: white;
            color: black;
        }
        .value_cart{
            text-align: center;
            margin-bottom: 50px;
            padding: 20px;
        }
        .order_deg{
            margin-top: -50px;
            padding-right: 100px;
        }
        label{
            display: inline-block;
            width: 150px;

        }
        .roder_gap{
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->



        <!-- end slider section -->
    </div>
    <!-- end hero area -->


   <div class="div_deg">
        <div class="order_deg">
            <form action="{{url('confirm_order')}}" method="post">
                @csrf
                <div class="order_gap">
                    <label for="">Receiver Name</label>
                    <input type="text" name="name" value="{{Auth::user()->name}}" >
                </div>
                <div class="order_gap">
                    <label for="">Receiver Address</label>
                    <textarea name="address" id="">{{Auth::user()->address}}</textarea>
                </div>
                <div class="order_gap">
                    <label for="">Receiver Phone</label>
                    <input type="text" name="phone" value="{{Auth::user()->phone}}">
                </div>

                <div class="order_gap">
                    
                <input type="submit" value="Place  Order" class="btn btn-primary">
                </div>
            </form>
        </div>




   <table>
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Remove</th>
        </tr>

        <?php
            $value = 0;
        
        ?>
        @foreach($cart as $cart)

        <tr>
            <td>{{$cart->product->title}}</td>        
            <td>{{$cart->product->price}}</td>        
            <td><img width="200" src="/products/{{$cart->product->image}}" alt=""></td>        
            <td><a class="btn btn-danger"  onclick="confirmation(event)" href="{{url('delete_cart' ,$cart->id )}}">Remove</a></td>        
        </tr>

            <?php 
                $value = $value + $cart->product->price;
            
            ?>
        @endforeach
    </table>
   </div>

                <div class="value_cart">
                    <h3>Total Value of Cart is : <?php  echo $value; ?></h3>
                </div>


    <!-- info section -->

    @include('home.footer')


    <script type="text/javascript">
          function confirmation(ev){
            ev.preventDefault();
            var urlTORedirect = ev.currentTarget.getAttribute('href');
            console.log(urlTORedirect);

            swal({
              title:"Are you sure to delete this Cart",
              text:"This delete will be parmanent",
              icon:"warning",
              buttons:true,
              dangerMode: true,    
            })
            .then((willCancel)=>{

              if(willCancel){
                window.location.href = urlTORedirect;
              }
            });
          }

        </script>

@include('admin.js')
</body>

</html>