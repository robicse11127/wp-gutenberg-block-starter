import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { ServerSideRender } from '@wordpress/components';
import { Fragment } from '@wordpress/element';

registerBlockType( 'prefix-blocks/dynamic-block', {
    title: __( 'Dynamic Block' ),
    icon: 'heart',
    category: 'common',
    keywords: [ 'Dynamic Block' ],
    attributes: {},
    edit: ( { attributes, setAttributes } ) => {
        return(
            <Fragment>
                <ServerSideRender
                    block="prefix-blocks/dynamic-block"
                    attributes={{ }}
                />
            </Fragment>
        )
    },
    save: ( { attributes } ) => {
        return null;
    }
} )