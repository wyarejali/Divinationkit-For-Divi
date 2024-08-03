import React, { Component } from 'react';

import './styles.css';
import {
    dinaGetCustomBgCSS,
    renderIconStyle,
    setResponsiveCSS,
} from '../Core/DiviNationKit-core';

class Flip_Card extends Component {
    static slug = 'dina_flip_card';

    static css(props) {
        const additionalCss = [];

        // Render front icon style
        const frontIconStyle = renderIconStyle(
            props,
            'front_icon',
            '%%order_class%% .dina_flip_card-front-icon i.dina_icon'
        );

        // Render back icon style
        const backIconStyle = renderIconStyle(
            props,
            'back_icon',
            '%%order_class%% .dina_flip_card-back-icon i.dina_icon'
        );

        // General styles
        additionalCss.push([
            {
                selector: `%%order_class%% .dina_flip_card-front`,
                declaration: `
                    align-items: ${props.front_vertical_align};
                    text-align: ${props.front_text_align};
                `,
            },
            {
                selector: `%%order_class%% .dina_flip_card-back`,
                declaration: `
                    align-items: ${props.back_vertical_align};
                    text-align: ${props.back_text_align};
                `,
            },
        ]);

        const responsiveCss = setResponsiveCSS(props, [
            {
                selector: '%%order_class%% .dina_flip_card-container',
                optionName: 'container_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_flip_card-content-wrapper',
                optionName: 'content_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_flip_card-content-wrapper',
                optionName: 'content_margin',
                property: 'margin',
            },
            {
                selector:
                    '%%order_class%% .dina_flip_card-front-icon i.dina_icon',
                optionName: 'front_icon_size',
                property: 'font-size',
            },
            {
                selector:
                    '%%order_class%% .dina_flip_card-front-icon i.dina_icon',
                optionName: 'front_icon_bg',
                property: 'background',
            },
            {
                selector:
                    '%%order_class%% .dina_flip_card-front-icon i.dina_icon',
                optionName: 'front_icon_color',
                property: 'color',
            },
            {
                selector:
                    '%%order_class%% .dina_flip_card-front-icon i.dina_icon',
                optionName: 'front_icon_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_flip_card-front-icon',
                optionName: 'front_icon_margin',
                property: 'margin',
            },

            {
                selector: '%%order_class%% .dina_flip_card-front-img',
                optionName: 'front_img_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_flip_card-front-img',
                optionName: 'front_img_padding',
                property: 'padding',
            },

            {
                selector:
                    '%%order_class%% .dina_flip_card-back-icon i.dina_icon',
                optionName: 'back_icon_size',
                property: 'font-size',
            },
            {
                selector:
                    '%%order_class%% .dina_flip_card-back-icon i.dina_icon',
                optionName: 'back_icon_bg',
                property: 'background',
            },
            {
                selector:
                    '%%order_class%% .dina_flip_card-back-icon i.dina_icon',
                optionName: 'back_icon_color',
                property: 'color',
            },
            {
                selector:
                    '%%order_class%% .dina_flip_card-back-icon i.dina_icon',
                optionName: 'back_icon_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_flip_card-back-icon',
                optionName: 'back_icon_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_flip_card-back-img',
                optionName: 'back_img_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_flip_card-back-img',
                optionName: 'back_img_padding',
                property: 'padding',
            },
        ]);

        // Front side background
        const front_bg = dinaGetCustomBgCSS(
            props,
            'front',
            '%%order_class%% .dina_flip_card-front',
            '',
            '#da4a4a'
        );

        // Back site background color
        const back_bg = dinaGetCustomBgCSS(
            props,
            'back',
            '%%order_class%% .dina_flip_card-back',
            '',
            '#4f5ee4'
        );

        // Flip card settings
        additionalCss.push([
            {
                selector: `%%order_class%% .dina_flip_card-inner`,
                declaration: `
                    transition-duration: ${props.animation_speed};
                    transition-timing-function: ${props.animation_curve};
                    transition-delay: ${props.transition_delay};
                `,
            },
            {
                selector: `%%order_class%% .dina_flip_card--3d .dina_flip_card-content`,
                declaration: `transform:  translateZ(${props.translate_z}) scale(${props.scale});`,
            },
        ]);

        // If use custom height
        if (props.use_custom_height === 'on' && props.flip_card_height) {
            additionalCss.push([
                {
                    selector: '%%order_class%% .dina_flip_card-inner',
                    declaration: `min-height: ${props.flip_card_height}`,
                },
            ]);
        }

        return additionalCss
            .concat(frontIconStyle)
            .concat(backIconStyle)
            .concat(responsiveCss)
            .concat(front_bg)
            .concat(back_bg);
    }

    // Front content

    // Front icon
    render_front_icon = () => {
        const utils = window.ET_Builder.API.Utils;
        const Icon = utils.processFontIcon(this.props.front_icon);

        return (
            <div className="dina_flip_card-icon dina_flip_card-front-icon">
                <i className="dina_icon">{Icon}</i>
            </div>
        );
    };

    // Front image
    render_front_img = () => {
        return (
            <div className="dina_flip_card-front-img">
                <img src={this.props.front_img} alt="" />
            </div>
        );
    };

    // Decide what should be display icon or image
    render_front_media = () => {
        let front_icon = this.props.front_icon,
            front_media_type = this.props.front_media_type,
            front_img = this.props.front_img,
            media = '';

        if (front_icon || front_img) {
            if ('icon' === front_media_type) {
                media = this.render_front_icon();
            } else if ('image' === front_media_type) {
                media = this.render_front_img();
            }

            return <div className="dina_flip_card-media">{media}</div>;
        }
    };

