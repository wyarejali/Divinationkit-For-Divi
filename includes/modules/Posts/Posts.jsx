import React, { Component } from 'react';

export class Posts extends Component {
    static slug = 'dina_posts';

    static css(props) {
        // console.log(props);
    }
    render() {
        console.log(this.props.__posts);
        return (
            <div className="dina_posts-container">
                <ul dangerouslySetInnerHTML={{ __html: this.props.__posts }} />
            </div>
        );
    }
}

export default Posts;
