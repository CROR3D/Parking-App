import React, { Component, Fragment } from 'react';
import ReactDOM from 'react-dom';
import ContentSection from './dashboardComponents/ContentSection';
import ButtonHeader from './dashboardComponents/ButtonHeader';
import SectionTitle from './dashboardComponents/SectionTitle';
import CurrentActivity from './dashboardComponents/CurrentActivity';

class Dashboard extends Component
{
    constructor(props) {
        super(props);
        this.state = {
            id: 'user-info',
            title: 'User Information',
            currentSubPage: 'UserInformation',
            pageData: JSON.parse(props.pageData)
        }
    }

    getSubPage() {
        switch(this.state.currentSubPage) {
            case 'UserInformation':
                return <CurrentActivity />;
            case 'AppAnalysis':
                return null;
            case 'ProfileInformation':
                return null;
            default:
                return null;
        }
    }

    render() {
        return (
            <div className="container">
                <Fragment>
                    <ContentSection id={this.state.id}>
                        <ButtonHeader role={this.state.pageData.role} />
                        <SectionTitle title={this.state.title} role={this.state.pageData.role} />
                        {this.getSubPage()}
                    </ContentSection>
                </Fragment>
            </div>
        );
    }
}

export default Dashboard;

if (document.getElementById('dashboard')) {
    const dashboard = document.getElementById('dashboard');
    let data = dashboard.dataset.activity;
    ReactDOM.render(<Dashboard pageData={data} />, document.getElementById('dashboard'));
}
