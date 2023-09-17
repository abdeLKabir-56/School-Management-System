@extends('layouts.Etudiant')


<style>
.card-body{
	position: relative;
	top:20px;
	left:40px;
}	
.card{
	position: relative;
	left:50px;
	top:50px;
}
.btn{
	position: relative;
	left:90%;
	
}
</style>
@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Student Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('admin.index', $etudiant->id) }}" class="btn btn-primary btn-sm float-end">View All</a>
				
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Student Name</b></label>
			<div class="col-sm-10">
				{{ $etudiant->nom }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Student Email</b></label>
			<div class="col-sm-10">
      {{ $etudiant->email}}
			</div>
		</div>
    <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b> date de naissance</b></label>
			<div class="col-sm-10">
      {{ $etudiant->DateNaissance}}
			</div>
		</div>
    <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Student telephone</b></label>
			<div class="col-sm-10">
      {{ $etudiant->telephone}}
			</div>
		</div>
    <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Student telephone</b></label>
			<div class="col-sm-10">
      {{ $etudiant->filiere }}
			</div>
		</div>
		
	</div>
</div>
@endsection