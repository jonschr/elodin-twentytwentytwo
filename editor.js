//* Remove unused blocks entirely (commented ones are ones we're keeping)
wp.domReady(() => {
    // wp.blocks.unregisterBlockType('core/archives');
    // wp.blocks.unregisterBlockType('core/audio');
    // wp.blocks.unregisterBlockType('core/button');
    // wp.blocks.unregisterBlockType('core/buttons');
    wp.blocks.unregisterBlockType('core/calendar');
    // wp.blocks.unregisterBlockType('core/categories');
    // wp.blocks.unregisterBlockType('core/classic');
    // wp.blocks.unregisterBlockType('core/code');
    // wp.blocks.unregisterBlockType('core/column');
    // wp.blocks.unregisterBlockType('core/columns');
    wp.blocks.unregisterBlockType('core/cover');
    // wp.blocks.unregisterBlockType('core/file');
    wp.blocks.unregisterBlockType('core/latest-comments');
    wp.blocks.unregisterBlockType('core/latest-posts');
    // wp.blocks.unregisterBlockType('core/legacy-widget'); // error thrown when unregistered
    // wp.blocks.unregisterBlockType('core/gallery');
    // wp.blocks.unregisterBlockType('core/group');
    // wp.blocks.unregisterBlockType('core/heading');
    // wp.blocks.unregisterBlockType('core/html');
    // wp.blocks.unregisterBlockType('core/image');
    // wp.blocks.unregisterBlockType('core/list');
    // wp.blocks.unregisterBlockType('core/media-text');
    wp.blocks.unregisterBlockType('core/more');
    // wp.blocks.unregisterBlockType('core/navigation'); // error thrown when unregistered
    // wp.blocks.unregisterBlockType('core/navigation-link'); // error thrown when unregistered
    wp.blocks.unregisterBlockType('core/nextpage');
    // wp.blocks.unregisterBlockType('core/paragraph');
    wp.blocks.unregisterBlockType('core/preformatted');
    // wp.blocks.unregisterBlockType('core/pullquote');
    // wp.blocks.unregisterBlockType('core/quote');
    wp.blocks.unregisterBlockType('core/rss');
    // wp.blocks.unregisterBlockType('core/search');
    // wp.blocks.unregisterBlockType('core/separator');
    // wp.blocks.unregisterBlockType('core/shortcode');
    // wp.blocks.unregisterBlockType('core/social-link');
    // wp.blocks.unregisterBlockType('core/social-links');
    // wp.blocks.unregisterBlockType('core/spacer');
    // wp.blocks.unregisterBlockType('core/subhead');
    // wp.blocks.unregisterBlockType('core/table');
    wp.blocks.unregisterBlockType('core/tag-cloud');
    // wp.blocks.unregisterBlockType('core/text-columns');
    // wp.blocks.unregisterBlockType('core/verse');
    // wp.blocks.unregisterBlockType('core/video');
    // wp.blocks.unregisterBlockType('core/widget-area');

    wp.blocks.unregisterBlockType('generateblocks/button');
    wp.blocks.unregisterBlockType('generateblocks/buttons');
});

//* Add alt styles
wp.domReady(() => {
    wp.blocks.registerBlockStyle('core/paragraph', [
        {
            name: 'default',
            label: 'Default',
            isDefault: true,
        },
        {
            name: 'kicker',
            label: 'Kicker',
        },
    ]);

    // wp.blocks.registerBlockStyle('core/heading', [
    //     {
    //         name: 'default',
    //         label: 'Default',
    //         isDefault: true,
    //     },
    //     {
    //         name: 'red-line',
    //         label: 'Red line',
    //     },
    // ]);
});
