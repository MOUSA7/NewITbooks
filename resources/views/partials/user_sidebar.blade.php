@if($user->about)
    <div>
        <h2>About</h2>
        <hr>

        <p>{{$user->about}}</p>
    </div>
@endif
<hr>
@if($user->facebook || $user->github || $user->website)
    <div>
        <h3>Social Accounts :</h3>
        <ol class="list-unstyled">
            @if($user->facebook)

                <li><a href="http://{{$user->facebook}}">{{$user->facebook}}</a></li>

            @endif
            <hr>
            @if($user->github)

                <li><a href="http://{{$user->github}}">{{$user->github}}</a></li>

            @endif
            <hr>
            @if($user->website)

                <li><a href="http://{{$user->website}}">{{$user->website}}</a></li>

            @endif
        </ol>
    </div>
@endif
