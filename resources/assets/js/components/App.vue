<template>
    <div class="container">
        <ui-toolbar title="App">
            <div slot="actions">
                <ui-icon-button
                    color="black"
                    icon="refresh"
                    size="large"
                    type="secondary"
                ></ui-icon-button>

                <ui-icon-button
                    color="black"
                    icon="search"
                    size="large"
                    type="secondary"
                ></ui-icon-button>

                <ui-icon-button
                    color="black"
                    has-dropdown
                    icon="more_vert"
                    ref="dropdownButton1"
                    size="large"
                    type="secondary"
                >
                    <ui-menu
                        contain-focus
                        has-icons
                        slot="dropdown"
                        :options="menuOptions"
                        @close="$refs.dropdownButton1.closeDropdown()"
                    ></ui-menu>
                </ui-icon-button>
            </div>
        </ui-toolbar>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: 'app',
        data() {
            return {

            }
        },
        mounted() {

        }
    }
</script>
