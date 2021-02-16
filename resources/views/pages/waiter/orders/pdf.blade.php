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

        <title>Laporan Orders | SientaResto</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    </head>

    <body>

        <center>
            <h2>Laporan PDF Orders <br> SientaResto</h4>
            <p class="text-muted">Jln H. Sanusi Gang Hamzah No 21, Cengkareng Jakarta Barat</p>
        </center>
        
	<table class="table table-striped">
		<thead>
			<tr>
                <th>No</th>
                <th>Code</th>
				<th>Custumer Name</th>
				<th>Jumlah Product</th>
				<th>Number Table</th>
				<th>Tanggal</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($orders as $o)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $o->code}}</td>
				<td>{{ $o->custumer_name}}</td>
				<td>{{ $o->amount}}</td>
				<td>{{ $o->table->number_table }}</td>
				<td>{{ $o->created_at->format('d, F Y') }}</td>
			</tr>
			@endforeach
		</tbody>
    </table>       
    </body>
</html>
