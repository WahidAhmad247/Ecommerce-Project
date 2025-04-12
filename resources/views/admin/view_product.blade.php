<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top:60px;
        }
        .table_deg{
            width:80%;
            border:2px solid yellowgreen;
        
        }
        th{
            background-color:skyblue;
            color:white;
            font-size:19px;
            font-weight:bold;
            padding:15px;
        }
        td {
            text-align:center;
            padding:10px;
            border:1px solid skyblue;
            color:white;
        }
        input[type='search']{
            width: 500px;
            height: 60px;
            margin-left: 50px;
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
           
              <h1>Veiw Product</h1>
         
              <form action="{{url('product_search')}}" method="get">
                @csrf
                <input type="search" name="search" >
                <input type="submit" value="Search" class="btn btn-secondary">
              </form>
              
              <div class="div_deg">
                  <table class="table_deg" >
                      
                      <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Category</th>
                          <th>Quantity</th>
                          <th>Image</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{!!Str::limit($product->description,40)!!}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <img height="100" width="100" src="products/{{$product->image}}" alt="Image">
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{url('update_product' , $product->id)}}">Edit</a>
                            </td>
                            <td>
                                <a onclick="confirmation(event)" href="{{url('delete_product' , $product->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="div_deg">
                    
                 <p>{{$products->onEachSide(1)->links()}}</p>
                </div>

                </div>
                
            </div>
        </div>
        <!-- JavaScript files-->

        <script >
            function confirmation(ev){
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href');
                console.log(urlToRedirect);

                swal({
                    title:"Are You Sure?",
                    text:"This delete will be parmanent",
                    icon:"warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willCancel) =>{
                    if(willCancel){
                        window.location.href = urlToRedirect;
                    }
                 });  
            }


        </script>
        
        @include('admin.js')
    
</body>
</html>






