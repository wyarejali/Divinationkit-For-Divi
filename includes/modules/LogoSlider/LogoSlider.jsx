import React, { Component } from 'react';
import Slider from 'react-slick';
import './slick.css';
import './styles.css';

import {
    dinaGetSlickSliderSettings,
    renderIconStyle,
    setResponsiveCSS,
} from '../Core/DiviNationKit-core';
import PrevArrow from '../Core/Component/PrevArrow';
import NextArrow from '../Core/Component/NextArrow';

class LogoSlider extends Component {
    static slug = 'dina_logo_slider';

    static css(props) {
        const additionalCss = [];

        const prevIconStyle = renderIconStyle(
            props,
            'prev_icon',
            '%%order_class%% .dina_prev_icon i.dina_icon'
        );
        const nextIconStyle = renderIconStyle(
            props,
            'next_icon',
            '%%order_class%% .dina_next_icon i.dina_icon'
        );

        additionalCss.push([
            {
                selector: `%%order_class%% .slick-list`,
                declaration: `
                    margin: 0 -${props.space_between};
                `,
            },
            {
                selector: `%%order_class%% .slick-list .slick-slide > div`,
                declaration: `
                    margin: 0 ${props.space_between};
                `,
            },
        ]);

        const responsiveCss = setResponsiveCSS(props, [
            // Arrows
            {
                selector: '%%order_class%% .dina_slider_icon i.dina_icon',
                optionName: 'icon_size',
                property: 'font-size',
            },
            {
                selector: '%%order_class%% .dina_slider_icon',
                optionName: 'icon_bg',
                property: 'background',
            },
            {
                selector: '%%order_class%% .dina_slider_icon i.dina_icon',
                optionName: 'icon_color',
                property: 'color',
            },
            {
                selector: '%%order_class%% .dina_slider_icon',
                optionName: 'icon_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_slider_icon',
                optionName: 'icon_margin',
                property: 'margin',
            },

            // Dots
            {
                selector: '%%order_class%% .slick-dots li button',
                optionName: 'dots_color',
                property: 'background',
            },
            {
                selector: '%%order_class%% .slick-dots li.slick-active button',
                optionName: 'active_dot_color',
                property: 'background',
            },
            {
                selector: '%%order_class%% .slick-dots li button:hover',
                optionName: 'active_dot_color',
                property: 'background',
            },
            {
                selector: '%%order_class%% .slick-dots li button',
                optionName: 'dots_size',
                property: 'width',
            },
            {
                selector: '%%order_class%% .slick-dots li button',
                optionName: 'dots_size',
                property: 'height',
            },
            {
                selector: '%%order_class%% .slick-dots',
                optionName: 'dots_margin',
                property: 'margin',
            },
        ]);

        return additionalCss
            .concat(prevIconStyle)
            .concat(nextIconStyle)
            .concat(responsiveCss);
    }

    render() {
        let classes = ['dina_logo_slider-container'];

        if (this.props.arrow_show_on_hover === 'on') {
            classes.push('show-arrow-on-hover');
        }

        const prevArrow = <PrevArrow icon={this.props.prev_icon} />;
        const nextArrow = <NextArrow icon={this.props.next_icon} />;

        const settings = dinaGetSlickSliderSettings(
            this.props,
            prevArrow,
            nextArrow
        );

        return (
            <Slider {...settings} className={classes.join(' ')}>
                {this.props.content}
            </Slider>
        );
    }
}

export default LogoSlider;
