import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class ContentSection extends Component
{
    render() {
        return (
            <div id={this.props.id} className="content-section mb-3 p-5">
                {this.props.children}
            </div>
        );
    }
}

export default ContentSection;
