import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class CurrentActivity extends Component
{
    render() {
        return (
            <div className="mb-3">
                <h4>Current Activity:</h4>
                <div className="ml-5">
                    <h4>Reservation:</h4>
                    <div className="ml-5">
                        <h4>City: <span className="text-warning">Zadar</span></h4>
                        <h4>Parking: <span className="text-warning">Foša</span></h4>
                        <h4>Reservation created: <span className="text-warning">01.01.2019 14:30</span></h4>
                        <h4>Reservation expires: <span className="text-warning">01.01.2019 15:00</span></h4>
                        <h4>Access code: <span className="text-warning">1234</span></h4>
                    </div>
                    <h4>Location:</h4>
                    <div className="ml-5">
                        <h4>City: <span className="text-warning">Zadar</span></h4>
                        <h4>Parking: <span className="text-warning">Foša</span></h4>
                        <h4>Entered: <span className="text-warning">01.01.2019 14:50</span></h4>
                        <h4>Parked: <span className="text-warning">00:43:21</span></h4>
                        <a className="btn btn-md btn-dashboard-yellow" href="#">Pay Ticket</a>
                    </div>
                    <h4>No current activity</h4>
                </div>
            </div>
        );
    }
}

export default CurrentActivity;
