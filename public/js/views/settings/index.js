import _ from 'lodash'
import {impress} from '/js/impress'
import {jstz} from 'jstimezonedetect'
import Vue from 'vue'

new Vue({
    el: '#i-settings-edit',

    data: {
        app: {
            timezone: '',
            autosave: {
                enabled: null
            }
        }
    },

    methods: {
        redetectTimezone: function() {
            this.app.timezone = jstz.determine().name()
        }
    }
});