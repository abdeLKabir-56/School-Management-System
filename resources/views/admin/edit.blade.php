@extends('layouts.Etudiant')



@section('content')
<div class="card">
	<div class="card-header">Edit Student</div>
	<div class="card-body">
		<form method="post" action="{{ route('admin.update', $etudiant->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<div class="col-sm-10">
					<input type="text" name="etudiant_nom" class="form-control" value="{{ $etudiant->nom }}" />
				</div>
			</div>
			<div class="row mb-3">
				
				<div class="col-sm-10">
					<input type="text" name="etudiant_prenom" class="form-control" value="{{ $etudiant->prenom }}" />
				</div>
			</div>
            <div class="row mb-3">
				
				<div class="col-sm-10">
					<input type="text" name="etudiant_email" class="form-control" value="{{ $etudiant->email }}" />
				</div>
			</div>
            <div class="row mb-3">
				
				<div class="col-sm-10">
					<input type="text" name="etudiant_DateNaissance" class="form-control" value="{{ $etudiant->DateNaissance }}" />
				</div>
			</div>
            <div class="row mb-3">
				
				<div class="col-sm-10">
					<input type="text" name="etudiant_telephone" class="form-control" value="{{ $etudiant->telephone }}" />
				</div>
			</div>
           
            <div class="row mb-3">
				
				<div class="col-sm-10">
					<input type="text" name="etudiant_filiere" class="form-control" value="{{ $etudiant->filiere }}" />
				</div>
			</div>
           
			
			
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $etudiant->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>


@endsection