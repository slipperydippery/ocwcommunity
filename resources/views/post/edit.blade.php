@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12 forum">
				<h1 class="display-4">Nieuw Forum Bericht</h1>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-9 pageblock forum-list">
				<form action="{{ route('post.update', $post) }}" method="post" accept-charset="utf-8">
				    {{ csrf_field() }}
					@include('post.partials.form', ['submittext' => 'Plaats Bericht'])
				</form>
			</div>
			<div class="col-md-3">
				<div class="sidebar">
					<h4>Richtlijnen voor het plaatsen van een bericht</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, iste iusto? Fugiat commodi tempora accusantium repellendus magnam, architecto, velit. Sit, sed nulla optio numquam aspernatur totam doloribus animi accusamus nam?</p>
				</div>
			</div>
		</div>
	</div>

@endsection


{{-- @section('additional-scripts')
@endsection --}}