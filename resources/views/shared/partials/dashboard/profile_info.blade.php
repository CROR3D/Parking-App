<div id="profile-info" class="content-section mb-3 p-5">
    <div class="text-right">
        <a class="btn btn-md btn-dashboard-yellow sw-content" href="#">User Information</a>
    </div>
    <h2 class="text-center mb-5">Profile Information</h2>
        <form accept-charset="UTF-8" role="form" method="post" action="{{ route('profile_form') }}">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="mb-4">
                        <h5>Username: </h5>
                        <div class="form-group">
                            <input id="username_input" class="form-control" type="text" name="username" value="" readonly/>
                        </div>
                        <a id="change_username" class="btn btn-default btn-dashboard-yellow">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            Change
                        </a>
                        <a id="save_username" class="btn btn-default btn-dashboard-info">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            Save Changes
                        </a>
                        {!! ($errors->has('username')) ? $errors->first('username', '<p class="text-danger">:message</p>') : '' !!}
                    </div>

                    <div class="mb-4">
                        <h5>Email: </h5>
                        <div class="form-group">
                            <input id="email_input" class="form-control" type="text" name="email" value="" readonly/>
                        </div>
                        <a id="change_email" class="btn btn-default btn-dashboard-yellow">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            Change
                        </a>
                        <a id="save_email" class="btn btn-default btn-dashboard-info">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            Save Changes
                        </a>
                        {!! ($errors->has('email')) ? $errors->first('email', '<p class="text-danger">:message</p>') : '' !!}
                    </div>

                    <div class="mb-4">
                        <h5>Change password: </h5>
                        <div class="ml-5">
                            <h5>Old password: </h5>
                            <div class="form-group">
                                <input class="form-control" type="text" name="old_password"/>
                                {!! ($errors->has('old_password')) ? $errors->first('old_password', '<p class="text-danger">:message</p>') : '' !!}
                            </div>
                            <div class="form-group">
                                <h5>New password: </h5>
                                <input class="form-control" type="password" name="new_password"/>
                                {!! ($errors->has('new_password')) ? $errors->first('new_password', '<p class="text-danger">:message</p>') : '' !!}
                            </div>
                            <div class="form-group">
                                <h5>Confirm new password: </h5>
                                <input class="form-control" type="password" name="confirm_password"/>
                                {!! ($errors->has('confirm_password')) ? $errors->first('confirm_password', '<p class="text-danger">:message</p>') : '' !!}
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5>Credit card information</h5>
                        <div class="ml-5">
                            <h5>Credit card number: </h5>
                            <div class="form-group">
                                <input id="card_input" class="form-control" type="text" name="credit_card" value="" readonly/>
                            </div>
                            <a id="change_card" class="btn btn-default btn-dashboard-yellow">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                Change
                            </a>
                            <a id="save_card" class="btn btn-default btn-dashboard-info">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                Save Changes
                            </a>
                            {!! ($errors->has('credit_card')) ? $errors->first('credit_card', '<p class="text-danger">:message</p>') : '' !!}
                        </div>
                    </div>

                    <div class="mb-4">
                        <div>
                        @if(true)
                            <h5>Pull from card: </h5>
                            <div class="form-group">
                                <input class="form-control" type="number" name="account" min="0"/> kn
                            </div>
                            {!! ($errors->has('account')) ? $errors->first('account', '<p class="text-danger">:message</p>') : '' !!}
                        @endif
                        </div>
                    </div>
                    <button class="btn btn-md btn-dashboard-info" type="submit" name="profile_data">Submit data</button>
                </div>
            </div>
        </form>
</div>
