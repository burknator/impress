{impress} = require '../../impress.coffee'
{jstz}    = require 'jstimezonedetect'
Vue       = require 'vue'

new Vue
  el: '#i-settings-edit'

  data:
    app:
      timezone: ''
      autosave:
        enabled: null

  methods:
    redetectTimezone: -> @app.timezone = jstz.determine().name()