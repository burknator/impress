import Vue from 'vue'
import slug from 'slugg'
import {impress} from '/js/impress'

new Vue({
    el: '#i-categories-edit',

    data: impress.$data({
        autoSlug: true,
        category: {
            name: '',
            slug: ''
        }
    }),

    ready: function() {
        if (this.category.name != '' && this.category.slug != '' && this.category.slug != slug(this.category.name)) {
            this.autoSlug = false
        }

        this.$watch('category.name', (newVal, oldVal) => {
            if (this.autoSlug) this.category.slug = slug(newVal)
        })

        this.$watch('autoSlug', (newVal, oldVal) => {
            if (newVal) this.makeSlug()
        })
    }
})