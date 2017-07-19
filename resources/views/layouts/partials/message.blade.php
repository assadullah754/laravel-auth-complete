@if(session('message'))
	<div class="container">
		<div class="alert alert-success">
			<strong>
				{{ session('message') }}
			</strong>
		</div>
	</div>
@endif