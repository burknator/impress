import Vue from 'vue'
import slug from 'slugg'
import {impress} from '/js/impress'

new Vue({
    el: '#i-categories-edit',

    data: impress.$data({
        autoSlug: true,
        editing: false,
        category: {
            id: '',
            name: '',
            slug: '',
            color_id: '',
            update_link: ''
        }
    }),

    ready: function() {
        this.$watch('autoSlug', (newVal, oldVal) => {
            if (newVal) this.makeSlug();
        })

        this.$watch('category.name', (newVal, oldVal) => {
            this.makeSlug()
        })

        if (this.category.name != '' && this.category.slug != '' && this.category.slug != slug(this.category.name)) {
            this.editing = true;
            this.autoSlug = false;
        }
    },

    methods: {
        makeSlug: function() {
            if (this.autoSlug) this.category.slug = slug(this.category.name)
        },

        edit: function (category) {
            this.editing = true;
            this.category = category;
        },

        create: function (e)
        {
            e.preventDefault();

            this.editing = false;

            this.category = {
                id: '',
                name: '',
                slug: '',
                color_id: '',
                update_link: ''
            }
        }
    }
})