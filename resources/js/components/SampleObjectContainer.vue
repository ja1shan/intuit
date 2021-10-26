<template>
    <div>
        <BaseDataView :heading="'Sample ' + name.toLowerCase() + ' object'">
            <template slot="left">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>ATTRIBUTES</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="attribute in sampleObject.attributes">
                        <td class="has-text-weight-bold has-text-right">
                            <div>
                                {{ attribute.name }}
                            </div>
                            <div v-if="sampleObject.required_fields.includes(attribute.name)" class="is-size-7">
                                <span class="has-text-danger">*</span> Required
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="has-text-weight-bold">{{ attribute.type }}</span>
                                <span v-if="attribute.filterable" class="is-italic">, filterable</span>
                                <span v-if="attribute.sortable" class="is-italic">, sortable</span>
                            </div>
                            <div>{{ attribute.description }}</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </template>
            <template slot="right" >
                <BaseCodeView :title="'SAMPLE OBJECT'" class="code">
                    <JSONView :json="sampleObject.sample" />
                </BaseCodeView>
            </template>
        </BaseDataView>
    </div>
</template>

<script>
import BaseDataView from "./BaseDataView";
import BaseCodeView from "./BaseCodeView";
import JSONView from "./JSONView";
export default {
    name: 'SampleObjectContainer',
    components: {JSONView, BaseCodeView, BaseDataView},
    props: {
        name: {
            type: String,
            required: true,
        },
        sampleObject: {
            type: Object,
            required: true,
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
</style>
