import React, { Component } from 'react';
import {
    dinaGetCustomBgCSS,
    renderIcon,
    renderIconStyle,
    setResponsiveCSS,
} from '../Core/DiviNationKit-core';

import '../../../assets/css/dina-2d-hover-effects.css';
import '../../../assets/css/dina-border-hover-effects.css';
import '../../../assets/css/dina-bg-hover-effects.css';
import './styles.css';

export class DualButton extends Component {
    static slug = 'dina_dual_button';

    static css(props) {
        let useButtonOneIcon =
                props.use_button_one_icon === 'on' ? true : false,
            buttonOneIconStyle,
            useButtonTwoIcon =
                props.use_button_two_icon === 'on' ? true : false,
            buttonTwoIconStyle,
            useSeparator = props.use_separator === 'on' ? true : false,
            separatorIconStyle,
            buttonOneBg,
            buttonTwoBg,
            responsiveCss,
            borderHoverEffectCss,
            bgHoverEffectCss,
            buttonOneIconPlacement = props.button_one_icon_placement,
            buttonOneIconShowOnHover = props.button_one_icon_show_on_hover,
            buttonTwoIconPlacement = props.button_two_icon_placement,
            buttonTwoIconShowOnHover = props.button_two_icon_show_on_hover,
            additionalCss = [];

        if (useSeparator) {
            separatorIconStyle = renderIconStyle(
                props,
                'separator_icon',
                '%%order_class%% .dina_button-separator-icon i.dina_icon'
            );
        }

        buttonOneBg = dinaGetCustomBgCSS(
            props,
            'button_one',
            '%%order_class%% .dina_button_one',
            '',
            '#01564D'
        );

        buttonTwoBg = dinaGetCustomBgCSS(
            props,
            'button_two',
            '%%order_class%% .dina_button_two',
            '',
            '#01564D'
        );

        if (useButtonOneIcon) {
            buttonOneIconStyle = renderIconStyle(
                props,
                'button_one_icon',
                '%%order_class%% .dina_button_one-icon'
            );

            if (buttonOneIconPlacement === 'right') {
                if (buttonOneIconShowOnHover === 'on') {
                    additionalCss.push([
                        {
                            selector: '%%order_class%% .dina_button_one-icon',
                            declaration: 'opacity: 0; margin-left: -1.2rem;',
                        },
                        {
                            selector:
                                '%%order_class%% .dina_button_one:hover .dina_button_one-icon',
                            declaration: 'opacity: 1; margin-left: .3rem;',
                        },
                    ]);
                } else {
                    additionalCss.push([
                        {
                            selector: '%%order_class%% .dina_button_one-icon',
                            declaration: 'margin-left: .3rem;',
                        },
                    ]);
                }
            }

            if (buttonOneIconPlacement === 'left') {
                if (buttonOneIconShowOnHover === 'on') {
                    additionalCss.push([
                        {
                            selector: '%%order_class%% .dina_button_one-icon',
                            declaration: 'opacity: 0; margin-left: 0rem;',
                        },
                        {
                            selector:
                                '%%order_class%% .dina_button_one:hover .dina_button_one-icon',
                            declaration: 'opacity: 1; margin-left: -1.2rem;',
                        },
                    ]);
                } else {
                    additionalCss.push([
                        {
                            selector: '%%order_class%% .dina_button_one-icon',
                            declaration: 'margin-left: -1.2rem;',
                        },
                    ]);
                }
            }
        }

        if (useButtonTwoIcon) {
            buttonTwoIconStyle = renderIconStyle(
                props,
                'button_two_icon',
                '%%order_class%% .dina_button_two-icon'
            );

            if (buttonTwoIconPlacement === 'right') {
                if (buttonTwoIconShowOnHover === 'on') {
                    additionalCss.push([
                        {
                            selector: '%%order_class%% .dina_button_two-icon',
                            declaration: 'opacity: 0; margin-left: -1.2rem;',
                        },
                        {
                            selector:
                                '%%order_class%% .dina_button_two:hover .dina_button_two-icon',
                            declaration: 'opacity: 1; margin-left: .3rem;',
                        },
                    ]);
                } else {
                    additionalCss.push([
                        {
                            selector: '%%order_class%% .dina_button_two-icon',
                            declaration: 'margin-left: .3rem;',
                        },
                    ]);
                }
            }

            if (buttonTwoIconPlacement === 'left') {
                if (buttonTwoIconShowOnHover === 'on') {
                    additionalCss.push([
                        {
                            selector: '%%order_class%% .dina_button_two-icon',
                            declaration: 'opacity: 0; margin-left: 0rem;',
                        },
                        {
                            selector:
                                '%%order_class%% .dina_button_two:hover .dina_button_two-icon',
                            declaration: 'opacity: 1; margin-left: -1.2rem;',
                        },
                    ]);
                } else {
                    additionalCss.push([
                        {
                            selector: '%%order_class%% .dina_button_two-icon',
                            declaration: 'margin-left: -1.2rem;',
                        },
                    ]);
                }
            }
        }

        responsiveCss = setResponsiveCSS(props, [
            {
                selector: '%%order_class%% .dina_dual_button-container',
                optionName: 'alignment',
                property: 'justify-content',
            },
            {
                selector: '%%order_class%% .dina_dual_button-container',
                optionName: 'space',
                property: 'gap',
            },

            {
                selector: '%%order_class%% .dina_button_one',
                optionName: 'button_one_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_button_one',
                optionName: 'button_one_padding',
                property: 'padding',
            },

            {
                selector: '%%order_class%% .dina_button_two',
                optionName: 'button_two_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_button_two',
                optionName: 'button_two_padding',
                property: 'padding',
            },

            {
                selector:
                    '%%order_class%% .dina_dual_button-separator i.dina_icon',
                optionName: 'icon_color',
                property: 'color',
            },
            {
                selector:
                    '%%order_class%% .dina_dual_button-separator i.dina_icon',
                optionName: 'icon_bg',
                property: 'background',
            },
            {
                selector: '%%order_class%% .dina_dual_button-separator-text',
                optionName: 'text_bg',
                property: 'background',
            },
            {
                selector:
                    '%%order_class%% .dina_dual_button-separator i.dina_icon',
                optionName: 'icon_size',
                property: 'font-size',
            },
            {
                selector:
                    '%%order_class%% .dina_dual_button-separator i.dina_icon',
                optionName: 'icon_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_dual_button-separator-text',
                optionName: 'text_padding',
                property: 'padding',
            },
        ]);

        // border hover
        const borderHoverEffectOne = props.button_one_border_hover_effect;
        if (borderHoverEffectOne !== '') {
            if (
                borderHoverEffectOne === 'dina-ripple-in' ||
                borderHoverEffectOne === 'dina-ripple-out' ||
                borderHoverEffectOne === 'dina-outline-in' ||
                borderHoverEffectOne === 'dina-outline-out'
            ) {
                borderHoverEffectCss = setResponsiveCSS(props, [
                    {
                        selector:
                            '%%order_class%% .dina_button_one.dina-border-hover-effect::before',
                        optionName: 'button_one_hover_border_color',
                        property: 'border-color',
                    },
                    {
                        selector:
                            '%%order_class%% .dina_button_one.dina-border-hover-effect::before',
                        optionName: 'button_one_hover_border_width',
                        property: 'border-width',
                    },
                ]);
            } else {
                borderHoverEffectCss = setResponsiveCSS(props, [
                    {
                        selector:
                            '%%order_class%% .dina_button_one.dina-border-hover-effect::before',
                        optionName: 'button_one_hover_border_bg_color',
                        property: 'background',
                    },
                    {
                        selector:
                            '%%order_class%% .dina_button_one.dina-border-hover-effect::before',
                        optionName: 'button_one_hover_border_bg_height',
                        property: 'height',
                    },
                ]);
            }
        }

        // BG hover effect
        const bgEffectOne = props.button_one_bg_hover_effect;

        if (bgEffectOne !== '') {
            bgHoverEffectCss = setResponsiveCSS(props, [
                {
                    selector:
                        '%%order_class%% .dina_button_one.dina-bg-hover-effect::before',
                    optionName: 'button_one_hover_bg_color',
                    property: 'background',
                },
            ]);
        }

        // border hover two
        const borderHoverEffectTwo = props.button_two_border_hover_effect;
        if (borderHoverEffectTwo !== '') {
            if (
                borderHoverEffectTwo === 'dina-ripple-in' ||
                borderHoverEffectTwo === 'dina-ripple-out' ||
                borderHoverEffectTwo === 'dina-outline-in' ||
                borderHoverEffectTwo === 'dina-outline-out'
            ) {
                borderHoverEffectCss = setResponsiveCSS(props, [
                    {
                        selector:
                            '%%order_class%% .dina_button_two.dina-border-hover-effect::before',
                        optionName: 'button_two_hover_border_color',
                        property: 'border-color',
                    },
                    {
                        selector:
                            '%%order_class%% .dina_button_two.dina-border-hover-effect::before',
                        optionName: 'button_two_hover_border_width',
                        property: 'border-width',
                    },
                ]);
            } else {
                borderHoverEffectCss = setResponsiveCSS(props, [
                    {
                        selector:
                            '%%order_class%% .dina_button_two.dina-border-hover-effect::before',
                        optionName: 'button_two_hover_border_bg_color',
                        property: 'background',
                    },
                    {
                        selector:
                            '%%order_class%% .dina_button_two.dina-border-hover-effect::before',
                        optionName: 'button_two_hover_border_bg_height',
                        property: 'height',
                    },
                ]);
            }
        }

        // BG hover effect
        const bgEffectTwo = props.button_two_bg_hover_effect;

        if (bgEffectTwo !== '') {
            bgHoverEffectCss = setResponsiveCSS(props, [
                {
                    selector:
                        '%%order_class%% .dina_button_two.dina-bg-hover-effect::before',
                    optionName: 'button_two_hover_bg_color',
                    property: 'background',
                },
            ]);
        }

        return additionalCss
            .concat(buttonOneIconStyle)
            .concat(separatorIconStyle)
            .concat(buttonTwoIconStyle)
            .concat(buttonOneBg)
            .concat(buttonTwoBg)
            .concat(responsiveCss)
            .concat(borderHoverEffectCss)
            .concat(bgHoverEffectCss);
    }

