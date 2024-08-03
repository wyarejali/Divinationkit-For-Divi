import React, { Component } from 'react';
import { setResponsiveCSS } from '../Core/DiviNationKit-core';

export class BusinessHourChild extends Component {
    static slug = 'dina_business_hour_child';
    static css(props) {
        const additionalCss = [];

        additionalCss.push([
            {
                selector: `.dina_business_hour-container %%order_class%% .dina_business_hour-separator`,
                declaration: `
				  border-top-style: ${props.separator_style};
                  border-top-width: ${props.separator_weight};
                  border-top-color: ${props.separator_color}`,
            },
        ]);

        const responsiveCss = setResponsiveCSS(props, [
            {
                selector:
                    '.dina_business_hour-container %%order_class%% .dina_business_hour-item',
                optionName: 'separator_gap',
                property: 'gap',
            },
            {
                selector:
                    '.dina_business_hour-container %%order_class%% .dina_business_hour-item',
                optionName: 'separator_position',
                property: 'align-items',
            },
        ]);

        return additionalCss.concat(responsiveCss);
    }

    renderSeparator() {
        if (this.props.hide_separator !== 'on') {
            return <div className="dina_business_hour-separator"></div>;
        }
    }
    render() {
        return (
            <div className="dina_business_hour-item">
                <div className="dina_business_hour-day">{this.props.day}</div>
                {this.renderSeparator()}
                <div className="dina_business_hour-time">{this.props.time}</div>
            </div>
        );
    }
}

export default BusinessHourChild;
