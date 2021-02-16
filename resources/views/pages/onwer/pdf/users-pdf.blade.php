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
            <h2>Laporan PDF Users<br> SientaResto</h4>
            <p class="text-muted">Jln H. Sanusi Gang Hamzah No 21, Cengkareng Jakarta Barat</p>
        </center>
        
	<table class="table table-striped">
		<thead>
			<tr>
                <th>No</th>
                <th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Tanggal</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($users as $user)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $user->name}}</td>
				<td>{{ $user->email}}</td>
				<td>{{ $user->role->name_role }}</td>
				<td>{{ $user->created_at->format('d, F Y') }}</td>
			</tr>
			@endforeach
		</tbody>
    </table>       
    </body>
</html>
