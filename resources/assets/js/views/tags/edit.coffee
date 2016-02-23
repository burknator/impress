Vue       = require 'vue'
{impress} = require '../../impress.coffee'
slug      = require 'slugg'

new Vue
  el: '#i-tags'

  data: impress.$data
    autoSlug   : true
    deleteTag  : {}
    checkedAll : false
    tag:
      id           : '',
      name         : '',
      slug         : '',
      color_id     : '',
      edit_link    : '',
      destroy_link : ''

  ready: ->
    if @tag.name != '' and @tag.slug != '' and @tag.slug != slug @tag.name
      @autoSlug = false
    
    @$watch 'tag.name', (newVal) ->
      @tag.slug = slug newVal if @autoSlug

    @$watch 'autoSlug', (newVal) ->
      @tag.slug = slug @tag.name if newVal

    @$watch 'checkedAll', (newVal) ->
      @tags.map (tag) -> tag.selected = newVal

    return

  computed:
    selected: -> @tags.filter (tag) -> tag.selected