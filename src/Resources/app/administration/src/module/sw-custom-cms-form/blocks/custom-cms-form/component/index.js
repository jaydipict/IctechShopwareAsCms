import template from './sw-custom-block-form.html.twig';

const { Component } = Shopware;

/**
 * @private since v6.5.0
 * @package content
 */
Component.register('sw-cms-block-custom-cms-form', {
    template,
});
