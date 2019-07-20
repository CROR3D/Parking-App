import React, { Component, Fragment } from 'react';
import ReactDOM from 'react-dom';
import PropTypes from 'prop-types';
import ContentSection from './dashboardComponents/ContentSection';
import NavHeader from './dashboardComponents/NavHeader';
import SectionTitle from './dashboardComponents/SectionTitle';
import CurrentActivity from './dashboardComponents/CurrentActivity';
import AppAnalysis from './dashboardComponents/AppAnalysis';
import ProfileInfo from './dashboardComponents/ProfileInfo';

class Dashboard extends Component
{
    constructor(props) {
        super(props);

        this.state = {
            subPages: {
                userInformation: {
                    id: 'userInformation',
                    title: 'User Information'
                },
                appAnalysis: {
                    id: 'appAnalysis',
                    title: 'Application Analysis'
                },
                profileInformation: {
                    id: 'profileInformation',
                    title: 'Profile Information'
                },
            },
            currentSubPage: {
                id: 'userInformation',
                title: 'User Information'
            },
            pageData: JSON.parse(props.pageData)
        }
    }

    setCurrentSubPage(newPage) {
        let getSubPage = page => this.state.subPages[page];
        let newSubPage = getSubPage(newPage);
        this.setState({ currentSubPage: newSubPage });
    }

    displaySubPage() {
        switch(this.state.currentSubPage.id) {
            case 'appAnalysis':
                return <AppAnalysis />;
            case 'profileInformation':
                return <ProfileInfo />;
            default:
                return <CurrentActivity pageData={this.state.pageData} />;
        }
    }

    render() {
        let {subPages, currentSubPage, pageData} = this.state;

        return (
            <div className="container">
                <ContentSection id={currentSubPage.id}>
                    <NavHeader role={pageData.role} currentPage={currentSubPage}
                        subPages={subPages} nextPage={this.setCurrentSubPage.bind(this)}/>
                    <SectionTitle title={currentSubPage.title} role={pageData.role} />
                    {this.displaySubPage()}
                </ContentSection>
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
