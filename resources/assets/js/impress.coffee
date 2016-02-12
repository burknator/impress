_ = require 'lodash'

impress =
  ###
  # Grab global $data object which may contain data passed on from the
  # controller and mix it with the passed custom object. The custom object
  # contains any additional models which may be created inside a vue.
  #
  # @param  {Object} custom
  # @return {Object}
  ###
  $data: (custom) ->
    if window.$impress
      return _.assign custom || {}, _.cloneDeep(window.$impress)
    else
      return custom

  ###
  # Prevents that a link is actually opened. Will only replace the history state
  # with the href attribute of the link.
  #
  # @param  {Vue Event} $event
  # @return {void}
  ###
  handleLinkClick: ($event) ->
    $event.preventDefault()

    window.history.replaceState(null, null, $event.target.href)

module.exports = { impress }