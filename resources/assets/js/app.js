
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('comment', require('./components/Comment.vue'));
Vue.component('toggle-comment', require('./components/ToggleComment.vue'));

Vue.component('article-edit-group', require('./components/ArticleEditGroup.vue'));
Vue.component('article-edit-title', require('./components/ArticleEditTitle.vue'));
Vue.component('article-edit-item', require('./components/ArticleEditItem.vue'));
Vue.component('article-edit-paragraph', require('./components/ArticleEditParagraph.vue'));
Vue.component('article-edit-blockquote', require('./components/ArticleEditBlockquote.vue'));
Vue.component('article-edit-heading', require('./components/ArticleEditHeading.vue'));

window.Event = new Vue();
const app = new Vue({
    el: '#app',

    methods: {
    }
});

