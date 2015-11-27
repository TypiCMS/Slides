<li>
    <a href="{{ route($lang.'.slides.slug', $slide->slug) }}" title="{{ $slide->title }}">
    {{-- <a href="{{ $slide->website }}" title="{{ $slide->title }}" target="_blank"> --}}
        {!! $slide->present()->thumb(null, 200) !!}
    </a>
</li>
