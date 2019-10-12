@foreach($data  as $domain)
	<tr>
		<td>{{$domain->id}}</td>
		<td>{{$domain->name}}</td>
		<td>
		<a href="{{url('admin/editDomain')}}/{{$domain->id}} " class="btn btn-primary btn-xs">Modifier</a>
		<form action="{{ url('admin/deleteDomaines', ['id' => $domain->id])}}" 
			method="POST"
			enctype="multipart/form-data"
			class = "inline-block"
			onsubmit="return confirm('Etes-vous sur de vouloir supprimer?')">
			{{csrf_field()}}
			{{method_field('DELETE')}}
			<input type="submit" value="Supprimer" class="btn btn-danger btn-xs">
		</form>
		</td>
	</tr>
@endforeach