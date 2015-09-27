import Vue from 'vue'
import {impress} from '/js/impress'
import slug from 'slugg'
import _ from 'lodash'

new Vue({
    el: '#i-tags-index',

    data: impress.$data({
        deleteTag : {},
        checkedAll : false
    }),

    ready: function() {
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