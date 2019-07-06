import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Simulator extends Component
{
    render() {
        return (
            <div className="container">
                <h1>Hello from React</h1>
            </div>
        );
    }
}

export default Simulator;

if (document.getElementById('root')) {
    ReactDOM.render(<Simulator />, document.getElementById('root'));
}
