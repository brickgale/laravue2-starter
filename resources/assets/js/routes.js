import Vue from 'vue'
import VueRouter from 'vue-router'
import NotFound from './components/NotFound'
import Signin from './components/Signin'

import Admin from './components/admin/Main'
import AdminHome from './components/admin/Home'
import AdminProfile from './components/admin/Profile'

import Manager from './components/manager/Main'
import ManagerHome from './components/manager/Home'
import ManagerProfile from './components/manager/Profile'

import Regular from './components/regular/Main'
import RegularHome from './components/regular/Home'
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
		component: Admin,
		children: [
			{
				path: '',
				name: 'admin',
				component: AdminHome
			},
			{
				path: 'profile',
				component: AdminProfile
			}
		]
	},
	{
		path: '/manager',
		component: Manager,
		children: [
			{
				path: '',
				name: 'manager',
				component: ManagerHome
			},
			{
				path: 'profile',
				component: ManagerProfile
			}
		]
	},
	{
		path: '/regular',
		component: Regular,
		children: [
			{
				path: '',
				name: 'regular',
				component: RegularHome
			},
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