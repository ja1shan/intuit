require('./bootstrap');

window.Vue = require('vue').default;

import HeaderView from "./components/HeaderView";
import SidebarNav from "./components/SidebarNav";
import SampleObjectContainer from "./components/SampleObjectContainer";
import QueryContainer from "./components/QueryContainer";
import ReadContainer from "./components/ReadContainer";

const app = new Vue({
    el: '#app',
    components: {
        HeaderView,
        SidebarNav,
        SampleObjectContainer,
        QueryContainer,
        ReadContainer,
    },
    data: {
        entities: null,
        selectedEntityKey: null,
        loading: true
    },
    computed: {
        selectedEntityData() {
            return this.entities[this.selectedEntityKey]
        }
    },
    methods: {
        async setEntityData() {
            await axios.get(
                `/get/entities`
            ).then(({ data }) => {
                this.entities = data.entities
                this.selectedEntityKey = data.default_entity
                this.loading = false
            }).catch (function (error) {
                alert(error.response.data.error)
            })
        },
        async getAuthorizationCode(code, realmID) {
            await axios.post(
                `/get/token`,
                {code, realmID}
            ).then(({ data }) => {
                if (data.quickbooks_token) {
                    localStorage.setItem('quickbooks_code', code)
                    localStorage.setItem('quickbooks_realmID', realmID)
                    localStorage.setItem('quickbooks_token', data.quickbooks_token)
                }
                window.location.href = '/'
            }).catch (function (error) {
                alert(error.response.data.error)
            })
        },
    },
    async mounted() {
        await this.setEntityData()
    },
    async beforeMount() {
        // @todo: refactor to store on server side for better security practices
        // check if we are receiving a callback and store the token to call the quickbooks API
        const urlParams = new URLSearchParams(window.location.search)
        const code = urlParams.get('code');
        const realmId = urlParams.get('realmId');
        if (code !== null && realmId !== null) {
            await this.getAuthorizationCode(code, realmId)
        }
    }
});
