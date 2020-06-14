@extends ('layout')

@section ('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<h1>{{ $article->title }}</h1>
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			{{ $article->body }}
			<p>
			@foreach ($article->tags as $tag)
				<a href="/articles?tag={{ $tag->name }}">{{ $tag->name }}</a>
			@endforeach
			</p>
		</div>
	</div>
</div>
@endsection
