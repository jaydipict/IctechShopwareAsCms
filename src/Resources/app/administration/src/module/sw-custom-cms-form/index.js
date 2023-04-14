import './page/sw-custom-cms-form-list';

const { Module } = Shopware;

Shopware.Module.register('sw-custom-cms-form', {
    color: '#F88962',
    icon: 'regular-users',
    title: 'Inquiry Form',
    description: 'Inquiry Form Description',
    version: '1.0.0',
    targetVersion: '1.0.0',
    type: 'plugin',
    entity: 'ict_cms',

    routes: {
        //index list page routes
        index: {
            components:{
                default: 'sw-custom-cms-form-list',
            },
            path: 'index',
        },
        // This is our second route
        detail: {
            component: 'ssw-custom-cms-form-detail',
            path: 'detail/:id',
            meta: {
                parentPath: 'sw.custom.cms.form.index',
                privilege: 'custom_cms_form.viewer',
            },
            props: {
                default(route) {
                    return {
                        cusCmsId: route.params.id,
                    };
                },
            },
        },
    },

    //navigation
    navigation: [{
        path: 'sw.custom.cms.form.index',
        id: 'sw-custom-cms-form',
        parent: 'sw-customer',
        label: 'Inquiry Contact Form',
        color: '#F88962',
        position: 40,
        privilege: 'custom_cms_form.viewer',
    }],
});
