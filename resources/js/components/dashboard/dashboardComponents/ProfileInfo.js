import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class ProfileInfo extends Component
{
    render() {
        return (
            <div className="mb-3">
                <form acceptCharset="UTF-8" role="form" method="post" action="">
                    <div className="row">
                        <div className="col-md-6 offset-md-3">
                            <div className="mb-4">
                                <h5>Username: </h5>
                                <div className="form-group">
                                    <input id="username_input" className="form-control" type="text" name="username" value="" readOnly/>
                                </div>
                                <a id="change_username" className="btn btn-default btn-dashboard-yellow">
                                    <span className="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    Change
                                </a>
                                <a id="save_username" className="btn btn-default btn-dashboard-info">
                                    <span className="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    Save Changes
                                </a>
                            </div>

                            <div className="mb-4">
                                <h5>Email: </h5>
                                <div className="form-group">
                                    <input id="email_input" className="form-control" type="text" name="email" value="" readOnly/>
                                </div>
                                <a id="change_email" className="btn btn-default btn-dashboard-yellow">
                                    <span className="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    Change
                                </a>
                                <a id="save_email" className="btn btn-default btn-dashboard-info">
                                    <span className="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    Save Changes
                                </a>
                            </div>

                            <div className="mb-4">
                                <h5>Change password: </h5>
                                <div className="ml-5">
                                    <h5>Old password: </h5>
                                    <div className="form-group">
                                        <input className="form-control" type="text" name="old_password"/>
                                    </div>
                                    <div className="form-group">
                                        <h5>New password: </h5>
                                        <input className="form-control" type="password" name="new_password"/>
                                    </div>
                                    <div className="form-group">
                                        <h5>Confirm new password: </h5>
                                        <input className="form-control" type="password" name="confirm_password"/>
                                    </div>
                                </div>
                            </div>

                            <div className="mb-4">
                                <h5>Credit card information</h5>
                                <div className="ml-5">
                                    <h5>Credit card number: </h5>
                                    <div className="form-group">
                                        <input id="card_input" className="form-control" type="text" name="credit_card" value="" readOnly/>
                                    </div>
                                    <a id="change_card" className="btn btn-default btn-dashboard-yellow">
                                        <span className="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Change
                                    </a>
                                    <a id="save_card" className="btn btn-default btn-dashboard-info">
                                        <span className="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Save Changes
                                    </a>
                                </div>
                            </div>

                            <div className="mb-4">
                                <div>
                                    <h5>Pull from card: </h5>
                                    <div className="form-group">
                                        <input className="form-control" type="number" name="account" min="0"/> kn
                                    </div>
                                </div>
                            </div>
                            <button className="btn btn-md btn-dashboard-info" type="submit" name="profile_data">Submit data</button>
                        </div>
                    </div>
                </form>
            </div>
        );
    }
}

export default ProfileInfo;
