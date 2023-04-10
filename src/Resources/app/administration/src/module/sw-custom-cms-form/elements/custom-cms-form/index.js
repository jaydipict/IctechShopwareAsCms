import './component';
import './config';
import './preview';

/**
 * @private since v6.5.0
 * @package content
 */
Shopware.Service('cmsService').registerCmsElement({
    name: 'custom-cms-form',
    label: 'sw-cms.elements.form.label',
    component: 'sw-cms-el-custom-cms-form',
    configComponent: 'sw-cms-el-config-custom-cms-form',
    previewComponent: 'sw-cms-el-preview-custom-cms-form',
    defaultConfig: {
        type: {
            source: 'static',
            value: 'contact',
        },
        title: {
            source: 'static',
            value: '',
        },
        mailReceiver: {
            source: 'static',
            value: [],
        },
        defaultMailReceiver: {
            source: 'static',
            value: true,
        },
        confirmationText: {
            source: 'static',
            value: '',
        },
    },
});
