import React, { Component } from 'react';
import {
    renderIcon,
    renderIconStyle,
    setResponsiveCSS,
} from '../Core/DiviNationKit-core';

import './styles.css';

export class IconListChild extends Component {
    static slug = 'dina_icon_list_child';

    static css(props) {
        const additionalCss = [];

        const iconStyle = renderIconStyle(
            props,
            'icon',
            '%%order_class%% .dina_icon_list-icon i.dina_icon'
        );

        const responsiveCss = setResponsiveCSS(props, [
            // {
            //     selector: '%%order_class%% .dina_icon_list-badge',
            //     optionName: 'badge_bg',
            //     property: 'background',
            // },
            // {
            //     selector: '%%order_class%% .dina_icon_list-badge',
            //     optionName: 'badge_margin',
            //     property: 'margin',
            // },
            // {
            //     selector: '%%order_class%% .dina_icon_list-badge',
            //     optionName: 'badge_padding',
            //     property: 'padding',
            // },
        ]);

        return additionalCss.concat(iconStyle).concat(responsiveCss);
    }

    renderTooltip = () => {
        const tooltipText = this.props.tooltip_text;
        const tooltipPosition =
            this.props.tooltip_position !== undefined
                ? this.props.tooltip_position
                : 'top';

        return (
            <div className="dina_tooltip_container">
                <span className="dina_tooltip-trigger"></span>
                <div
                    className={`dina_tooltip-wrapper dina_tooltip-${tooltipPosition}`}
                >
                    <div className="dina_tooltip-text">{tooltipText}</div>
                </div>
            </div>
        );
    };

    renderTitle = () => {
        const heading = this.props.title;
        const Title = this.props.title_level ? this.props.title_level : 'h5';

        const useTooltip = this.props.use_tooltip;
        let content;

        if (useTooltip === 'on') {
            content = (
                <div className="dina_icon_list-use-tooltip">
                    <Title className={`dina_icon_list-title`}>{heading}</Title>
                    {this.renderTooltip()}
                </div>
            );
        } else {
            content = (
                <Title className={`dina_icon_list-title`}>{heading}</Title>
            );
        }

        return content;
    };

    renderMCE = (description) => {
        if (description) {
            if (this.props.dynamic.description.value) {
                return (
                    <div className="dina_icon_list-description">
                        {this.props.dynamic.description.render()}
                    </div>
                );
            } else {
                return (
                    <div
                        className="dina_icon_list-description"
                        dangerouslySetInnerHTML={{ __html: description }}
                    ></div>
                );
            }
        }
    };

    render() {
        return (
            <div className="dina_icon_list-item">
                <div className="dina_icon_list-icon">
                    <i className="dina_icon">{renderIcon(this.props.icon)}</i>
                </div>
                <div className="dina_icon_list-content">
                    {this.renderTitle()}
                    {this.renderMCE(this.props.description)}
                </div>
            </div>
        );
    }
}

export default IconListChild;
