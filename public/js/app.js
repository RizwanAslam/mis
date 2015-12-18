(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
/**
 * Created by fakhar on 22/09/15.
 */
/*
 * Load the Bootstrap.
 */

'use strict';

Vue.config.debug = true;

//Application Level

//Invoice Level
new Vue({
    // We want to target the div with an id of 'invoice'
    el: '#invoice',

    // Here we can register any values or collections that hold data
    // for the application
    data: {
        invoice: {
            client: {
                id: 1,
                name: 'ABC Company'
            },
            project_id: 0,
            authorized_hours: 0,
            billed_hours: 0,
            rate: 0,
            status: 'Draft'
        }
    },

    // Anything within the ready function will run when the application loads
    ready: function ready() {
        // When the application loads, we want to call the method that initializes

    },

    // Methods we want to use in our application are registered here
    methods: {
        // We dedicate a method to retrieving and setting some data

    }

});

},{}]},{},[1]);
