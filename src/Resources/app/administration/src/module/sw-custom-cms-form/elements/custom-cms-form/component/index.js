import template from './sw-cms-el-custom-cms-form.html.twig';
import contact from './templates/form-contact/index';
import './sw-cms-el-custom-cms-form.scss';

const { Component, Mixin } = Shopware;

/**
 * @private since v6.5.0
 * @package content
 */
Component.register('sw-cms-el-custom-cms-form', {
    template,

    mixins: [
        Mixin.getByName('cms-element'),
    ],

    components: {
        contact,
    },

    computed: {
        selectedForm() {
            return this.element.config.type.value;
        },
    },

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.initElementConfig('form');
        },
    },
});

