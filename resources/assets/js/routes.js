import Vue from 'vue'
import VueRouter from 'vue-router'
import KeenUI from 'keen-ui'
import Signin from './components/Signin'

let routes = [
	{
		path: '/',
		name: 'Signin',
		component: Signin
	}
]

Vue.use(VueRouter)
Vue.use(KeenUI)

export default new VueRouter({
	routes,
	linkActiveClass: 'active'
})