<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="this is a food market app" />
        <meta name="author" content="Hafizh Maulana Y" />

        <title>Laporan Transactions | SientaResto</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    </head>

    <body>

        <center>
			<h2>Laporan PDF Transactions <br> SientaResto</h2>
			
            <p class="text-muted">Jln H. Sanusi Gang Hamzah No 21, Cengkareng Jakarta Barat</p>
        </center>
        
	<table class="table table-striped">
		<thead>
			<tr>
                <th>No</th>
                <th>Code</th>
				<th>Custumer Name</th>
				<th>Product</th>
				<th>Total Price</th>
				<th>Pay Bills</th>
				<th>Money Change</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($transaction as $t)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$t->transaction->order->code}}</td>
				<td>{{$t->transaction->order->custumer_name}}</td>
				<td>{{$t->product->name}}</td>
				<td>IDR {{ number_format($t->transaction->total_price)}}</td>
				<td>IDR {{number_format($t->pay_bills)}}</td>
				<td>IDR {{ number_format($t->money_change)}}</td>
			</tr>
			@endforeach
		</tbody>
    </table>       
    </body>
</html>
