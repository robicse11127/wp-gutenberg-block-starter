import { registerBlockType } from '@wordpress/blocks'
import { __ } from '@wordpress/i18n'

registerBlockType( 'prefix-blocks/hello-gutenberg-block', {
    title: __( 'Hello Gutenberg Block' ),
    icon: 'heart',
    category: 'common',
    keywords: [ 'Hello', 'Gutenberg', 'Hello Gutenberg' ],
    attributes: {},
    edit: ( { attributes, setAttributes } ) => {
        return(
            <h1>Hello Gutenberg Block</h1>
        )
    },
    save: ( { attributes } ) => {
        return(
            <h1>Hello Gutenberg Block</h1>
        )
    }
} )