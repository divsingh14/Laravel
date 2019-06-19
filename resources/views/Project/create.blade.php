@extends('layout')
@section('content')
	<h1 class="title">Create Project</h1>
	<form method="POST" class="box" action="/projects">
		@csrf
		<div class="field">
			<label class="label">Project Title</label>
			<div class="control">
				<input type="text" name="title" class="input {{$errors->has('title')? 'is-danger' : ''}}" required placeholder="Project Title" value="{{old('title')}}">
			</div>
		</div>
		<div class="field">
			<label class="label">Project Description</label>
			<div class="control">
				<textarea name="description" class="textarea {{$errors->has('description')? 'is-danger' : ''}}" required placeholder="Project Description" value="{{old('description')}}"></textarea>
			</div>
		</div>
		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Create Project</button>
			</div>
		</div>
		@include ('errors')
	</form>
@endsection