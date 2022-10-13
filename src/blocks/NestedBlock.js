import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';

const TEMPLATE = [
    [ 'core/heading', { level: 2, content: 'Example Nested Block Template' } ],
    [ 'core/paragraph', { content: 'Lorem ipsum dolor sit amet labore cras venenatis.' } ],
    [ 'core/columns', {},
        [
            [ 'core/column', {}, [
                    [ 'core/heading', { level: 3, content: 'Sub Heading 1' } ],
                    [ 'core/paragraph', { content: 'Lorem ipsum dolor sit amet id erat aliquet diam ullamcorper tempus massa eleifend vivamus.' } ],
                ]
            ],
            [ 'core/column', {}, [
                    [ 'core/heading', { level: 3, content: 'Sub Heading 2' } ],
                    [ 'core/paragraph', { content: 'Morbi augue cursus quam pulvinar eget volutpat suspendisse dictumst mattis id.' } ],
                ]
            ],
        ]
    ],
];

const ALLOWED_BLOCKS = [
    'core/column',
    'core/columns',
    'core/heading',
    'core/paragraph',
];

registerBlockType( 'prefix-blocks/nested-block', {
    title: __( 'Nested Block' ),
    icon: 'heart',
    category: 'common',
    keywords: [ 'Nested Block' ],
    attributes: {},
    edit: ( { attributes, setAttributes } ) => {
        return(
            <div { ...useBlockProps() }>
                <InnerBlocks
                    template={TEMPLATE}
                    allowedBlocks={ALLOWED_BLOCKS}
                    templateLock="all"
                />
            </div>
        )
    },
    save: ( { attributes } ) => {
        return(
            <div { ...useBlockProps.save() }>
                <InnerBlocks.Content />
            </div>
        )
    }
} )