<template>
    <div class="sign-in">
        <div class="centered-con">
            <h3 class="title"> Sign-in </h3>
            <div class="wrapper">
                <form autocomplete="off" @submit.prevent="signin">
                    <div class="form-group">
                        <ui-textbox
                            label="Email" name="email" id="email" type="text" v-model="email" placeholder="Enter Email"
                        ></ui-textbox>
                    </div>
                    <div class="form-group">
                        <ui-textbox
                            label="Password" name="password" id="password" type="password" v-model="password" placeholder="Enter Password"
                        ></ui-textbox>
                    </div>
                    <ui-button type="primary" color="primary">サインイン</ui-button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import auth from '../services/auth'

    export default {
        name: 'sign-in',
        data() {
            return {
                email: '',
                password: '',
                error: false,
                error_message: ''
            }
        },
        methods: {
            signin() {
                auth.signin(this, this.email, this.password)
            }
        },
        mounted() {

        }
    }
</script>
