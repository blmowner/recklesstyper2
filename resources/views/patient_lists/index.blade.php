@extends('layouts.app')

@section('content')
<h1>Patient List</h1>
<br>
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Outpatient</a></li>
  <li><a data-toggle="tab" href="#menu1">Inpatient</a></li>
  <li><a data-toggle="tab" href="#menu2">Daycare</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
   
@if ($location->encounter_code !='mortuary')
@include('patient_lists.outpatient')
@endif

@if ($location->encounter_code =='emergency')
<?php 
$patients = $observations;
$title = "Observation";
?>
@include('patient_lists.patients')
@endif

  </div>
  <div id="menu1" class="tab-pane fade">

@if ($location->encounter_code !='mortuary')
<?php 
$patients = $inpatients;
$title = "Inpatient";
?>
@include('patient_lists.patients')

  </div>
  <div id="menu2" class="tab-pane fade">

<?php 
$patients = $daycare;
$title = "Daycare";
?>
@include('patient_lists.patients')
@endif

@if ($location->encounter_code =='mortuary')
<?php 
$patients = $mortuary;
$title = "Mortuary";
?>
@include('patient_lists.patients')
@endif

  </div>
</div>



@endsection
