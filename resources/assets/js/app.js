/**
 * Created by fakhar on 22/09/15.
 */
/*
 * Load the Bootstrap.
 */


Vue.config.debug = true;

//Application Level



//Invoice Level
new Vue({
// We want to target the div with an id of 'invoice'
    el: '#invoice',

    // Here we can register any values or collections that hold data
    // for the application
    data: {
        invoice : {
            client : {
                id: 1,
                name: 'ABC Company'
            },
            project_id : 0,
            authorized_hours : 0,
            billed_hours : 0,
            rate : 0,
            status : 'Draft'
        }
    },

    // Anything within the ready function will run when the application loads
    ready: function() {
        // When the application loads, we want to call the method that initializes

    },

    // Methods we want to use in our application are registered here
    methods: {
        // We dedicate a method to retrieving and setting some data

    }

});

