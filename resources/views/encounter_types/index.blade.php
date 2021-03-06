@extends('layouts.app')

@section('content')
<h1>Encounter Type List</h1>
<br>
<form action='/encounter_type/search' method='post'>
	<input type='text' class='form-control input-lg' placeholder="Find" name='search' value='{{ isset($search) ? $search : '' }}' autocomplete='off' autofocus>
	<input type='hidden' name="_token" value="{{ csrf_token() }}">
</form>
<br>
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<a href='/encounter_types/create' class='btn btn-primary'>Create</a>
<br>
<br>
@if ($encounter_types->total()>0)
<table class="table table-hover">
 <thead>
	<tr> 
    <th>Name</th>
    <th>Code</th> 
	<th></th>
	</tr>
  </thead>
	<tbody>
@foreach ($encounter_types as $encounter_type)
	<tr>
			<td>
					<a href='{{ URL::to('encounter_types/'. $encounter_type->encounter_code . '/edit') }}'>
						{{$encounter_type->encounter_name}}
					</a>
			</td>
			<td>
					{{$encounter_type->encounter_code}}
			</td>
			<td align='right'>
					<a class='btn btn-danger btn-xs' href='{{ URL::to('encounter_types/delete/'. $encounter_type->encounter_code) }}'>Delete</a>
			</td>
	</tr>
@endforeach
@endif
</tbody>
</table>
@if (isset($search)) 
	{{ $encounter_types->appends(['search'=>$search])->render() }}
	@else
	{{ $encounter_types->render() }}
@endif
<br>
@if ($encounter_types->total()>0)
	{{ $encounter_types->total() }} records found.
@else
	No record found.
@endif
@endsection
