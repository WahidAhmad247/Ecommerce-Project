<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .div_deg{
            display:flex;
            justify-content: center;
            align-items: center;
            margin-top:60px;
        }
        h1{
            color:white;
        }
        label{
            display: inline-block;
            color: white !important;
            font-size: 18px !important;
            width: 250px !important;
        }
        input[type="text"]{
            width: 350px;
            height: 50px;
        }
        textarea{
            width: 450px;
        }
        .input_deg{
            margin-top:20px;
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
        <h1>Add Product</h1>
          <div class="div_deg">
            <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input_deg">
                    <label for="">Product title</label>
                    <input type="text" name="title" required>
                </div>
                    <div class="input_deg" >
                        <label for="">Description</label>
                        <textarea name="description" required>
                        </textarea>
                    </div>
                    <div class="input_deg">
                        <label for="">Price</label>
                        <input type="text" name="price" >
                    </div>
                    <div class="input_deg">
                        <label for="">Quantity</label>
                        <input type="number" name="qty">
                    </div> 
                    
                    
                    <div class="input_deg">
                        <label for="">Product Category</label>
                        <select name="category" required id="">

                            <option value="" >Select a Category</option>

                            @foreach($category as $category)

                            <option value="{{$category->category_name}}">{{  $category->category_name}} </option>

                            @endforeach
                        </select>
                    </div>
                    
                    <div class="input_deg">
                        <label for="">Image</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" value="Add product">
                    </div>
            </form>
          </div>




</div>
      </div>
    </div>
    <!-- JavaScript files-->
   
    @include('admin.js')
  </body>
</html>