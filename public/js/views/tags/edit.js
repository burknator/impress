import Vue from 'vue'
import {impress} from '/js/impress'
import slug from 'slugg'
import _ from 'lodash'

new Vue({
    el: '#i-tags-edit',

    data: impress.$data({
        autoSlug : true,
        deleteTag : {},
        checkedAll : false,
        tag: {
            id: '',
            name: '',
            slug: '',
            color_id: '',
            edit_link: '',
            destroy_link: ''
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

        this.$watch('checkedAll', (newVal) => {
            _.each(this.tags, (tag) => {
                tag.selected = newVal
            })
        })
    },

    computed: {
        selected: function () {
            let selected = []

            _.each(this.tags, (tag) => {
                if (tag.selected) selected.push(tag)
            })

            return selected
        }
    }
})