<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Salon Asih</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Import dari Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 sidebar d-flex flex-column align-items-start">
        <h4 class="px-3">eProduct</h4>
        <nav class="nav flex-column w-100 px-3">
          <a class="nav-link" href="#">Dashboard</a>
          <a class="nav-link active" href="#">Order</a>
          <a class="nav-link" href="#">Statistic</a>
          <a class="nav-link" href="#">Product</a>
          <a class="nav-link" href="#">Stock</a>
          <a class="nav-link" href="#">Offer</a>
        </nav>
      </div>

      <div class="col-md-10 py-4">
        <h3>Order</h3>
        <p class="text-muted">28 orders found</p>

        <div class="order-card">
          <div class="d-flex justify-content-between mb-3">
            <div>
              <button class="btn btn-outline-primary btn-sm">All orders</button>
              <button class="btn btn-light btn-sm">Dispatch</button>
              <button class="btn btn-light btn-sm">Pending</button>
              <button class="btn btn-light btn-sm">Completed</button>
            </div>
            <div>
              <input type="date" class="form-control d-inline-block me-2" style="width: auto;">
              <input type="date" class="form-control d-inline-block" style="width: auto;">
            </div>
          </div>

          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Date</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
  @foreach($orders as $order)
    <tr @if($order['status'] === 'Dispatch') class="active-row" @endif>
      <td>{{ $order['id'] }}</td>
      <td>{{ $order['name'] }}</td>
      <td>{{ $order['address'] }}</td>
      <td>{{ $order['date'] }}</td>
      <td>{{ $order['price'] }}</td>
      <td>
        @php
          $badge = [
            'Pending' => 'warning',
            'Dispatch' => 'success',
            'Completed' => 'secondary',
          ][$order['status']];
        @endphp
        <span class="badge bg-{{ $badge }} badge-status">{{ $order['status'] }}</span>
      </td>
      <td><button class="btn btn-sm btn-outline-secondary">⚙</button></td>
    </tr>
  @endforeach
</tbody>

          </table>
          <nav>
            <ul class="pagination justify-content-end">
              <li class="page-item disabled"><a class="page-link">Previous</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</body>

</body>
</html>
