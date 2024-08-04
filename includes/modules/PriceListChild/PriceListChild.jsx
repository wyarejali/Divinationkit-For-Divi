import React, { Component } from 'react';
import {
    renderIcon,
    renderIconStyle,
    setResponsiveCSS,
} from '../Core/DiviNationKit-core';

class PriceListChild extends Component {
    static slug = 'dina_pricelist_child';

    static css(props) {
        const additionalCss = [];
        let layout = props.layout,
            imageDesign;

        const iconStyle = renderIconStyle(
            props,
            'icon',
            '.dina_pricelist-container %%order_class%% .dina_pricelist-icon i.dina_icon'
        );

        const responsiveCss = setResponsiveCSS(props, [
            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-item-wrapper',
                optionName: 'layout',
                property: 'display',
            },
            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-item-wrapper',
                optionName: 'content_position',
                property: 'align-items',
            },
            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-item-wrapper',
                optionName: 'content_gap',
                property: 'gap',
            },

            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-icon i.dina_icon',
                optionName: 'icon_color',
                property: 'color',
            },
            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-icon i.dina_icon',
                optionName: 'icon_bg',
                property: 'background',
            },
            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-icon i.dina_icon',
                optionName: 'icon_size',
                property: 'font-size',
            },
            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-icon i.dina_icon',
                optionName: 'icon_padding',
                property: 'padding',
            },
            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-icon',
                optionName: 'icon_margin',
                property: 'margin',
            },

            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-image',
                optionName: 'image_margin',
                property: 'margin',
            },
            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-image',
                optionName: 'image_padding',
                property: 'padding',
            },
            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-image-wrapper',
                optionName: 'image_align',
                property: 'justify-content',
            },

            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-divider',
                optionName: 'divider_color',
                property: 'border-color',
            },
            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-divider',
                optionName: 'divider_style',
                property: 'border-style',
            },
            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-divider',
                optionName: 'divider_weight',
                property: 'border-bottom-width',
            },
            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-heading',
                optionName: 'divider_gap',
                property: 'gap',
            },
            {
                selector:
                    '.dina_pricelist-container %%order_class%% .dina_pricelist-heading',
                optionName: 'divider_position',
                property: 'align-items',
            },
        ]);

        if (layout === 'flex') {
            imageDesign = setResponsiveCSS(props, [
                {
                    selector:
                        '.dina_pricelist-container %%order_class%% .dina_pricelist-image-wrapper',
                    optionName: 'image_width',
                    property: 'width',
                },
            ]);
        } else {
            imageDesign = setResponsiveCSS(props, [
                {
                    selector:
                        '.dina_pricelist-container %%order_class%% .dina_pricelist-image',
                    optionName: 'image_width',
                    property: 'width',
                },
            ]);
        }

        return additionalCss
            .concat(iconStyle)
            .concat(responsiveCss)
            .concat(imageDesign);
    }

    renderIcon = () => {
        return (
            <div className="dina_pricelist-icon">
                <i className="dina_icon">{renderIcon(this.props.icon)}</i>
            </div>
        );
    };

    renderImage = () => {
        return (
            <div className="dina_pricelist-image-wrapper">
                <div className="dina_pricelist-image">
                    <img
                        src={`${this.props.image}`}
                        alt={`${this.props.image_alt}`}
                    />
                </div>
            </div>
        );
    };

    renderMedia = () => {
        const mediaType = this.props.media_type;

        if (mediaType === 'image') {
            return this.renderImage();
        }

        if (mediaType === 'icon') {
            return this.renderIcon();
        }
    };

    renderMCE = (description) => {
        if (description) {
            if (this.props.dynamic.description.value) {
                return (
                    <div className="dina_pricelist-description">
                        {this.props.dynamic.description.render()}
                    </div>
                );
            } else {
                return (
                    <div
                        className="dina_pricelist-description"
                        dangerouslySetInnerHTML={{ __html: description }}
                    ></div>
                );
            }
        }
    };

    render_title = () => {
        const heading = this.props.title;
        const Title = this.props.title_level ? this.props.title_level : 'h4';

        return <Title className="dina_pricelist-title">{heading}</Title>;
    };

    render_price = () => {
        const heading = this.props.price;
        const Title = this.props.price_level ? this.props.price_level : 'h4';

        return <Title className="dina_pricelist-price">{heading}</Title>;
    };

    render() {
        return (
            <div className="dina_pricelist-item-wrapper">
                {this.renderMedia()}
                <div className="dina_pricelist-content">
                    <div className={`dina_pricelist-heading`}>
                        {this.render_title()}
                        <div className="dina_pricelist-divider"></div>
                        {this.render_price()}
                    </div>

                    {this.renderMCE(this.props.description)}
                </div>
            </div>
        );
    }
}

export default PriceListChild;
