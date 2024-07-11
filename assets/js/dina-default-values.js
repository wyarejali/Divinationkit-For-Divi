jQuery(function($) {
    const defaultImage =
        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTA4MCIgaGVpZ2h0PSI1NDAiIHZpZXdCb3g9IjAgMCAxMDgwIDU0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZmlsbD0iI0VCRUJFQiIgZD0iTTAgMGgxMDgwdjU0MEgweiIvPgogICAgICAgIDxwYXRoIGQ9Ik00NDUuNjQ5IDU0MGgtOTguOTk1TDE0NC42NDkgMzM3Ljk5NSAwIDQ4Mi42NDR2LTk4Ljk5NWwxMTYuMzY1LTExNi4zNjVjMTUuNjItMTUuNjIgNDAuOTQ3LTE1LjYyIDU2LjU2OCAwTDQ0NS42NSA1NDB6IiBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgICAgICA8Y2lyY2xlIGZpbGwtb3BhY2l0eT0iLjA1IiBmaWxsPSIjMDAwIiBjeD0iMzMxIiBjeT0iMTQ4IiByPSI3MCIvPgogICAgICAgIDxwYXRoIGQ9Ik0xMDgwIDM3OXYxMTMuMTM3TDcyOC4xNjIgMTQwLjMgMzI4LjQ2MiA1NDBIMjE1LjMyNEw2OTkuODc4IDU1LjQ0NmMxNS42Mi0xNS42MiA0MC45NDgtMTUuNjIgNTYuNTY4IDBMMTA4MCAzNzl6IiBmaWxsLW9wYWNpdHk9Ii4yIiBmaWxsPSIjMDAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz4KICAgIDwvZz4KPC9zdmc+Cg==';
    const userImage =
        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDUwMCA1MDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgICA8ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPgogICAgICAgIDxwYXRoIGZpbGw9IiNFQkVCRUIiIGQ9Ik0wIDBoNTAwdjUwMEgweiIvPgogICAgICAgIDxyZWN0IGZpbGwtb3BhY2l0eT0iLjEiIGZpbGw9IiMwMDAiIHg9IjY4IiB5PSIzMDUiIHdpZHRoPSIzNjQiIGhlaWdodD0iNTY4IiByeD0iMTgyIi8+CiAgICAgICAgPGNpcmNsZSBmaWxsLW9wYWNpdHk9Ii4xIiBmaWxsPSIjMDAwIiBjeD0iMjQ5IiBjeT0iMTcyIiByPSIxMDAiLz4KICAgIDwvZz4KPC9zdmc+Cg==';

    const title = 'Your title goes here...';
    const subtitle = 'Your subtitle goes here...';
    const content =
        'Your content goes here. Edit or remove this text inline or in the module content settings.';
    const icon = '&#xe105;||divi||400';

    const is_vb = $('body').hasClass('et-fb');

    $(window).on('load', function() {
        is_vb &&
            window.ETBuilderBackend &&
            window.ETBuilderBackend.defaults &&
            ((window.ETBuilderBackend.defaults.dina_logo_slider_child = {
                image: defaultImage,
            }),
            (window.ETBuilderBackend.defaults.dina_pricelist_child = {
                icon: '&#xe0f3;||divi||400',
                image: defaultImage,
                title: 'Price Title',
                price: '$49.99',
                description: content,
            }),
            (window.ETBuilderBackend.defaults.dina_divider = {
                divider_icon: '&#x2b;||divi||400',
                divider_text: 'Divider Text',
            }),
            (window.ETBuilderBackend.defaults.dina_flip_card = {
                front_icon: '&#xe105;||divi||400',
                front_img: defaultImage,
                front_title: title,
                front_subtitle: subtitle,
                front_description: content,
                back_icon: '&#xe031;||divi||400',
                back_img: defaultImage,
                back_title: title,
                back_subtitle: subtitle,
                back_description: content,
            }),
            (window.ETBuilderBackend.defaults.dina_icon_list_child = {
                icon: '&#xe052;||divi||400',
                title: title,
            }),
            (window.ETBuilderBackend.defaults.dina_marquee_text = {
                text: title,
            }),
            (window.ETBuilderBackend.defaults.dina_icon_box = {
                icon: '&#xe105;||divi||400',
                title: title,
                subtitle: subtitle,
                description: content,
            }),
            (window.ETBuilderBackend.defaults.dina_dual_button = {
                button_one_text: 'Button One',
                button_one_url: '#',
                separator_icon: '&#xe089;||divi||400',
                separator_text: 'Or',
                button_two_text: 'Button Two',
                button_two_url: '#',
            }),
            (window.ETBuilderBackend.defaults.dina_person = {
                image: userImage,
                name: 'John Doe',
                position: 'Developer at Microsoft',
            }),
            (window.ETBuilderBackend.defaults.dina_review_box = {
                image: userImage,
                name: 'John Smith',
                position: 'Founder & CEO at Microfoft',
                description: content,
            }));
    });
});
