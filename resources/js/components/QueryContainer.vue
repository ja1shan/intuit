<template>
    <div>
        <BaseDataView :heading="'Query ' + name.toLowerCase()">
            <template slot="left">
                Query {{ name.toLowerCase() }}
            </template>
            <template slot="right">
                <div class="code">
                    <BaseCodeView :title="'Request URL'">
                        <CodeView :code="queryObject.request_url_example" />
                    </BaseCodeView>
                    <BaseCodeView :title="'Sample Query'" class="pt-5">
                        <TextInput :value="sampleQuery" @input="updateSampleQuery" />
                    </BaseCodeView>
                    <div class="pt-1">
                        <button v-if="isConnected" @click="runQuery" class="button is-small is-primary">Try it</button>
                        <button v-else @click="connect" class="button is-small is-success">Connect</button>
                    </div>
                    <BaseCodeView :title="'Returns'" class="pt-5">
                        <div v-if="loading" class="loading">
                            <div class="loader"></div>
                        </div>
                        <JSONView v-else :json="responseQuery" />
                    </BaseCodeView>
                </div>
            </template>
        </BaseDataView>
    </div>
</template>

<script>
import BaseDataView from "./BaseDataView";
import BaseCodeView from "./BaseCodeView";
import JSONView from "./JSONView";
import CodeView from "./CodeView";
import TextInput from "./TextInput";
export default {
    name: 'QueryContainer',
    components: {TextInput, JSONView, CodeView, BaseCodeView, BaseDataView},
    props: {
        name: {
            type: String,
            required: true,
        },
        queryObject: {
            type: Object,
            required: true,
        },
    },
    watch: {
        name: function(newValue, oldValue) {
            if (newValue !== oldValue) {
                // @todo: refactor with vuex
                // cheaply reload state
                this.sampleQuery = this.queryObject.sample_query
                this.responseQuery = this.queryObject.sample
            }
        }
    },
    data() {
        return {
            sampleQuery: this.queryObject.sample_query,
            responseQuery: this.queryObject.sample,
            isConnected: localStorage.getItem('quickbooks_token') && localStorage.getItem('quickbooks_realmID'),
            loading: false
        }
    },
    methods: {
        async connect() {
            await axios.get(
                `/connect`
            ).then(({ data }) => {
                window.location.href = data.authorizationCodeUrl
            }).catch (function (error) {
                alert(error.response.data.error)
            })
        },
        async runQuery() {
            this.loading = true
            const endpoint = this.queryObject.request_url
                .replace('<realmID>', localStorage.getItem('quickbooks_realmID'))
                .replace('<selectStatement>', encodeURIComponent(this.sampleQuery))
            await axios.post(
                `/proxy`,
                {
                    token: localStorage.getItem('quickbooks_token'),
                    content_type: this.queryObject.request_url_content_type,
                    endpoint,
                }
            ).then(({ data }) => {
                if (data.failed_code === 401) {
                    localStorage.removeItem('quickbooks_token')
                    localStorage.removeItem('quickbooks_realmID')
                    this.isConnected = false
                    alert('Authentication error. Please try to reconnect.')
                    return
                } else if (data.failed_code) {
                    alert('Something went wrong. Please check you entered a valid query.')
                    return
                }
                this.responseQuery = data.response
            }).catch (function (error) {
                alert(error.response.data.error)
            })
            this.loading = false
        },
        updateSampleQuery(value) {
            this.sampleQuery = value
        },
    }
}
</script>

<style scoped>
    .code {
        color: #d4d7dc;
        background: #262729;
        padding: 16px;
        border-radius: 4px;
        max-height: 65vh;
        overflow-y: scroll;
    }

    .loading {
        text-align: center;
        background: #131415;
        margin: 5px;
    }

    .loading img {
        height: 80px;
    }
</style>
