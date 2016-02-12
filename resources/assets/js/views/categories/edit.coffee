Vue       = require 'vue'
slug      = require 'slugg'
{impress} = require '../../impress.coffee'

new Vue
  el: '#i-categories-edit'

  data: impress.$data
    autoSlug: true
    category:
      name: ''
      slug: ''

  ready: ->
    if (@category.name != '' && @category.slug != '' && @category.slug != slug(@category.name))
      @autoSlug = false

    @$watch 'category.name', (newVal, oldVal) ->
      if @autoSlug
        @category.slug = slug(newVal)

    @$watch 'autoSlug', (newVal, oldVal) ->
      @makeSlug() if newVal