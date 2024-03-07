<div>
    <style>
.header-list {
    display: flex;
    justify-content: space-between;
    list-style: none;
    padding: 0;
}

.location-item {
    margin-right: 20px; /* Adjust spacing between items */
}

.live-chat-item {
    margin-left: 20px; /* Adjust spacing between items */
    padding-right: 10px; /* Add padding to align live chat icon with text */
    border-right: 1px solid #ccc; /* Add border to separate location and live chat */
}

    </style>
    <ul class="header-list">
        <li class="location-item">
            @if(Session::has('city'))
                <a href="{{ route('home.change_location') }}"><i class="fa fa-map-marker"></i>{{ Session::get('city') }}, {{ Session::get('state') }}</a>
            @else
                <a href="{{ route('home.change_location') }}">Maiti,Maitidevi</a>
            @endif
        </li>
        <li class="live-chat-item">
            <i class="fa fa-comment"></i>Live Chat
        </li>
    </ul>
</div>
