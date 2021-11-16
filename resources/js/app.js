import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './components/App.vue'
import routes from './routes'
import { BootstrapVue, IconsPlugin, TablePlugin } from 'bootstrap-vue'
import VuePromiseBtn from 'vue-promise-btn'

import 'vue-promise-btn/dist/vue-promise-btn.css'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue'

Vue.use(VuePromiseBtn) 
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(TablePlugin)
Vue.use(VueRouter)


const router = new VueRouter({
    mode: "hash",
    base: "/p/",
    routes
});

new Vue({
    render: h => h(App),
    router
}).$mount("#app");