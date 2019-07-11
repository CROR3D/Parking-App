import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class ButtonHeader extends Component
{
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div className="text-right mb-3">
                {this.props.role === 'Administrator' &&
                    <a className="btn btn-md btn-dashboard-yellow sw-content mr-1" href="#">App Analysis</a>
                }
                <a className="btn btn-md btn-dashboard-info profile-content" href="#">Profile Settings</a>
            </div>
        );
    }
}

export default ButtonHeader;
