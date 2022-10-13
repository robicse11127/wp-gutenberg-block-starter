import { registerPlugin } from '@wordpress/plugins';
import {
    PluginPostStatusInfo,
    __experimentalMainDashboardButton as MainDashboardButton,
    PluginBlockSettingsMenuItem,
    PluginDocumentSettingPanel,
    PluginSidebar
} from '@wordpress/edit-post';
import {
    PanelBody,
    TextControl
} from '@wordpress/components';
import { useState } from '@wordpress/element';
import { __ } from '@wordpress/i18n'
import { rtCamp } from '../utils/icons';

const TextField = () => {
    const [ className, setClassName ] = useState( '' );
    return (
        <>
             <TextControl
                label={ __( 'Add Class Name', 'text-domain' ) }
                value={ className }
                onChange={ (value) => setClassName(value) }
            />
        </>
    )
}

const TestSlotFill = () => {
    return (
        <>
            <PluginPostStatusInfo>
                <p>Post status info slotfill</p>
            </PluginPostStatusInfo>
            <MainDashboardButton>
                {rtCamp}
            </MainDashboardButton>
            <PluginBlockSettingsMenuItem
                allowedBlocks={ [ 'core/paragraph' ] }
                icon={rtCamp}
                label={ __( 'Menu item text', 'text-domain' ) }
                onClick={ () => {
                    alert( 'clicked' );
                } }
            />
            <PluginDocumentSettingPanel
                name="custom-panel"
                title={ __( 'Custom Panel', 'text-domain' ) }
                className="custom-panel"
            >
                Custom Panel Contents
            </PluginDocumentSettingPanel>
            <PluginSidebar name="plugin-sidebar-test" title={ __( 'rtCamp Plugin', 'text-domain' ) } icon={ rtCamp }>
                    <PanelBody
                        title={ __( 'Plugin Settings', 'text-domain' ) }
                        initialOpen={ true }
                    >
                        <TextField />
                        <p>Plugin Sidebar</p>
                    </PanelBody>
            </PluginSidebar>
        </>
    )
}


registerPlugin( 'prefix-some-name', {
    render: TestSlotFill,
    icon: 'heart'
} );