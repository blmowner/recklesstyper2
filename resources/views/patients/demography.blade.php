@extends('layouts.app')

@section('content')
@include('patients.id')
<h1>
Demography
</h1>
<br>
@include('common.errors')
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
{{ Form::model($patient, ['route'=>['patients.update',$patient->patient_id],'method'=>'PUT', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }} 
	@include('patients.patient')
{{ Form::close() }}

@endsection
