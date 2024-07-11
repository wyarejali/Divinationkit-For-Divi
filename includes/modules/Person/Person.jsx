import React, { Component } from 'react';
import { setResponsiveCSS } from '../Core/DiviNationKit-core';

export class Person extends Component {
    static slug = 'dina_person';

    static css(props) {
        const additionalCss = [];

        const size = props.icon_size.split('px')[0] * 2;

        additionalCss.push([
            {
                selector: '%%order_class%% .dina_person-social-network',
                declaration: `width: ${size}px; height: ${size}px;`,
            },
        ]);

        const responsiveCss = setResponsiveCSS(props, [
            {
                selector: '%%order_class%% .dina_person-social-links',
                optionName: 'icon_alignment',
                property: 'justify-content',
            },
            {
                selector: '%%order_class%% .dina_person-social-links',
                optionName: 'icon_gap',
                property: 'gap',
            },
            {
                selector:
                    '%%order_class%% .dina_person-social-network span::before',
                optionName: 'icon_size',
                property: 'font-size',
            },
            {
                selector:
                    '%%order_class%% .dina_person-social-network span::before',
                optionName: 'icon_round',
                property: 'border-radius',
            },
            {
                selector:
                    '%%order_class%% .dina_person-social-network span::before',
                optionName: 'icon_color',
                property: 'color',
            },
        ]);

        return additionalCss.concat(responsiveCss);
    }

    renderImage = () => {
        return (
            <div className="dina_person-img">
                <img src={this.props.image} alt="" />
            </div>
        );
    };

    renderName = () => {
        const heading = this.props.name;
        const Title = this.props.name_level ? this.props.name_level : 'h3';

        if (heading) {
            return <Title className="dina_person-name">{heading}</Title>;
        }
    };

    renderPosition = () => {
        const heading = this.props.position;
        const Title = this.props.position_level
            ? this.props.position_level
            : 'h3';

        if (heading) {
            return <Title className="dina_person-position">{heading}</Title>;
        }
    };

    render() {
        return (
            <div
                className={`dina_person-container dina_person-${this.props.layout}`}
            >
                {this.renderImage()}
                <div className="dina_person-info">
                    {this.renderName()}
                    {this.renderPosition()}
                    <div className="dina_person-social-links">
                        {this.props.content}
                    </div>
                </div>
            </div>
        );
    }
}

export default Person;
