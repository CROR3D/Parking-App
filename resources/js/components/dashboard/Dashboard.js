import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Dashboard extends Component
{
    render() {
        return (
            <div className="container">
                <h1>Hello from React</h1>
            </div>
        );
    }
}

export default Dashboard;

if (document.getElementById('dashboard')) {
    ReactDOM.render(<Dashboard />, document.getElementById('dashboard'));
}
