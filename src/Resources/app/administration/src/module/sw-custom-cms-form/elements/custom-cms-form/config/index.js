import template from './sw-cms-el-config-custom-cms-form.html.twig';
import './sw-cms-el-config-custom-cms-form.scss';

const { Component, Mixin } = Shopware;

/**
 * @private since v6.5.0
 * @package content
 */
Component.register('sw-cms-el-config-custom-cms-form', {
    template,

    inject: ['systemConfigApiService'],

    mixins: [
        Mixin.getByName('cms-element'),
    ],

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            console.log('enter config form creat method')
            this.initElementConfig('form');
        },
    },
});
