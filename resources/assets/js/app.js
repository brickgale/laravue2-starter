import router from './routes'
import App from './components/App'
import {APP_ENV, APP_URL} from './config'
import VueResource from 'vue-resource'
import KeenUI from 'keen-ui'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue')

window.Vue.config.productionTip = false

Vue.use(VueResource)
Vue.use(KeenUI)

Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementsByName('csrf-token')[0].getAttribute('content')
Vue.http.headers.common['Authorization'] = 'Bearer ' + sessionStorage.getItem('id_token')
Vue.http.options.root = APP_URL

Vue.http.interceptors.push(function(request, next) {
    next(function(response) {
        if (response.status == 401 && response.body.message == 'Token has expired') {
            router.push({ name: 'home' })
        }
    })
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
	el: '#app',
	router,
	template: '<App/>',
	components: { App }
})
