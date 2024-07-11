import React, { Component } from 'react';
import { setResponsiveCSS } from '../Core/DiviNationKit-core';
import './styles.css';

export class Rating extends Component {
    static slug = 'dina_rating';

    static css(props) {
        const additionalCss = [];

        const fillStar =
            (100 * parseFloat(props.rating)) / parseFloat(props.rating_scale) +
            '%';

        additionalCss.push([
            {
                selector: '%%order_class%% .dina_rating-star-filled',
                declaration: `width: ${fillStar};`,
            },
        ]);

        const responsiveCSS = setResponsiveCSS(props, [
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
        ]);

        return additionalCss.concat(responsiveCSS);
    }

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
                        ({this.props.rating}/{this.props.rating_scale})
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

    render() {
        return (
            <div className="dina_rating-container">{this.renderRating()}</div>
        );
    }
}

export default Rating;
