<div>
    <div id="user-info" class="content-section mb-3 p-5">
        <div class="text-right mb-3">
            @if(Sentinel::inRole('administrator'))
                <a class="btn btn-md btn-dashboard-yellow sw-content" href="#">App Analysis</a>
            @endif
            <a class="btn btn-md btn-dashboard-info profile-content" href="#">Profile Settings</a>
        </div>
        <h2 class="text-center">User Information</h2>
        <h3 class="text-center mb-5">- <span class="text-info">Administrator</span> -</h3>
        <div>
            <h4>Current Activity:</h4>
        </div>
        <div class="ml-5">
        @if ($hasReservation == true)
            <h4>Reservation:</h4>
            <div class="ml-5">
                <h4>City: <span class="text-warning">Zadar</span></h4>
                <h4>Parking: <span class="text-warning">Foša</span></h4>
                <h4>Reservation created: <span class="text-warning">01.01.2019 14:30</span></h4>
                <h4>Reservation expires: <span class="text-warning">01.01.2019 15:00</span></h4>
                <h4>Access code: <span class="text-warning">1234</span></h4>
            </div>
        @elseif ($hadParked == true)
            <h4>Location:</h4>
            <div class="ml-5">
                <h4>City: <span class="text-warning">Zadar</span></h4>
                <h4>Parking: <span class="text-warning">Foša</span></h4>
                <h4>Entered: <span class="text-warning">01.01.2019 14:50</span></h4>
                <h4>Parked: <span class="text-warning">00:43:21</span></h4>
                <a class="btn btn-md btn-dashboard-yellow" href="#">Pay Ticket</a>
            </div>
        @else
            <h4>No current activity</h4>
        @endif
        </div>
        @include('shared.partials.dashboard.messages')
    </div>
    @if(Sentinel::inRole('administrator'))
        @include('shared.partials.dashboard.app_analysis')
        @include('shared.partials.dashboard.profile_info')
    @endif
</div>
