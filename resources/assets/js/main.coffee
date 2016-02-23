$ = global.jQuery = require 'jquery'
require 'bootstrap'
require './views/settings/index.coffee'
require './views/contents/edit.coffee'
require './views/categories/edit.coffee'
require './views/tags/edit.coffee'
require './views/tags/form.coffee'

$('[data-toggle="tooltip"]').tooltip()