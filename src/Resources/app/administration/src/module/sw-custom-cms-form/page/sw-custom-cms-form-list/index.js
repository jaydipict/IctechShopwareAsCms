import template from './sw-custom-cms-form-list.html.twig';
import './sw-custom-cms-form-list.scss'

const { Component, Mixin } = Shopware;
const { Criteria } = Shopware.Data;

Shopware.Component.register('sw-custom-cms-form-list', {
    template,

    inject: ['repositoryFactory'],

    mixins: [
        Mixin.getByName('listing'),
    ],

    data() {
        return {
            formData: null,
            isLoading: true,
            sortBy: 'name',
            sortDirection: 'ASC',
            total: 0,
            searchConfigEntity: 'formData',
            variantNames: {},
            items: null,
            showDeleteModal: false
        };
    },
    metaInfo() {
        return {
            title: this.$createTitle(),
        };
    },
    computed: {
        cusCmsRepository() {
            return this.repositoryFactory.create('ict_cms');
        },
        // get all the form fields
        formDataColumns() {
            return [{
                property: 'name',
                dataIndex: 'name',
                allowResize: true,
                routerLink: 'sw-custom-cms-detail',
                label: 'sw-custom-cms-form.elements.general.list.columnCmsName',
                inlineEdit: 'string',
                primary: true,
            },{
                property: 'email',
                label: 'sw-custom-cms-form.elements.general.list.columnCmsEmail',
                inlineEdit: 'string',
            }, {
                property: 'contact_number',
                label: 'sw-custom-cms-form.elements.general.list.columnCmsContact',
                inlineEdit: 'string',
            },{
                property: 'subject',
                label: 'sw-custom-cms-form.elements.general.list.columnCmsSubject',
                inlineEdit: 'string',
            },{
                property: 'description',
                label: 'sw-custom-cms-form.elements.general.list.columnCmsDescription',
                inlineEdit: 'string',
            },
            ];
        },
        // get form criteria
        formDataCriteria() {
            const formDataCriteria = new Criteria(this.page, this.limit);
            formDataCriteria.setTerm(this.term);
            formDataCriteria.addSorting(Criteria.sort(this.sortBy, this.sortDirection, this.naturalSorting));
            return formDataCriteria;
        },
    },
    methods: {
        // get list of form data
        createdComponent() {
            this.getList();
        },
        onChangeLanguage(languageId) {
            this.getList(languageId);
        },
        async getList() {
            this.isLoading = true;
            const criteria = await this.addQueryScores(this.term, this.formDataCriteria);
            if (!this.entitySearchable) {
                this.isLoading = false;
                this.total = 0;
                return false;
            }
            if (this.freshSearchTerm) {
                criteria.resetSorting();
            }
            return this.cusCmsRepository.search(criteria)
                .then(searchResult => {
                    this.formData = searchResult;
                    this.total = searchResult.total;
                    this.isLoading = false;
                });
        },
        updateTotal({ total }) {
            this.total = total;
        },
    }
});
