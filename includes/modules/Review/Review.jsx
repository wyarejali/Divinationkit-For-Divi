import React, { Component } from 'react';
import './styles.css';
import { setResponsiveCSS } from '../Core/DiviNationKit-core';

export class Review extends Component {
    static slug = 'dina_review_box';

    static css(props) {
        const additionalCss = [];

        const responsiveCss = setResponsiveCSS(props, [
            {
                selector: '%%order_class%% .dina_review_box-img',
                optionName: 'image_width',
                property: 'width',
            },
            {
                selector: '%%order_class%% .dina_review_box-img',
                optionName: 'image_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_review_box-img',
                optionName: 'image_padding',
                property: 'padding',
            },

            {
                selector: '%%order_class%% .dina_rating-star',
                optionName: 'star_color',
                property: 'color',
            },
            {
                selector: '%%order_class%% .dina_rating-star',
                optionName: 'star_size',
                property: 'font-size',
            },
            {
                selector:
                    '%%order_class%% .dina_rating-star-full, %%order_class%% .dina_rating-star-1::before, %%order_class%% .dina_rating-star-2::before, %%order_class%% .dina_rating-star-3::before, %%order_class%% .dina_rating-star-4::before, %%order_class%% .dina_rating-star-5::before, %%order_class%% .dina_rating-star-6::before, %%order_class%% .dina_rating-star-7::before, %%order_class%% .dina_rating-star-8::before, %%order_class%% .dina_rating-star-9::before, %%order_class%% .dina_rating-star-10::before',
                optionName: 'fill_star_color',
                property: 'color',
            },

            {
                selector: '%%order_class%% .dina_rating-wrapper',
                optionName: 'rating_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_rating-wrapper',
                optionName: 'rating_padding',
                property: 'padding',
            },

            {
                selector:
                    '%%order_class%% .dina_review_box-author, %%order_class%% .dina_review_box-style-three',
                optionName: 'image_gap',
                property: 'gap',
            },
            {
                selector:
                    '%%order_class%% .dina_review_box-img-wrapper, %%order_class%% .dina_rating-wrapper',
                optionName: 'alignment',
                property: 'justify-content',
            },
            {
                selector: '%%order_class%% .dina_review_box-content-wrapper',
                optionName: 'alignment',
                property: 'text-align',
            },
            {
                selector:
                    '%%order_class%% .dina_review_box-author, %%order_class%% .dina_review_box-style-three',
                optionName: 'vertical_alignment',
                property: 'align-items',
            },

            {
                selector: '%%order_class%% .dina_review_box-content-wrapper',
                optionName: 'content_wrapper_margin',
                property: 'margin',
            },
            {
                selector: '%%order_class%% .dina_review_box-content-wrapper',
                optionName: 'content_wrapper_padding',
                property: 'padding',
            },
        ]);

        return additionalCss.concat(responsiveCss);
    }

    renderImage = () => {
        if (this.props.use_image === 'on') {
            return (
                <div className="dina_review_box-img">
                    <img src={this.props.image} alt="" />
                </div>
            );
        }
    };

    renderName = () => {
        const heading = this.props.name;
        const Title = this.props.name_level ? this.props.name_level : 'h3';

        if (heading) {
            return <Title className="dina_review_box-name">{heading}</Title>;
        }
    };

    renderPosition = () => {
        const heading = this.props.position;
        const Title = this.props.position_level
            ? this.props.position_level
            : 'h3';

        if (heading) {
            return (
                <Title className="dina_review_box-position">{heading}</Title>
            );
        }
    };

    renderStars = (rating, ratingScale) => {
        let stars = [];
        const flooredRating = Math.floor(rating);
        const halfStar = Math.floor((rating - flooredRating) * 10);

        for (let i = 1.0; i <= ratingScale; i++) {
            if (i <= flooredRating) {
                stars.push(
                    <span
                        key={i}
                        className="dina_rating-star dina_rating-star-full"
                    >
                        ★
                    </span>
                );
            } else if (i === flooredRating + 1 && rating !== flooredRating) {
                stars.push(
                    <span
                        key={i}
                        className={`dina_rating-star dina_rating-star-${halfStar}`}
                    >
                        ★
                    </span>
                );
            } else {
                stars.push(
                    <span
                        key={i}
                        className="dina_rating-star dina_rating-star-empty"
                    >
                        ★
                    </span>
                );
            }
        }

        return stars;
    };

