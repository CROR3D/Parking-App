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
                            <div className="profile-form-group mb-4">
                                <input id="username_input" className="profile-input" type="text" name="username"/>
                                <span className="profile-input-focus" data-placeholder="Username"></span>
                            </div>

                            <div className="profile-form-group mb-4">
                                <input id="email_input" className="profile-input" type="text" name="email"/>
                                <span className="profile-input-focus" data-placeholder="Email"></span>
                            </div>

                            <div className="profile-form-group mb-4">
                                <input className="profile-input" type="text" name="old_password"/>
                                <span className="profile-input-focus" data-placeholder="Old Password"></span>
                            </div>

                            <div className="profile-form-group mb-4">
                                <input className="profile-input" type="text" name="new_password"/>
                                <span className="profile-input-focus" data-placeholder="New Password"></span>
                            </div>

                            <div className="profile-form-group mb-4">
                                <input className="profile-input" type="text" name="confirm_password"/>
                                <span className="profile-input-focus" data-placeholder="Confirm New Password"></span>
                            </div>

                            <div className="profile-form-group mb-4">
                                <input className="profile-input" type="text" name="credit_card"/>
                                <span className="profile-input-focus" data-placeholder="Credit Card Number"></span>
                            </div>

                            <div className="profile-form-group mb-4">
                                <input className="profile-input" type="text" name="account" min="0"/>
                                <span className="profile-input-focus" data-placeholder="Pull From The Account"></span>
                            </div>

                            <div className="col-md-6 mx-auto text-center">
                                <button className="btn btn-md btn-dashboard-info" type="submit" name="profile_data">Submit data</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        );
    }
}

export default ProfileInfo;
