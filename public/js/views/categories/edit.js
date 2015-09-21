import Vue from 'vue'
import slug from 'slugg'

new Vue({
    el: '#i-categories-edit, #i-tags-edit',

    data: {
        name: '',
        slug: '',
        autoSlug: true,
        color: null
    },

    ready: function() {
        this.$watch('autoSlug', (newVal, oldVal) => {
            if (newVal) this.makeSlug();
        })

        this.$watch('name', (newVal, oldVal) => {
            this.makeSlug()
        })

        if (this.name != '' && this.slug != '' && this.slug != slug(this.name)) {
            this.autoSlug = false;
        }
    },

    methods: {
        makeSlug: function() {
            if (this.autoSlug) this.slug = slug(this.name)
        }
    }
})