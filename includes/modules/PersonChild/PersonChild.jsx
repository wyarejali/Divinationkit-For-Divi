import React, { Component } from 'react';

export class PersonChild extends Component {
    static slug = 'dina_person_child';

    renderUrl = () => {
        let url;

        if (this.props.url === '') {
            url = '#';
        } else {
            url = this.props.url;
        }

        if (this.props.social_network === 'skype') {
            url = `skype:${this.props.username}?${this.props.skype_action}`;
        }

        return url;
    };

    render() {
        const network =
            this.props.social_network === undefined
                ? 'facebook'
                : this.props.social_network;
        return (
            <a
                href={this.renderUrl()}
                className="dina_person-social-network"
                target={this.props.target === 'on' ? '_blank' : ''}
            >
                <span className={`dina_person-social-icon-${network}`}></span>
            </a>
        );
    }
}

export default PersonChild;
