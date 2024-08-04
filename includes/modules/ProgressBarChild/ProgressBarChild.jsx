import React, { Component } from 'react';
import {
    dinaGetCustomBgCSS,
    renderIcon,
    setResponsiveCSS,
} from '../Core/DiviNationKit-core';

export class ProgressBarChild extends Component {
    static slug = 'dina_progress_bar_child';

    static css(props) {
        let additionalCss = [],
            responsiveCSS,
            barHeight = props.bar_height,
            barHeightTablet = props.bar_height_tablet,
            barHeightMobile = props.bar_height_mobile,
            rounded = props.border_round,
            roundedTablet = props.border_round_tablet,
            roundedMobile = props.border_round_mobile,
            level = props.level ? props.level : '90%',
            offsetX = props.offset_x,
            heightLastEdited = props.bar_height_last_edited,
            isHeightResponsive =
                heightLastEdited && heightLastEdited.startsWith('on'),
            roundedLastEdited = props.bar_height_last_edited,
            isRoundedResponsive =
                roundedLastEdited && roundedLastEdited.startsWith('on');

        const bar_bg = dinaGetCustomBgCSS(
            props,
            'bar',
            '.dina_progress_bar-container %%order_class%% .dina_progress',
            '',
            ''
        );

        const level_bg = dinaGetCustomBgCSS(
            props,
            'level',
            '.dina_progress_bar-container %%order_class%% .dina_progress-level',
            '',
            ''
        );

        additionalCss.push([
            {
                selector:
                    '.dina_progress_bar-container %%order_class%% .dina_progress, .dina_progress_bar-container %%order_class%% .dina_progress-level',
                declaration: `height: ${barHeight};`,
            },
        ]);

        if (barHeightTablet && isHeightResponsive) {
            additionalCss.push([
                {
                    selector:
                        '.dina_progress_bar-container %%order_class%% .dina_progress, .dina_progress_bar-container %%order_class%% .dina_progress-level',

                    device: 'tablet',
                    declaration: `height: ${barHeightTablet};`,
                },
            ]);
        }

        if (barHeightMobile && isHeightResponsive) {
            additionalCss.push([
                {
                    selector:
                        '.dina_progress_bar-container %%order_class%% .dina_progress, .dina_progress_bar-container %%order_class%% .dina_progress-level',
                    device: 'phone',
                    declaration: `height: ${barHeightMobile};`,
                },
            ]);
        }

        additionalCss.push([
            {
                selector:
                    '.dina_progress_bar-container %%order_class%% .dina_progress, .dina_progress_bar-container %%order_class%% .dina_progress-level',
                declaration: `border-radius: ${rounded};`,
            },
        ]);

        if (roundedTablet && isRoundedResponsive) {
            additionalCss.push([
                {
                    selector:
                        '.dina_progress_bar-container %%order_class%% .dina_progress, .dina_progress_bar-container %%order_class%% .dina_progress-level',
                    device: 'tablet',
                    declaration: `border-radius: ${roundedTablet};`,
                },
            ]);
        }

        if (roundedMobile && isRoundedResponsive) {
            additionalCss.push([
                {
                    selector:
                        '.dina_progress_bar-container %%order_class%% .dina_progress, .dina_progress_bar-container %%order_class%% .dina_progress-level',
                    device: 'phone',
                    declaration: `border-radius: ${roundedMobile};`,
                },
            ]);
        }

        additionalCss.push([
            {
                selector:
                    '.dina_progress_bar-container %%order_class%% .dina_progress-level',
                declaration: `width: ${level};`,
            },
        ]);

        // Level
        additionalCss.push([
            {
                selector:
                    '.dina_progress_bar-container %%order_class%% .dina_progress-level::before',
                declaration: `bottom: calc(100% + ${offsetX});`,
            },
            {
                selector:
                    '.dina_progress_bar-container %%order_class%% .dina_progress-level::after',
                declaration: `top: calc(-5px - ${offsetX});`,
            },
        ]);

        responsiveCSS = setResponsiveCSS(props, [
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
                    '.dina_progress_bar-container %%order_class%% .dina_progress-level:before, .dina_progress_bar-container %%order_class%% .dina_progress-level:after',
                optionName: 'tooltip_bg',
                property: 'background',
            },
            {
                selector:
                    '.dina_progress_bar-container %%order_class%% .dina_progress-level:before',
                optionName: 'tooltip_round',
                property: 'border-radius',
            },
        ]);

        if (props.tooltip_padding) {
            responsiveCSS = setResponsiveCSS(props, [
                {
                    selector:
                        '.dina_progress_bar-container %%order_class%% .dina_progress-level:before',
                    optionName: 'tooltip_padding',
                    property: 'padding',
                },
            ]);
        }

        return additionalCss
            .concat(bar_bg)
            .concat(level_bg)
            .concat(responsiveCSS);
    }

    renderIcon() {
        if (this.props.use_icon === 'on') {
            return (
                <div className="dina_progress-icon">
                    <i className="dina_icon">{renderIcon(this.props.icon)}</i>
                </div>
            );
        }
    }

    renderName() {
        const hideName = this.props.hide_name ? this.props.hide_name : 'off';
        if (hideName === 'off') {
            return (
                <span className="dina_progress_bar-name">
                    {this.props.name}
                </span>
            );
        }
    }

    renderLevel() {
        const hideLevel = this.props.hide_level ? this.props.hide_level : 'off';
        const level = this.props.level ? this.props.level : '90%';
        if (hideLevel === 'off') {
            return <span className="dina_progress_bar-level">{level}</span>;
        }
    }

    renderDescription = (description) => {
        if (description) {
            if (this.props.dynamic.description.value) {
                return (
                    <div className="dina_progress_bar-description">
                        {this.props.dynamic.description.render()}
                    </div>
                );
            } else {
                return (
                    <div
                        className="dina_progress_bar-description"
                        dangerouslySetInnerHTML={{ __html: description }}
                    ></div>
                );
            }
        }
    };

    render() {
        const namePlacement = this.props.name_placement
            ? this.props.name_placement
            : 'outside';
        const hideLevel = this.props.hide_level ? this.props.hide_level : 'off';
        const showLevel =
            hideLevel === 'off' ? 'dina_progress_bar-show-level' : '';
        const level = this.props.level ? this.props.level : '90%';

        return (
            <div className={`dina_progress_bar-item ${showLevel}`}>
                {this.renderIcon()}
                <div className="dina_progress_bar-wrapper">
                    {namePlacement === 'outside' && this.renderName()}
                    <div className="dina_progress">
                        <div className="dina_progress-level" data-per={level}>
                            {namePlacement === 'inside' && this.renderName()}
                        </div>
                    </div>
                    {this.renderDescription(this.props.description)}
                </div>
            </div>
        );
    }
}

export default ProgressBarChild;
