<template>
    <div>
        <BaseDataView>
            <template slot="left">
                <h1 class="title is-2">{{ title }}</h1>
                <h3 class="subtitle is-6 pt-5">{{ description }}</h3>
            </template>
        </BaseDataView>
    </div>
</template>

<script>
import BaseDataView from "./BaseDataView";
export default {
    name: 'HeaderView',
    components: {BaseDataView},
    props: {
        title: {
            type: String,
            required: true,
        },
        description: {
            type: String,
            required: true,
        }
    }
}
</script>
