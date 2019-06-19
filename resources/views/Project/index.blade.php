@extends('layout')
@section('title','Project')
@section('content')
	<h1 class="title">PROJECTS</h1>
	<ul >
	@foreach($projects as $projects)
		<li class="box">
			<a class="project_links" href="/projects/{{$projects->id}}">{{ $projects->title }}</a>
		</li>
	@endforeach
	</ul>
@endsection