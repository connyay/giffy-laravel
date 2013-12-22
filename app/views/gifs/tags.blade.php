<ol class="giffy-tag-cloud">
	<li>Tags:</li>
	@foreach(Auth::user()->tags()->has('gifs')->get() as $tag)
	<li><a href="{{ URL::to('gifs/tag', array('tag'=>$tag->name)) }}">
		<span class="label {{ (Request::is('gifs/tag/'.$tag) ? 'label-primary' : 'label-info') }}">
			{{{ $tag->name }}} ({{ $tag->gifs()->count() }})</span>
		</a></li>
		@endforeach
	</ol>
