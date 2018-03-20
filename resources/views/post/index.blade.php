@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12 forum">
				<h1 class="display-4">Forum </h1>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-9 pageblock forum-list">
				<div class="forum-post">
					<a href="#"><h5>Waar kan ik informatie vinden over de nieuwe regelgeving omtrent volledige samenwerking?</h5></a>
					<p class="post-info"><a href="#" class="post-info--author">Maarten de Jager</a> - <span class="post-info--date">2 Februari</span></p>
					<p class="snippet">Dit is een kort stukje van de tekst. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex. </p>
					<div class="article-tags">
						<button type="button" class="btn btn-sm btn-outline-primary"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
	sagittis lacus vel augue laoreet rutrum faucibus.">
							Orientatie
						</button>
						<button type="button" class="btn btn-sm btn-outline-primary"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
	sagittis lacus vel augue laoreet rutrum faucibus.">
							Bestuurders
						</button>
						<button type="button" class="btn btn-sm btn-outline-primary"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
	sagittis lacus vel augue laoreet rutrum faucibus.">
							Volledige Samenwerking
						</button>
					</div>
				</div>

				<div class="forum-post">
					<a href="#"><h5>Actief integreren van gescheiden Blackboard omgevingen.</h5></a>
					<p class="post-info"><a href="#" class="post-info--author">Maarten de Jager</a> - <span class="post-info--date">2 Februari</span></p>
					<p class="snippet">Dit is een kort stukje van de tekst. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex. </p>
					<div class="article-tags">
						<button type="button" class="btn btn-sm btn-outline-primary"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
	sagittis lacus vel augue laoreet rutrum faucibus.">
							Uitvoering
						</button>
						<button type="button" class="btn btn-sm btn-outline-primary"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
	sagittis lacus vel augue laoreet rutrum faucibus.">
							Bestuurders
						</button>
						<button type="button" class="btn btn-sm btn-outline-primary"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
	sagittis lacus vel augue laoreet rutrum faucibus.">
							Volledige Samenwerking
						</button>
					</div>
				</div>

				<div class="forum-post">
					<a href="#"><h5>Wie kan me helpen met het opzetten van een gezamenlijk inkoop systeem?</h5></a>
					<p class="post-info"><a href="#" class="post-info--author">Maarten de Jager</a> - <span class="post-info--date">2 Februari</span></p>
					<p class="snippet">Dit is een kort stukje van de tekst. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex. </p>
					<div class="article-tags">
						<button type="button" class="btn btn-sm btn-outline-primary"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
	sagittis lacus vel augue laoreet rutrum faucibus.">
							Uitvoering
						</button>
						<button type="button" class="btn btn-sm btn-outline-primary"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
	sagittis lacus vel augue laoreet rutrum faucibus.">
							HRM
						</button>
						<button type="button" class="btn btn-sm btn-outline-primary"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
	sagittis lacus vel augue laoreet rutrum faucibus.">
							Volledige Samenwerking
						</button>
						<button type="button" class="btn btn-sm btn-outline-primary"  data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
	sagittis lacus vel augue laoreet rutrum faucibus.">
							Gedeeltelijke Samenwerking
						</button>
					</div>
				</div>


			</div>
			<div class="col-md-3">
				<div class="sidebar">
					<h4>Filters</h4>
					<div class="sidebar--block">
						<h5>Fase</h5>
						<div class="btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-outline-secondary">
							<input type="checkbox" checked autocomplete="off"> Orientatie
							</label>
							<label class="btn btn-outline-secondary">
							<input type="checkbox" checked autocomplete="off"> Afweging
							</label>
							<label class="btn btn-outline-secondary">
							<input type="checkbox" checked autocomplete="off"> Besluitvorming
							</label>
							<label class="btn btn-outline-secondary">
							<input type="checkbox" checked autocomplete="off"> Uitvoering
							</label>
						</div>
					</div>
	
					<div class="sidebar--block">
						<h5>Afdeling/Rollen</h5>
						<div class="btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-outline-secondary">
							<input type="checkbox" checked autocomplete="off"> Bestuurders
							</label>
							<label class="btn btn-outline-secondary">
							<input type="checkbox" checked autocomplete="off"> Docent(teams)
							</label>
							<label class="btn btn-outline-secondary">
							<input type="checkbox" checked autocomplete="off"> ICT
							</label>
							<label class="btn btn-outline-secondary">
							<input type="checkbox" checked autocomplete="off"> Communicatie
							</label>
							<label class="btn btn-outline-secondary">
							<input type="checkbox" checked autocomplete="off"> HRM
							</label>
						</div>
					</div>
						
					<div class="sidebar--block">
						<h5>Sanemwerkingsvorm</h5>
						<div class="btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-outline-secondary">
							<input type="checkbox" checked autocomplete="off"> Volledige Samenwerking
							</label>
							<label class="btn btn-outline-secondary">
							<input type="checkbox" checked autocomplete="off"> Gedeeltelijke Samenwerking
							</label>
							<label class="btn btn-outline-secondary">
							<input type="checkbox" checked autocomplete="off"> Nog een vorm
							</label>
							<label class="btn btn-outline-secondary">
							<input type="checkbox" checked autocomplete="off"> Nog een vorm
							</label>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection


{{-- @section('additional-scripts')
@endsection --}}