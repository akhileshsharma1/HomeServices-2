<div>
    <style>
.header-list {
    display: flex;
    justify-content: space-between;
    list-style: none;
    padding: 0;
}

.location-item {
    margin-right: 20px; 
}

.live-chat-item {
    margin-left: 20px; 
    padding-right: 10px; 
    border-right: 1px solid #ccc; 
}

    </style>
    <ul class="header-list">
        <li class="location-item">
            @if(Session::has('country'))
                <a href="{{ route('home.change_location') }}"><i class="fa fa-map-marker"></i>{{ Session::get('city') }}, {{ Session::get('country') }}</a>
            @else
                <a href="{{ route('home.change_location') }}">Location</a>
            @endif
        </li>
        <!-- <li class="live-chat-item">
            <i class="fa fa-comment"></i>Live Chat
        </li> -->
    </ul>
</div>
