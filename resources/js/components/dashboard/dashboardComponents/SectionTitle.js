import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class SectionTitle extends Component
{
    render() {
        return (
            <div className="text-center mb-5">
                <h2>{this.props.title}</h2>
                <h3>- <span className="text-info">{this.props.role}</span> -</h3>
            </div>
        );
    }
}

export default SectionTitle;
