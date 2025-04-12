<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        input[type="text"]{
            width: 400px;
            height: 50px;
            padding: 5px;
            margin-bottom: 10px;
        }
        .div-des{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top:30px;
        }
        .table_deg{
          text-align:center;
          margin:auto;
          border: 2px solid yellowgreen;
          margin-top:50px;
          width:600px ;
        }
        th
        {
          background-color:skyblue;
          color: white;
          padding:15px;
          font-size:20px;
          font-weight:bold;
        }
        td{
          color:white;
          padding:15px;
          border:1px solid skyblue;
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
            
          <h1 style="color:white;">Add Category</h1>
         <div class="div-des">
         <form action="{{url('add_category')}}" method="post">
            @csrf
            <div>
                <input type="text" name="category">
                <input class="btn btn-primary" type="submit" value="Add Category">
            </div>

         </div>
           </form>
</div>

          <div>
            <table class="table_deg">
              <tr>
                <th>Category Name</th>
                <th>Delete</th>
                <th>Edit</th>
              </tr>

              @foreach($data as $data)
              <tr>
                <td>{{$data->category_name}}</td>
                <td>
                  <a class="btn btn-success" href="{{url('edit_category' , $data->id)}}">Edit</a>
                </td>
                
                <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category' , $data->id)}}">Delete</a></td>
              </tr>
              
        @endforeach


            </table>
          </div>

      </div>
    </div>
    <!-- JavaScript files-->
        <script type="text/javascript">
          function confirmation(ev){
            ev.preventDefault();
            var urlTORedirect = ev.currentTarget.getAttribute('href');
            console.log(urlTORedirect);

            swal({
              title:"Are you sure to delete this category",
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