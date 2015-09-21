import {impress} from '/js/impress'
import Vue from 'vue'
import slug from 'slugg'

new Vue({
    el: '#i-contents-edit',

    data: impress.$data({
        title:    '',
        slug:     '...',
        autoSlug: true
    }),

    ready: function() {
        this.$watch('autoSlug', (newVal, oldVal) => {
            if (newVal) this.makeSlug();
        })

        // If title and slug are not empty when ready fires the user is editing a post.
        // Additionaly, if the sluged version of the title doesn't match the current
        // slug, the user must've entered a manual slug, thus autoSlug = false.
        if (this.title != '' && this.slug != '' && slug(this.title) != this.slug) {
            this.autoSlug = false
        }
    },

    methods: {
        makeSlug: function() {
            if (this.autoSlug) {
                this.slug = slug(this.title);
            }
        }
    }
})