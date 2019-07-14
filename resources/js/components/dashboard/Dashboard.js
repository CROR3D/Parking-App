import React, { Component, Fragment } from 'react';
import ReactDOM from 'react-dom';
import ContentSection from './dashboardComponents/ContentSection';
import ButtonHeader from './dashboardComponents/ButtonHeader';
import SectionTitle from './dashboardComponents/SectionTitle';
import CurrentActivity from './dashboardComponents/CurrentActivity';
import AppAnalysis from './dashboardComponents/AppAnalysis';

class Dashboard extends Component
{
    constructor(props) {
        super();
        this.state = {
            subPages: {
                userInformation: {
                    id: 'user-info',
                    title: 'User Information',
                },
                appAnalysis: {
                    id: 'app-analysis',
                    title: 'Application Analysis',
                },
                profileInformation: {
                    id: 'profile-info',
                    title: 'Profile Information',
                },
            },
            currentSubPage: function() {
                return this.subPages['userInformation'];
            },
            pageData: JSON.parse(props.pageData)
        }
    }

    getSubPage() {
        switch(this.state.currentSubPage().id) {
            case 'user-info':
                return <CurrentActivity />;
            case 'app-analysis':
                return <AppAnalysis />;
            case 'profile-info':
                return null;
            default:
                return null;
        }
    }

    render() {
        return (
            <div className="container">
                <Fragment>
                    <ContentSection id="user-info">
                        <ButtonHeader role={this.state.pageData.role} />
                        <SectionTitle title="user-info" role={this.state.pageData.role} />
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
