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
    <div container>
        <h4>Details of Bill</h4><br><br>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{$bill->id}}</td>
            </tr>
            <tr>
                <th>Customer</th>
                <td>{{$customer->name}}</td>
            </tr>
           <tr>
               <th>Date Order</th>
               <td>{{$bill->date_order}}</td>
           </tr>         
           <tr>
               <th>Payment</th>
               <td>{{$bill->payment}}</td>
           </tr>
           <tr>
               <th>Note</th>
               <td>{{$bill->note}}</td>
           </tr>
           <tr>
               <th>Products</th>
               <td>
                   <table class="table">
                       <tr>
                           <th>Product</th>
                           <th>Quantity</th>
                           <th>Price</th>
                       </tr>
                        @foreach ($billDetails as $item)
                            <tr>
                                <td>{{$item->id_product}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price_out}}</td>
                        @endforeach
                   </table>
               </td>
           </tr>
            <tr>
               <th>Total</th>
               <td>{{$bill->total}}</td>
           </tr>
        </table>
    </div>
</body>
</html>