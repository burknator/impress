import _ from 'lodash'

let impress = {
    /**
     * Grab global $data object which may contain data passed on from the controller and mix it with the passed custom
     * object. The custom object contains any additional models which may be created inside a vue.
     *
     * @param  {Object} custom
     * @return {Object}
     */
    $data: function(custom) {
        if (window.$data) {
            return _.assign(custom || {}, _.cloneDeep(window.$data))
        } else {
            return custom
        }
    }
}

export { impress }