import Vue from 'vue'
import VueRouter from 'vue-router'
import NotFound from './components/NotFound'
import Signin from './components/Signin'
import Admin from './components/admin/Main'
import AdminProfile from './components/admin/Profile'
import Manager from './components/manager/Main'
import ManagerProfile from './components/manager/Profile'
import Regular from './components/regular/Main'
import RegularProfile from './components/regular/Profile'

Vue.use(VueRouter)

let routes = [
	{
		path: '/',
		name: 'home',
		component: Signin
	},
	{
		path: '/admin',
		name: 'admin',
		component: Admin,
		children: [
			{
				path: 'profile',
				component: AdminProfile
			}
		]
	},
	{
		path: '/manager',
		name: 'manager',
		component: Manager,
		children: [
			{
				path: 'profile',
				component: ManagerProfile
			}
		]
	},
	{
		path: '/regular',
		name: 'regular',
		component: Regular,
		children: [
			{
				path: 'profile',
				component: RegularProfile
			}
		]
	},
	{
		path: '/not-found',
		component: NotFound
	},
	{
		path: '*',
		redirect: '/not-found'
	}
]

export default new VueRouter({
	routes,
	linkActiveClass: 'active'
})