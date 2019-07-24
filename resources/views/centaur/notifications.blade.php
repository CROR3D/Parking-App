<?php
    $vars = Session::all();
    $errors = false;
    foreach ($vars as $key => $value) {
        switch($key) {
            case 'success':
            case 'error':
            case 'warning':
            case 'info':
                $errors = true;
                break;
            default:
        }
    }
?>

@if($errors)
    <p class="navbar-notification error-catch">
        <span class="text-info">
            {!! $value !!}
        </span>
    </p>
    <?php Session::forget($key); ?>
@else
    <p class="navbar-notification error-none">Welcome,
        <span class="text-info">
            {{ (Sentinel::getUser()->username) ? Sentinel::getUser()->username : Sentinel::getUser()->email }}
        </span>
    </p>
@endif
