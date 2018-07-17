import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [{
            path: '/',
            name: 'home',
            component: require('../components/Home.vue')
        },
        {
            path: '/editor',
            name: 'editor',
            component: require('../components/editor/Editor.vue')
        }
    ]
})