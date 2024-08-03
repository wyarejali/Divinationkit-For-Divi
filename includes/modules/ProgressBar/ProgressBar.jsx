import React, { Component } from 'react';
import {
    dinaGetCustomBgCSS,
    setResponsiveCSS,
} from '../Core/DiviNationKit-core';
import './styles.css';

export class ProgressBar extends Component {
    static slug = 'dina_progress_bar';

    static css(props) {
        let additionalCss = [],
            barHeight = props.bar_height ? props.bar_height : '10px',
            barHeightTablet = props.bar_height_tablet,
            barHeightMobile = props.bar_height_mobile,
            rounded = props.border_round ? props.border_round : '10px',
            roundedTablet = props.border_round_tablet,
            roundedMobile = props.border_round_mobile,
            level = props.level ? props.level : '90%',
            offsetX = props.offset_x ? props.offset_x : '10px',
            heightLastEdited = props.bar_height_last_edited,
            isHeightResponsive =
                heightLastEdited && heightLastEdited.startsWith('on'),
            roundedLastEdited = props.bar_height_last_edited,
            isRoundedResponsive =
                roundedLastEdited && roundedLastEdited.startsWith('on');

        const bar_bg = dinaGetCustomBgCSS(
            props,
            'bar',
            '%%order_class%% .dina_progress',
            '',
            '#E8F0EF'
        );

        const level_bg = dinaGetCustomBgCSS(
            props,
            'level',
            '%%order_class%% .dina_progress-level',
            '',
            '#01564D'
        );

        additionalCss.push([
            {
                selector:
                    '%%order_class%% .dina_progress, %%order_class%% .dina_progress-level',
                declaration: `height: ${barHeight};`,
            },
        ]);

        if (barHeightTablet && isHeightResponsive) {
            additionalCss.push([
                {
                    selector:
                        '%%order_class%% .dina_progress, %%order_class%% .dina_progress-level',

                    device: 'tablet',
                    declaration: `height: ${barHeightTablet};`,
                },
            ]);
        }

        if (barHeightMobile && isHeightResponsive) {
            additionalCss.push([
                {
                    selector:
                        '%%order_class%% .dina_progress, %%order_class%% .dina_progress-level',
                    device: 'phone',
                    declaration: `height: ${barHeightMobile};`,
                },
            ]);
        }

        additionalCss.push([
            {
                selector:
                    '%%order_class%% .dina_progress, %%order_class%% .dina_progress-level',
                declaration: `border-radius: ${rounded};`,
            },
        ]);

        if (roundedTablet && isRoundedResponsive) {
            additionalCss.push([
                {
                    selector:
                        '%%order_class%% .dina_progress, %%order_class%% .dina_progress-level',
                    device: 'tablet',
                    declaration: `border-radius: ${roundedTablet};`,
                },
            ]);
        }

        if (roundedMobile && isRoundedResponsive) {
            additionalCss.push([
                {
                    selector:
                        '%%order_class%% .dina_progress, %%order_class%% .dina_progress-level',
                    device: 'phone',
                    declaration: `border-radius: ${roundedMobile};`,
                },
            ]);
        }

        additionalCss.push([
            {
                selector: '%%order_class%% .dina_progress-level',
                declaration: `width: ${level};`,
            },
        ]);

        // Level
        additionalCss.push([
            {
                selector: '%%order_class%% .dina_progress-level::before',
                declaration: `bottom: calc(100% + ${offsetX});`,
            },
            {
                selector: '%%order_class%% .dina_progress-level::after',
                declaration: `top: calc(-5px - ${offsetX});`,
            },
        ]);

        const responsiveCSS = setResponsiveCSS(props, [
            {
                selector: '%%order_class%% .dina_progress_bar-icon i.dina_icon',
                optionName: 'icon_color',
                property: 'color',
            },
            {
                selector: '%%order_class%% .dina_progress_bar-icon i.dina_icon',
                optionName: 'icon_bg',
                property: 'background',
            },
            {
                selector: '%%order_class%% .dina_progress_bar-icon i.dina_icon',
                optionName: 'icon_size',
                property: 'font-size',
            },
            {
                selector: '%%order_class%% .dina_progress_bar-icon i.dina_icon',
                optionName: 'icon_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_progress_bar-icon',
                optionName: 'icon_margin',
                property: 'margin',
            },

            {
                selector:
                    '%%order_class%% .dina_progress-level:before, %%order_class%% .dina_progress-level:after',
                optionName: 'tooltip_bg',
                property: 'background',
            },
            {
                selector: '%%order_class%% .dina_progress-level:before',
                optionName: 'tooltip_round',
                property: 'border-radius',
            },
            {
                selector: '%%order_class%% .dina_progress-level:before',
                optionName: 'tooltip_padding',
                property: 'padding',
            },
        ]);

        return additionalCss
            .concat(bar_bg)
            .concat(level_bg)
            .concat(responsiveCSS);
    }
    render() {
        return (
            <div
                className={`dina_progress_bar-container dina_progress_bar-${this.props.layout}`}
            >
                <div className="dina_progress_bar-wrapper">
                    {this.props.content}
                </div>
            </div>
        );
    }
}

export default ProgressBar;
