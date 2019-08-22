require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import money from 'v-money';
Vue.use(money, {precision: 4});

import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify);

import 'material-design-icons-iconfont/dist/material-design-icons.css';
import 'bootstrap-css-only/css/bootstrap.min.css';
import 'mdbvue/build/css/mdb.css';
import App from './App.vue';

import IndexComponent from './pages/IndexComponent.vue';
import LoginComponent from './pages/LoginComponent.vue';
import RegisterComponent from './pages/RegisterComponent.vue';
import ProfileComponent from './pages/ProfileComponent.vue';
import CreateComponent from './pages/CreateComponent.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: IndexComponent
    },
    {
        name: 'register',
        path: '/register',
        component: RegisterComponent
    },
    {
        name: 'login',
        path: '/login',
        component: LoginComponent
    },
    {
        name: 'profile',
        path: '/:id',
        component: ProfileComponent
    },
    {
        name: 'create',
        path: '/:id/createapparel',
        component: CreateComponent
    }
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
