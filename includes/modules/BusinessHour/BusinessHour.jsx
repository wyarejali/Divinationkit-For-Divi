import React, { Component } from 'react';
import { setResponsiveCSS } from '../Core/DiviNationKit-core';

export class BusinessHour extends Component {
    static slug = 'dina_business_hours';

    static css(props) {
        const additionalCss = [];

        additionalCss.push([
            {
                selector: `%%order_class%% .dina_business_hour-separator`,
                declaration: `
				  border-top-style: ${props.separator_style};
                  border-top-width: ${props.separator_weight};
                  border-top-color: ${props.separator_color}`,
            },
        ]);

        const responsiveCss = setResponsiveCSS(props, [
            {
                selector: '%%order_class%% .dina_business_hour-item',
                optionName: 'separator_gap',
                property: 'gap',
            },
            {
                selector: '%%order_class%% .dina_business_hour-item',
                optionName: 'separator_position',
                property: 'align-items',
            },
        ]);

        return additionalCss.concat(responsiveCss);
    }

    render() {
        return (
            <div className="dina_business_hour-container">
                <div className="dina_business_hour-wrapper">
                    {this.props.content}
                </div>
            </div>
        );
    }
}

export default BusinessHour;
