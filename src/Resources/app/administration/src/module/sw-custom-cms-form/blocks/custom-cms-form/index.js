import './preview';
import './component';

Shopware.Service('cmsService').registerCmsBlock(
    {
        name: 'custom-cms-form',
        label: 'sw-custom-cms-form.blocks.custom-cms-form.formCustom.label',
        category: 'form',
        component: 'sw-cms-block-custom-cms-form',
        previewComponent: 'sw-cms-preview-custom-cms-form',
        defaultConfig: {
            marginBottom: '20px',
            marginTop: '20px',
            marginLeft: '20px',
            marginRight: '20px',
            sizingMode: 'boxed',
        },
        slots: {
            content: 'custom-cms-form',
        },
    });
