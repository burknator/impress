{ impress } = require '../../impress.coffee'
Vue         = require 'vue'
slug        = require 'slugg'

new Vue
  el: '#i-contents-edit'

  data: impress.$data
    title:    ''
    slug:     '...'
    autoSlug: true

  ready: ->
    @$watch 'autoSlug', (newVal, oldVal) ->
      @makeSlug() if newVal

    # If title and slug are not empty when ready fires the user is editing a
    # post. Additionaly, if the sluged version of the title doesn't match the
    # current slug, the user must've entered a manual slug,
    # thus autoSlug = false.
    if (@title != '' && @slug != '' && slug(@title) != @slug)
      @autoSlug = false

  methods:
    makeSlug: -> @slug = slug @title if @autoSlug