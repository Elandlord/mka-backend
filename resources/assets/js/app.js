
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 * 
 */
Vue.component('context-menu', require('vue-context-menu'));

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('nav-link', require('./components/nav/nav-link.vue'));
Vue.component('nav-user-active', require('./components/nav/nav-user-active.vue'));
Vue.component('pull-menu-cms', require('./components/menu/pull-menu-cms.vue'));
Vue.component('plugin-nav', require('./components/nav/plugin-nav.vue'));
Vue.component('overlay', require('./components/overlay/overlay.vue'));

Vue.component('read', require('./components/crud/read/read.vue'));

import {Tabs, Tab} from 'vue-tabs-component';

Vue.component('tabs', Tabs);
Vue.component('tab', Tab);


const app = new Vue({
    el: '#app'
});

$(document).ready(() => {

    $('.toggle-nav').on('click', () => {
        if($('.cms-navigation').is(":hidden")) {
            console.log("Hidden");            
            $('.body').removeClass('col-lg-12 col-md-12 col-sm-12 col-xs-12');
            $('.body').addClass('col-lg-10 col-md-10 col-sm-10 col-xs-10');
            setTimeout(() => {
                $('.cms-navigation').animate({width:'toggle'}, 500);
            }, 500);
            // $('.body').removeClass('transition-normal');
        } else {
            $('.cms-navigation').animate({width:'toggle'}, 500, () => {
                console.log("Check");
                // $('.body').addClass('transition-normal');
                $('.body').addClass('col-lg-12 col-md-12 col-sm-12 col-xs-12');
                $('.body').removeClass('col-lg-10 col-md-10 col-sm-10 col-xs-10');
            });

        }
        
    });
    
});
