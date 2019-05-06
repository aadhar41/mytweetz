<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>My Tweets</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="/">MyTweetz</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="/">Home</a>
				</li>
				
			</ul>
			
		</div>
	</nav>

	<div class="container">
		<br>
		@if(!empty($data))
			@foreach($data as $key => $tweet)
				<div class="shadow-sm p-3 mb-5 bg-white rounded">
					<h3>{{$tweet['text']}} 
						<i class="glyphicon glyphicon-heart"></i>{{$tweet['favorite_count']}}
						<i class="glyphicon glyphicon-repeat"></i>{{$tweet['retweet_count']}}
					</h3>
					@if(!empty($tweet['extended_entities']['media']))
						@foreach($tweet['extended_entities']['media'] as $i)
							<img src="{{ $i['media_url_https'] }}" width="500px;" alt="">

						@endforeach
					@endif
				</div>
			@endforeach
		@else
			<p>NO Tweets Found...</p>
		@endif
	</div>

</body>
</html>