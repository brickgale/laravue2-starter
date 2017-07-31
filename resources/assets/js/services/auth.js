import router from '../routes'
import {profile} from '../config'
import {USER_RESOURCE, USER_AUTHENTICATE} from '../api_routes'

export default {
	user: {
		authenticated: false,
		profile,
		role: null
	},
	check(role, callback) {

        if (role == 'guest') {
            if(typeof callback == 'function') {
                callback()
            }
            return
        }
        if (sessionStorage.getItem('id_token') != null) {
            Vue.http.get(
                USER_RESOURCE,
            ).then(response => {
                this.user.authenticated = true
                this.user.profile = response.data.user
                this.user.role = response.data.role

                if(typeof callback == 'function') {
                    callback()
                }

                if (
                        typeof this.user.role != 'undefined' &&
                        typeof role != 'undefined' && 
                        role != this.user.role
                    ) 
                {
                    router.push({
                        name: `${this.user.role}`
                    })
                }
            }, response => {
                this.signout()
            })
            
            return
        } 

        router.push({ name: 'home' })
    },
    signin(context, email, password, callback) {
        Vue.http.post(
            USER_AUTHENTICATE,
            {
                email: email,
                password: password
            }
        ).then(response => {
            context.error = false
            this.setToken(response.data.token)

            this.user.authenticated = true
            this.user.profile = response.data.user
            this.user.role = response.data.role

            router.push({
                name: `${this.user.role}`
            })
        }, response => {
            context.error_message = response.data.message
            context.error = true
        })
    },
    signout() {
        sessionStorage.removeItem('id_token')
        this.user.authenticated = false
        this.user.profile = profile
        this.user.role = null

        router.push({
            name: 'home'
        })
    },
    setToken(token) {
        sessionStorage.setItem('id_token', token)
        Vue.http.headers.common['Authorization'] = 'Bearer ' + sessionStorage.getItem('id_token')
    }
}