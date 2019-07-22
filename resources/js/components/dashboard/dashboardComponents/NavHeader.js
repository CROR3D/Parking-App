import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class NavHeader extends Component
{
    changePage(e) {
        var page = e.target.getAttribute('value');
        this.props.nextPage(page);
    }

    displayButtons() {
        let { role, currentPage, subPages } = this.props;
        let pages = [],
            anchors = [];

        for (let property in subPages) {
            let page = subPages[property];
            if (page.id != currentPage.id) {
                if(page.authorize != 'all' && page.authorize != role) continue;
                pages.push(page);
            }
        }

        pages.forEach((page, index) => {
            anchors.push(
                <a key={index} className="btn btn-md btn-dashboard-nav sw-content mr-1" href="#" value={page.id} onClick={this.changePage.bind(this)}>{page.title}</a>
            );
        });

        return anchors;
    }

    render() {
        return (
            <div className="text-center mb-3">
                {this.displayButtons()}
            </div>
        );
    }
}

export default NavHeader;
