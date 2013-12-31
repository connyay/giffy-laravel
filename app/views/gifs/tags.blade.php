<ol class="giffy-tag-cloud">
    <li>Tags:</li>
    @foreach(Auth::user()->tags()->has('gifs')->rememberForever()->cacheTags( 'tags' )->get() as $tag)
    <li><a href="{{ URL::to('gifs/tag', array('tag'=>$tag->name)) }}">
        <span class="label {{ (Request::is('gifs/tag/'.$tag->name) ? 'label-primary' : 'label-info') }}">
            {{{ $tag->name }}} ({{ $tag->gifs()->rememberForever()->cacheTags( 'tags' )->count() }})</span>
        </a></li>
        @endforeach
    </ol>
