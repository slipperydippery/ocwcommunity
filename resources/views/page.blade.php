@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 article">
				<h1 class="display-4">Dit is een titel van een artikel. Meestal is hij veel te lang. </h1>
				<p class="article-info"><a href="#" class="article-info--author">Maarten de Jager</a> - <span class="article-info--date">2 Februari</span></p>
				<div class="article-tags">
					<button type="button" class="btn btn-sm btn-outline-primary"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
sagittis lacus vel augue laoreet rutrum faucibus.">
						Orientatie
					</button>
					<button type="button" class="btn btn-sm btn-outline-primary"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
sagittis lacus vel augue laoreet rutrum faucibus.">
						HRM
					</button>
					<button type="button" class="btn btn-sm btn-outline-primary"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
sagittis lacus vel augue laoreet rutrum faucibus.">
						Volledige Samenwerking
					</button>
				</div>
				<p class="lead">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex <a href="#">ea commodo consequat</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat odio facilisis mauris sit amet massa vitae tortor. Faucibus vitae aliquet nec ullamcorper sit amet. Massa sapien faucibus et molestie ac. Justo nec ultrices dui sapien eget. Ut ornare lectus sit amet est. Viverra maecenas accumsan lacus vel facilisis volutpat est. Egestas fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate. Massa massa ultricies mi quis hendrerit dolor magna. Et tortor consequat id porta nibh venenatis. Adipiscing elit pellentesque habitant morbi. Pharetra et ultrices neque ornare aenean euismod elementum. Blandit libero volutpat sed cras ornare. Dui nunc mattis enim ut tellus elementum sagittis. Aenean euismod elementum nisi quis eleifend. Consequat ac felis donec et odio pellentesque diam. Pellentesque dignissim enim sit amet venenatis urna cursus eget.</p>

				<blockquote class="blockquote">
				  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
				  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
				</blockquote>

				<p>Justo eget magna fermentum iaculis eu non diam. A pellentesque sit amet porttitor eget dolor morbi non. Vestibulum sed arcu non odio euismod lacinia at quis risus. A cras semper auctor neque vitae tempus quam pellentesque. Condimentum lacinia quis vel eros. Etiam tempor orci eu lobortis. Odio aenean sed adipiscing diam. Ultrices tincidunt arcu non sodales neque sodales. Est ante in nibh mauris cursus mattis molestie a. Blandit aliquam etiam erat velit scelerisque in dictum non consectetur. Sem fringilla ut morbi tincidunt augue interdum velit euismod. Eget nulla facilisi etiam dignissim diam quis enim. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Purus ut faucibus pulvinar elementum integer enim.</p>

				<p>Faucibus a pellentesque sit amet. Tincidunt dui ut ornare lectus sit. Consectetur a erat nam at lectus urna duis convallis convallis. Aliquam etiam erat velit scelerisque in dictum. Netus et malesuada fames ac turpis egestas maecenas. Quisque sagittis purus sit amet volutpat consequat mauris. Pretium aenean pharetra magna ac placerat vestibulum lectus. Tortor consequat id porta nibh venenatis. A iaculis at erat pellentesque adipiscing commodo elit at imperdiet. Sit amet nulla facilisi morbi tempus iaculis. Aliquam nulla facilisi cras fermentum. Mauris ultrices eros in cursus turpis massa tincidunt dui ut. Ut sem viverra aliquet eget. Quis varius quam quisque id diam. Ante metus dictum at tempor commodo ullamcorper. Egestas tellus rutrum tellus pellentesque eu tincidunt.</p>

				
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>

			<div class="col">
				<div class="sidebar">
					<h4>Here a sidebar item</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
				</div>
			</div>
		</div>
	</div>

@endsection


{{-- @section('additional-scripts')
@endsection --}}