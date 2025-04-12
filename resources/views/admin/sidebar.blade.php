<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{asset('admincss/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled navbar" >
                <li class="" id="home" ><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Home </a></li>
                <li class="" id="category"><a href="{{url('view_category')}}"> <i class="icon-grid"></i>Category </a></li>
                
                <li class=""><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products   </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li ><a href="{{url('add_product')}}">Add Product</a></li>
                  <li><a href="{{url('view_product')}}">View Product</a></li>
                  
                </ul>
                <li class="nav-item" id="category"><a href="{{url('view_order')}}"> <i class="icon-grid"></i>Orders</a></li>
             
        </ul>
      </nav>

      <!-- <script>

document.addEventListener('DOMContentLoaded', function() {
  const activeItemId = localStorage.getItem('activeNavItem');
  if (activeItemId) {
    const item = document.querySelector(activeItemId);
    if (item) {
      item.classList.add('active');
    }
  }
});

// مدیریت کلیک‌ها
document.querySelectorAll('.nav-item').forEach(item => {
  item.addEventListener('click', function() {
    if (!this.classList.contains('active')) {
      // حذف کلاس active از همه
      document.querySelectorAll('.nav-item').forEach(navItem => {
        navItem.classList.remove('active');
      });
      
      // اضافه کردن به آیتم جدید
      this.classList.add('active');
      
      // ذخیره در localStorage
      localStorage.setItem('activeNavItem', `#${this.id}`);
    }
  });
});

      </script> -->