    render_front_title = () => {
        const heading = this.props.front_title;
        const Title = this.props.front_title_level
            ? this.props.front_title_level
            : 'h3';

        if (Title) {
            return (
                <Title className="dina_flip_card-front-title">{heading}</Title>
            );
        }
    };

    render_front_subtitle = () => {
        const heading = this.props.front_subtitle;
        const Title = this.props.front_subtitle_level
            ? this.props.front_subtitle_level
            : 'h4';

        if (Title) {
            return (
                <Title className="dina_flip_card-front-subtitle">
                    {heading}
                </Title>
            );
        }
    };

    render_front_description = (front_description) => {
        if (front_description) {
            if (this.props.dynamic.front_description.value) {
                return (
                    <div className="dina_flip_card-front-description">
                        {this.props.dynamic.front_description.render()}
                    </div>
                );
            } else {
                return (
                    <div
                        className="dina_flip_card-front-description"
                        dangerouslySetInnerHTML={{ __html: front_description }}
                    ></div>
                );
            }
        }
    };

    // Render front content with condition if front title, subtitle or description inserted
    renderFrontContent = () => {
        if (
            this.render_front_title() ||
            this.render_front_subtitle() ||
            this.render_front_description(this.props.front_description)
        ) {
            return (
                <div className="dina_flip_card-content-wrapper">
                    {this.render_front_title()}
                    {this.render_front_subtitle()}
                    {this.render_front_description(
                        this.props.front_description
                    )}
                </div>
            );
        }
    };

    // Back content

    // Icon
    render_back_icon = () => {
        const utils = window.ET_Builder.API.Utils;
        const Icon = utils.processFontIcon(this.props.back_icon);

        return (
            <div className="dina_flip_card-icon dina_flip_card-back-icon">
                <i className="dina_icon">{Icon}</i>
            </div>
        );
    };

    // Image
    render_back_img = () => {
        return (
            <div className="dina_flip_card-back-img">
                <img src={this.props.back_img} alt="" />
            </div>
        );
    };

    // Decide what should be display icon or image
    render_back_media = () => {
        let back_icon = this.props.back_icon,
            back_media_type = this.props.back_media_type,
            back_img = this.props.back_img,
            media = '';

        if (back_icon || back_img) {
            if ('icon' === back_media_type) {
                media = this.render_back_icon();
            } else if ('image' === back_media_type) {
                media = this.render_back_img();
            }

            return <div className="dina_flip_card-media">{media}</div>;
        }
    };

    render_back_title = () => {
        const title = this.props.back_title;

        if (title) {
            return <h2 className="dina_flip_card-back-title">{title}</h2>;
        }
    };

    render_back_subtitle = () => {
        const subtitle = this.props.back_subtitle;

        if (subtitle) {
            return <h4 className="dina_flip_card-back-subtitle">{subtitle}</h4>;
        }
    };

    render_back_description = (back_description) => {
        if (back_description) {
            if (this.props.dynamic.back_description.value) {
                return (
                    <div className="dina_flip_card-back-description">
                        {this.props.dynamic.back_description.render()}
                    </div>
                );
            } else {
                return (
                    <div
                        className="dina_flip_card-back-description"
                        dangerouslySetInnerHTML={{ __html: back_description }}
                    ></div>
                );
            }
        }
    };

    // Render back content with condition if back title, subtitle or description inserted
    renderBackContent = () => {
        if (
            this.render_back_title() ||
            this.render_back_subtitle() ||
            this.render_back_description(this.props.back_description)
        ) {
            return (
                <div className="dina_flip_card-content-wrapper">
                    {this.render_back_title()}
                    {this.render_back_subtitle()}
                    {this.render_back_description(this.props.back_description)}
                </div>
            );
        }
    };

    // Render back side button
    renderButton() {
        const props = this.props;
        const utils = window.ET_Builder.API.Utils;

        if (props.use_button === 'on') {
            const buttonUrl =
                typeof props.button_link !== 'undefined'
                    ? props.button_link
                    : '';

            const buttonIcon =
                typeof props.button_icon !== 'undefined'
                    ? utils.processFontIcon(props.button_icon)
                    : '6';

            const target = props.is_new_window === 'on' ? '_blank' : '';

            const customClass = {
                et_pb_button: true,
                et_pb_custom_button_icon: props.button_icon,
            };

            if (props.button_text === '' && props.button_url === '') {
                return;
            }

            return (
                <div className="dina_flip_card-btn-wrapper">
                    <a
                        className={`${utils.classnames(
                            customClass
                        )} dina_flip_card-btn`}
                        href={buttonUrl}
                        target={target}
                        data-icon={buttonIcon}
                    >
                        {props.dynamic.button_text.render()}
                    </a>
                </div>
            );
        }
    }

    render() {
        let use_3d_animation = this.props.use_3d_animation,
            animation_type = this.props.animation_type,
            direction = this.props.rotate_direction,
            classes = [];

        if (use_3d_animation === 'on') {
            classes.push('dina_flip_card--3d');
        }

        classes.push(animation_type);

        if (animation_type === 'rotate' && direction !== '') {
            classes.push(direction);
        }

        return (
            <div className={`dina_flip_card ${classes.join(' ')}`}>
                <div className="dina_flip_card-inner">
                    <div className="dina_flip_card-front dina_flip_card-container">
                        <div className="dina_flip_card-content">
                            {this.render_front_media()}
                            {this.renderFrontContent()}
                        </div>
                    </div>
                    <div className="dina_flip_card-back dina_flip_card-container">
                        <div className="dina_flip_card-content">
                            {this.render_back_icon()}
                            {this.renderBackContent()}
                            {this.renderButton()}
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Flip_Card;
