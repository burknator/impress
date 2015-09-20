import _ from 'lodash'
import {jstz} from 'jstimezonedetect'
import Vue from 'vue'

new Vue({
    el: '#i-settings-edit',

    data: _.assign({
        // Custom models go here
    }, _.cloneDeep(window.$data)),

    methods: {
        redetectTimezone: function() {
            this['app-timezone'] = jstz.determine().name()
        }
    }
});