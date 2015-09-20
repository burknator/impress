import Vue from 'vue';
import {jstz} from 'jstimezonedetect';

new Vue({
    el: '#i-settings-edit',

    data: {
        timezone: '',
        autosave: {
            enabled: false
        }
    },

    methods: {
        test: function() {
            this.timezone = jstz.determine().name()
        }
    }
});