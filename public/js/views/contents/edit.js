import {impress} from '/js/impress'
import Vue from 'vue'
import slug from 'slugg'

new Vue({
    el: '#i-contents-edit',

    data: impress.$data({
        title: '',
        slug: ''
    }),

    methods: {
        makeSlug: function() {
            this.slug = slug(this.title);
        }
    }
})