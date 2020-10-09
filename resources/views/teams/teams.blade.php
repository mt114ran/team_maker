<ul class="list-unstyled">
    @foreach ($teams as $team)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($team->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $team->user->name, ['id' => $team->user->id]) !!} <span class="text-muted">posted at {{ $team->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($team->content)) !!}</p>
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