import Vue from 'vue'
import {impress} from '/js/impress'
import slug from 'slugg'

new Vue({
    el: '#i-tags-edit',

    data: impress.$data({
        autoSlug : true,
        tag: {
            name: '',
            slug: ''
        }
    }),

    ready: function() {
        if (this.tag.name != '' && this.tag.slug != '' && this.tag.slug != slug(this.tag.name)) {
            this.autoSlug = false
        }

        this.$watch('tag.name', (newVal, oldVal) => {
            if (this.autoSlug) this.tag.slug = slug(newVal)
        })

        this.$watch('autoSlug', (newVal) => {
            if (newVal) this.tag.slug = slug(this.tag.name)
        })
    }
})