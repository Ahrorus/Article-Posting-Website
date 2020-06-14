@extends ('layout')

@section ('content')
<div id="wrapper">
	<div id="page" class="container">
        @forelse ($articles as $article)
			<div id="content">
				<h1><a href="/articles/{{ $article->id }}" >{{ $article->title }}</a></h1>
				<p><img src="/images/banner.jpg" alt="" class="image image-full"/></p>
				{{ $article->excerpt }}
			</div>
		@empty
			<p>No relevant articles yet.</p>
        @endforelse
	</div>
</div>
@endsection
