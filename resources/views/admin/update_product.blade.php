<!DOCTYPE html>
<html>

<head>
  @include('admin.css')
  <style>
    .div_deg {
      display: flex;
      justify-content: center;
      align-items:center;
    }
    label{
      display: inline-block;
      width: 200px;
      padding: 20px;
    }
    input[type="text"]{
      width: 200px;
      padding: 10px;
    }

    textarea{
      width: 450px;
      height: 100px;
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

        <h2>Update Product</h2>


        <div class="div_deg">

          <form action="{{url('edit_product' , $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
              <label for="">Product title</label>
              <input type="text" name="title" value="{{$product->title}}">
            </div>

            <div>
              <label for="">Description</label>
              <textarea name="description" id="">{{$product->description}}</textarea>
            </div>

            <div>

              <label for="">Price</label>
              <input type="text" name="price" value="{{$product->price}}">
            </div>
            <div>
              
            <label for="">Quantity</label>
            <input type="number" name="quantity" value="{{$product->quantity}}">
            </div>
            <div>
              
            <label for="">Product Category</label>
            <select name="category" id="">
              <option value="{{$product->category}}">{{$product->category}}</option>
              @foreach($category as $category)
                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                @endforeach
            </select>

            </div>
            <div>
              <label for="">Current Image</label>
              <img  width="150" src="/products/{{$product->image}}" alt="">
            </div>

              <div>
                <label for="">Update Image</label>
                <input type="file" name="image">
              </div>

            <input class="btn btn-success" type="submit" value="Update Category">


          </form>
        </div>





      </div>
    </div>
  </div>
  <!-- JavaScript files-->

  @include('admin.js')
</body>

</html>