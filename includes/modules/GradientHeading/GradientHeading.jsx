import React, { Component } from 'react';
import '../../../assets/css/dina-2d-hover-effects.css';

export class GradientHeading extends Component {
    static slug = 'dina_gradient_heading';

    static css(props) {
        let additionalCss = [],
            gradientType = props.gradient_type,
            linearDirection = props.linear_direction,
            radialDirection = props.radial_direction,
            startPosition = props.start_position,
            endPosition = props.end_position,
            primaryColor = props.primary_color,
            secondaryColor = props.secondary_color,
            declaration = '';

        if (gradientType === 'linear') {
            declaration = `background: linear-gradient(${linearDirection}, ${primaryColor} ${startPosition}, ${secondaryColor} ${endPosition});`;
        }

        if (gradientType === 'radial') {
            declaration = `background: radial-gradient(${radialDirection}, ${primaryColor} ${startPosition}, ${secondaryColor} ${endPosition});`;
        }

        additionalCss.push([
            {
                selector: '%%order_class%% .dina_gradient_heading-title',
                declaration: `${declaration} -webkit-background-clip: text; -webkit-text-fill-color: transparent;`,
            },
        ]);

        return additionalCss;
    }

    renderTitle = () => {
        const heading = this.props.title;
        const Title = this.props.title_level ? this.props.title_level : 'h3';

        if (Title) {
            return (
                <Title className="dina_gradient_heading-title">{heading}</Title>
            );
        }
    };

    render() {
        const isHoverEnable = this.props.use_hover_effect;
        const hoverEffect = this.props.hover_effect;

        return (
            <div
                className={`dina_gradient_heading-container ${isHoverEnable &&
                    hoverEffect}`}
            >
                {this.renderTitle()}
            </div>
        );
    }
}

export default GradientHeading;
