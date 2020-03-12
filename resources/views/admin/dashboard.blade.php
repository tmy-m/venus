<!DOCTYPE html>
<html lang="en">
<head>
  <title>Venus Studio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@if (auth()->check())
<div class="container mt-3">
    <h2>Admin</h2>
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
          <a class="nav-link active" href="#dashboard">Dashboard</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#user">Users</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#type">Types</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#product">Products</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#bill">Bills</a>
      </li>
    </ul>
  
    <!-- Tab panes -->
    <div class="tab-content">
      <div id="dashboard" class="container tab-pane active"><br>
          <h3>Dashboard</h3>
          <p>
              Welcome back, 
              {{auth()->user()->name}}    
          </p>
          <a href="{{route('admin_logout')}}">Log out</a>
      </div>
      <div id="user" class="container tab-pane fade"><br>
          <h3>User</h3>
          <a href="{{Route('addUser')}}">Add</a>
          <table class="table">
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Admin</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
              @foreach ($users as $item)
                  <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->admin}}</td>
                      <td><a href="{{route('editUser', $item->id)}}">Edit</a></td>
                      <td><a href="{{route('deleteUser', $item->id)}}">Delete</a></td>
                  </tr>   
              @endforeach
          </table>
      </div>
  
      <div id="type" class="container tab-pane fade"><br>
          <h3>Type</h3>
          <a href="{{route('addType')}}">Add</a>
          <table class="table">
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
              @foreach ($types as $item)
                  <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->description}}</td>
                      <td><a href="{{route('editType', $item->id)}}">Edit</a></td>
                      <td><a href="{{route('deleteType', $item->id)}}">Delete</a></td>
                  </tr>   
              @endforeach
          </table>
          
      </div>
      <div id="product" class="container tab-pane fade"><br>
          <h3>Product</h3>
          <a href="{{route('addProduct')}}">Add</a>
          <table class="table">
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Type</th>
                  <th>Image</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
              @foreach ($products as $item)
                  <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->description}}</td>
                      <td>{{$item->price_out}}</td>
                      {{-- <td>{{$item->id_type}}</td> --}}
                      <td>{{DB::table('type_products')->where('id', '=', $item->id_type)->get('name')}}</td>
                      <td><img src="/frontend/img/products/{{$item->image}}" style="height:80px;"></td>
                      <td><a href="{{route('editProduct', $item->id)}}">Edit</a></td>
                      <td><a href="{{route('deleteProduct', $item->id)}}">Delete</a></td>
                  </tr>   
              @endforeach
          </table>
      </div>
  
      <div id="bill" class="container tab-pane fade"><br>
          <h3>Bill</h3>
          <table class="table">
              <tr>
                  <th>ID</th>
                  <th>Customer</th>
                  <th>Date Order</th>
                  <th>Total</th>
                  <th>Payment</th>
                  <th>Note</th>
                  <th>View</th>
                  <th>Delete</th>
              </tr>
              @foreach ($bills as $item)
                  <tr>
                      <td>{{$item->id}}</td>
                      {{-- <td>{{$item->id_customer}}</td> --}}
                      <td>{{DB::table('customers')->where('id', '=' , $item->id_customer)->get('name')}}</td>
                      <td>{{$item->date_order}}</td>
                      <td>{{$item->total}}</td>
                      <td>{{$item->payment}}</td>
                      <td>{{$item->note}}</td>
                      <td><a href="{{route('viewBillDetails', $item->id)}}">View</a></td>
                      <td><a href="{{route('deleteBill', $item->id)}}">Delete</a></td>
                  </tr>   
              @endforeach
          </table>
      </div>
    </div>
  </div>
@else
    Bạn không được cấp quyền truy cập
@endif


<script>
    $(document).ready(function(){
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
    });
</script>

</body>
</html>