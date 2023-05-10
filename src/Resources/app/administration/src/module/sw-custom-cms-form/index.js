import './page/sw-custom-cms-form-list';

const { Module } = Shopware;

Shopware.Module.register('sw-custom-cms-form', {
    color: '#F88962',
    icon: 'regular-users',
    title: 'Inquiry Form',
    description: 'Inquiry Form Description',
    type: 'plugin',

    routes: {
        //index list page routes
        index: {
            components:{
                default: 'sw-custom-cms-form-list',
            },
            path: 'index',
        },
    },

    //navigation
    navigation: [{
        path: 'sw.custom.cms.form.index',
        id: 'sw-custom-cms-form',
        parent: 'sw-customer',
        label: 'Inquiry Form',
        color: '#F88962',
        position: 40,
    }],
});
