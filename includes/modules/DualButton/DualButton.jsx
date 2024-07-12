import React, { Component } from 'react';
import {
    renderIcon,
    renderIconStyle,
    setResponsiveCSS,
} from '../Core/DiviNationKit-core';

import './styles.css';

export class DualButton extends Component {
    static slug = 'dina_dual_button';

    static css(props) {
        const additionalCss = [];
        let iconStyle = [];

        // Render icon style
        iconStyle = renderIconStyle(
            props,
            'separator_icon',
            '%%order_class%% .dina_dual_button-separator-icon i.dina_icon'
        );

        let row = '';
        let col = '';

        if (props.layout === 'row') {
            row = setResponsiveCSS(props, [
                {
                    selector: '%%order_class%% .dina_dual_button-container',
                    optionName: 'alignment',
                    property: 'justify-content',
                },
            ]);
        }

        if (props.layout === 'column') {
            col = setResponsiveCSS(props, [
                {
                    selector: '%%order_class%% .dina_dual_button-container',
                    optionName: 'alignment_col',
                    property: 'align-items',
                },
            ]);
        }

        const responsiveCss = setResponsiveCSS(props, [
            {
                selector: '%%order_class%% .dina_dual_button-container',
                optionName: 'layout',
                property: 'flex-direction',
            },
            {
                selector: '%%order_class%% .dina_dual_button-container',
                optionName: 'space',
                property: 'gap',
            },

            {
                selector: '%%order_class%% .dina_dual_button-separator-text',
                optionName: 'text_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_dual_button-separator-icon',
                optionName: 'icon_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_dual_button-separator-text',
                optionName: 'text_bg',
                property: 'background',
            },
            {
                selector: '%%order_class%% .dina_dual_button-separator-icon',
                optionName: 'icon_bg',
                property: 'background',
            },
            {
                selector:
                    '%%order_class%% .dina_dual_button-separator-icon i.dina_icon',
                optionName: 'icon_color',
                property: 'color',
            },
            {
                selector:
                    '%%order_class%% .dina_dual_button-separator-icon i.dina_icon',
                optionName: 'icon_size',
                property: 'font-size',
            },
        ]);

        return additionalCss
            .concat(iconStyle)
            .concat(responsiveCss)
            .concat(row)
            .concat(col);
    }

    // Render Button one
    renderButtonOne() {
        const props = this.props;
        const utils = window.ET_Builder.API.Utils;

        const buttonUrl =
            typeof props.button_one_link !== 'undefined'
                ? props.button_one_link
                : '';

        const buttonIcon =
            typeof props.button_one_icon !== 'undefined'
                ? utils.processFontIcon(props.button_one_icon)
                : '6';

        const target = props.is_new_window_one === 'on' ? '_blank' : '';

        const customClass = {
            et_pb_button: true,
            et_pb_custom_button_icon: props.button_one_icon,
        };

        if (props.button_one_text === '' && props.button_one_url === '') {
            return;
        }

        return (
            <div className="dina_dual_button-one-wrapper">
                <a
                    className={`${utils.classnames(
                        customClass
                    )} dina_dual_button-one`}
                    href={buttonUrl}
                    target={target}
                    data-icon={buttonIcon}
                >
                    {props.dynamic.button_one_text.render()}
                </a>
            </div>
        );
    }

    // Render Button two
    renderButtonTwo() {
        const props = this.props;
        const utils = window.ET_Builder.API.Utils;

        const buttonUrl =
            typeof props.button_two_link !== 'undefined'
                ? props.button_two_link
                : '';

        const buttonIcon =
            typeof props.button_two_icon !== 'undefined'
                ? utils.processFontIcon(props.button_two_icon)
                : '6';

        const target = props.is_new_window_two === 'on' ? '_blank' : '';

        const customClass = {
            et_pb_button: true,
            et_pb_custom_button_icon: props.button_two_icon,
        };

        if (props.button_two_text === '' && props.button_two_url === '') {
            return;
        }

        return (
            <div className="dina_dual_button-two-wrapper">
                <a
                    className={`${utils.classnames(
                        customClass
                    )} dina_dual_button-two`}
                    href={buttonUrl}
                    target={target}
                    data-icon={buttonIcon}
                >
                    {props.dynamic.button_two_text.render()}
                </a>
            </div>
        );
    }

    renderSeparator() {
        const useSeparator = this.props.use_separator;
        const separatorType = this.props.separator_type;

        if (useSeparator !== 'on') return;

        if (separatorType === 'icon') {
            return (
                <div className="dina_dual_button-separator-icon">
                    <i className="dina_icon">
                        {renderIcon(this.props.separator_icon)}
                    </i>
                </div>
            );
        }

        if (separatorType === 'text') {
            return (
                <div className="dina_dual_button-separator-text">
                    <span className="dina_dual_button-separator-text">
                        {this.props.separator_text}
                    </span>
                </div>
            );
        }
    }

    render() {
        return (
            <div className="dina_dual_button-container">
                {this.renderButtonOne()}
                {this.renderSeparator()}
                {this.renderButtonTwo()}
            </div>
        );
    }
}

export default DualButton;