    // Render Button one
    renderButtonOne() {
        const props = this.props;
        const buttonUrl =
            typeof props.button_one_link !== 'undefined'
                ? props.button_one_link
                : '#';
        const useIcon = props.use_button_one_icon;
        const IconPlacement = props.button_one_icon_placement;
        const target = props.is_new_window_one === 'on' ? '_blank' : '_self';
        const button2dHoverEffect = props.button_one_2d_hover_effect
            ? props.button_one_2d_hover_effect
            : '';
        const buttonBorderHoverEffect = props.button_one_border_hover_effect
            ? props.button_one_border_hover_effect
            : '';
        const buttonBgHoverEffect = props.button_one_bg_hover_effect
            ? props.button_one_bg_hover_effect
            : '';
        let classes = [];

        classes.push('dina_button', 'dina_button_one');

        if (button2dHoverEffect !== '') {
            classes.push(button2dHoverEffect);
        }

        if (buttonBorderHoverEffect !== '') {
            classes.push(buttonBorderHoverEffect);
            classes.push('dina-border-hover-effect');
        }

        if (buttonBgHoverEffect !== '') {
            classes.push(buttonBgHoverEffect);
            classes.push('dina-bg-hover-effect');
        }

        let icon;
        if (useIcon === 'on') {
            icon = (
                <i className="dina_button_one-icon">
                    {renderIcon(props.button_one_icon)}
                </i>
            );
        }

        return (
            <a href={buttonUrl} target={target} className={classes.join(' ')}>
                {IconPlacement === 'left' && icon}
                {props.button_one_text}
                {IconPlacement === 'right' && icon}
            </a>
        );
    }

