import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import ServerSideRender from '@wordpress/server-side-render';

import metadata from './block.json';
import './editor.css';
import './style.css';

registerBlockType( metadata.name, {

    edit: ( { attributes, setAttributes } ) => {
        return(
            <>
                <div { ...useBlockProps() }>
                    <ServerSideRender
                        block={ metadata.name }
                        attributes={{}}
                    />
                </div>
            </>
        )
    },
    save: () => {
        return null;
    }
} );