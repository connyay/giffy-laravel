<ol class="giffy-tag-cloud">
	<li>Tags:</li>
	@foreach(Auth::user()->tags()->lists("name") as $tag)
	<li><a href="{{ URL::to('gifs/tag', array('tag'=>$tag)) }}">
		<span class="label {{ (Request::is('gifs/tag/'.$tag) ? 'label-primary' : 'label-info') }}">{{{ $tag }}}</span>
	</a></li>
	@endforeach
</ol>