    // Render Button two
    renderButtonTwo() {
        const props = this.props;
        const buttonUrl =
            typeof props.button_two_link !== 'undefined'
                ? props.button_two_link
                : '#';
        const useIcon = props.use_button_two_icon;
        const IconPlacement = props.button_two_icon_placement;
        const target = props.is_new_window_two === 'on' ? '_blank' : '_self';
        const button2dHoverEffect = props.button_two_2d_hover_effect
            ? props.button_two_2d_hover_effect
            : '';
        const buttonBorderHoverEffect = props.button_two_border_hover_effect
            ? props.button_two_border_hover_effect
            : '';
        const buttonBgHoverEffect = props.button_two_bg_hover_effect
            ? props.button_two_bg_hover_effect
            : '';
        let classes = [];

        classes.push('dina_button', 'dina_button_two');

        if (button2dHoverEffect !== '') {
            classes.push(button2dHoverEffect);
        }

        if (buttonBorderHoverEffect !== '') {
            classes.push(buttonBorderHoverEffect);
            classes.push('dina-border-hover-effect');
        }

        if (buttonBgHoverEffect !== '') {
            classes.push(buttonBgHoverEffect);
            classes.push('dina-bg-hover-effect');
        }

        let icon;
        if (useIcon === 'on') {
            icon = (
                <i className="dina_button_two-icon">
                    {renderIcon(props.button_two_icon)}
                </i>
            );
        }

        return (
            <a href={buttonUrl} target={target} className={classes.join(' ')}>
                {IconPlacement === 'left' && icon}
                {props.button_two_text}
                {IconPlacement === 'right' && icon}
            </a>
        );
    }

    renderSeparator() {
        const useSeparator = this.props.use_separator;
        const separatorType = this.props.separator_type;

        if (useSeparator !== 'on') return;

        if (separatorType === 'icon') {
            return (
                <div className="dina_dual_button-separator">
                    <i className="dina_icon">
                        {renderIcon(this.props.separator_icon)}
                    </i>
                </div>
            );
        }

        if (separatorType === 'text') {
            return (
                <div className="dina_dual_button-separator">
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
