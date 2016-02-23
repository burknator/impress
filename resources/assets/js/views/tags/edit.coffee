Vue         = require 'vue'
{ impress } = require '../../impress.coffee'

new Vue
  el: '#i-tags'  

  data: impress.$data
    deleteTag  : {}
    checkedAll : false

  ready: ->
    @$watch 'checkedAll', (newVal) ->
      @tags.map (tag) -> tag.selected = newVal

    return

   computed:
    selected: -> @tags.filter (tag) -> tag.selected 