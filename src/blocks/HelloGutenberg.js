import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n'

const validAlignments = [ 'full' ];

registerBlockType( 'prefix-blocks/hello-gutenberg-block', {
    title: __( 'Hello Gutenberg Block' ),
    icon: 'heart',
    category: 'common',
    keywords: [ 'Hello', 'Gutenberg', 'Hello Gutenberg' ],
    supports: {
        align: true,
    },
    attributes: {
        align: {
            type: 'string',
            default: 'full'
        },
        message: {
            type: 'string',
            default: 'Hello rtCampers!'
        }
    },

    edit: ( { attributes, setAttributes, context } ) => {
        const {
            message
        } = attributes;

        const blockProps = useBlockProps();

        return(
            <div {...blockProps}>
                <h4>{message}</h4>
            </div>
        )
    },
    save: ( { attributes } ) => {
        const {
            message
        } = attributes;
        const blockProps = useBlockProps.save();

        return(
            <div { ...blockProps }>
                <h4>{message}</h4>
            </div>
        )
    }
} )