    renderRating() {
        const ratingStyle = this.props.rating_style;

        if (ratingStyle === 'only_star') {
            return (
                <div className="dina_rating-wrapper">
                    <div className="dina_rating-star-wrapper">
                        {this.renderStars(
                            this.props.rating,
                            this.props.rating_scale
                        )}
                    </div>
                </div>
            );
        }

        if (ratingStyle === 'only_number') {
            return (
                <div className="dina_rating-wrapper">
                    <div className="dina_rating-number">
                        ({this.props.rating}/{this.props.rating_scale}★)
                    </div>
                </div>
            );
        }
        if (ratingStyle === 'both') {
            return (
                <div className="dina_rating-wrapper">
                    <div className="dina_rating-star-wrapper">
                        {this.renderStars(
                            this.props.rating,
                            this.props.rating_scale
                        )}
                    </div>
                    <div className="dina_rating-number">
                        ({this.props.rating}/{this.props.rating_scale})
                    </div>
                </div>
            );
        }
    }

    renderDescription = (description) => {
        if (description) {
            if (this.props.dynamic.description.value) {
                return <>{this.props.dynamic.description.render()}</>;
            } else {
                return (
                    <div
                        dangerouslySetInnerHTML={{ __html: description }}
                    ></div>
                );
            }
        }
    };

    renderButton() {
        const props = this.props;
        const utils = window.ET_Builder.API.Utils;

        if (props.use_button === 'on') {
            const buttonUrl =
                typeof props.button_link !== 'undefined'
                    ? props.button_link
                    : '';

            const buttonicon =
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
                <div className="dina_review_box-btn-wrapper">
                    <a
                        className={`${utils.classnames(
                            customClass
                        )} dina_review_box_btn`}
                        href={buttonUrl}
                        target={target}
                        data-icon={buttonicon}
                    >
                        {props.dynamic.button_text.render()}
                    </a>
                </div>
            );
        }
    }

    render() {
        const ratingPosition = this.props.rating_position;
        const layout = this.props.layout;
        let content = '';

        if (layout === 'style-one') {
            content = (
                <div
                    className={`dina_review_box-container dina_review_box-${layout}`}
                >
                    <div className="dina_review_box-author ">
                        {this.renderImage()}
                        <div className="dina_review_box-info">
                            {this.renderName()}
                            {this.renderPosition()}
                            {ratingPosition === 'under_author' &&
                                this.renderRating()}
                        </div>
                    </div>
                    <div className="dina_review_box-description">
                        {ratingPosition === 'top_review' && this.renderRating()}
                        {this.renderDescription(this.props.description)}
                        {ratingPosition === 'under_review' &&
                            this.renderRating()}
                        {this.renderButton()}
                    </div>
                </div>
            );
        }

        if (layout === 'style-two') {
            content = (
                <div
                    className={`dina_review_box-container dina_review_box-${layout}`}
                >
                    <div className="dina_review_box-description">
                        {ratingPosition === 'top_review' && this.renderRating()}
                        {this.renderDescription(this.props.description)}
                        {ratingPosition === 'under_review' &&
                            this.renderRating()}
                        {this.renderButton()}
                    </div>
                    <div className="dina_review_box-author ">
                        {this.renderImage()}
                        <div className="dina_review_box-info">
                            {this.renderName()}
                            {this.renderPosition()}
                            {ratingPosition === 'under_author' &&
                                this.renderRating()}
                        </div>
                    </div>
                </div>
            );
        }

        if (layout === 'style-three') {
            content = (
                <div
                    className={`dina_review_box-container dina_review_box-${layout}`}
                >
                    {this.renderImage()}
                    <div className="dina_review_box-content-wrapper">
                        <div className="dina_review_box-author ">
                            <div className="dina_review_box-info">
                                {this.renderName()}
                                {this.renderPosition()}
                            </div>
                            {ratingPosition === 'under_author' &&
                                this.renderRating()}
                        </div>
                        <div className="dina_review_box-description">
                            {ratingPosition === 'top_review' &&
                                this.renderRating()}
                            {this.renderDescription(this.props.description)}
                            {ratingPosition === 'under_review' &&
                                this.renderRating()}
                            {this.renderButton()}
                        </div>
                    </div>
                </div>
            );
        }

        if (layout === 'style-four') {
            content = (
                <div
                    className={`dina_review_box-container dina_review_box-${layout}`}
                >
                    <div className="dina_review_box-img-wrapper">
                        {this.renderImage()}
                    </div>
                    <div className="dina_review_box-content-wrapper">
                        <div className="dina_review_box-author ">
                            <div className="dina_review_box-info">
                                {this.renderName()}
                                {this.renderPosition()}
                                {ratingPosition === 'under_author' &&
                                    this.renderRating()}
                            </div>
                        </div>
                        <div className="dina_review_box-description">
                            {ratingPosition === 'top_review' &&
                                this.renderRating()}
                            {this.renderDescription(this.props.description)}
                            {ratingPosition === 'under_review' &&
                                this.renderRating()}
                            {this.renderButton()}
                        </div>
                    </div>
                </div>
            );
        }

        return content;
    }
}

export default Review;
