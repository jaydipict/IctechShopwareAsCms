import template from './sw-custom-preview-form.html.twig';
import './sw-cms-preview-custom-cms-form.scss';

const { Component } = Shopware;

/**
 * @private since v6.5.0
 * @package content
 */
Component.register('sw-cms-preview-custom-cms-form', {
    template,
});
