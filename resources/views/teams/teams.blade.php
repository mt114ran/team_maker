<ul class="list-unstyled">
    @foreach ($teams as $team)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($team->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $team->user->name, ['id' => $team->user->id]) !!} <span class="text-muted">posted at {{ $team->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">タイトル　：{!! nl2br(e($team->title)) !!}</p>
                    <p class="mb-0">競技種目　：{!! nl2br(e($team->sports_name)) !!}</p>
                    <p class="mb-0">場所　　　：{!! nl2br(e($team->location)) !!}</p>
                    <p class="mb-0">住所　　　：{!! nl2br(e($team->location_add)) !!}</p>
                    <iframe src="//www.google.com/maps/embed/v1/search?key=AIzaSyDmX-MkSvtHRrHCQk1qpkB5Ev28OsMrXTY&q=urlencode({!! nl2br(e($team->location)) !!})"></iframe>
                    <p class="mb-0">募集人数　：{!! nl2br(e($team->rec_num)) !!}</p>
                    <p class="mb-0">最大募集数：{!! nl2br(e($team->max_num)) !!}</p>
                    <p class="mb-0">現在の人数：{!! nl2br(e($team->now_num)) !!}</p>
                    
                </div>
                <div>
                    @if (Auth::id() == $team->user_id)
                        {!! Form::open(['route' => ['teams.destroy', $team->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $teams->links('pagination::bootstrap-4') }}