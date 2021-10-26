<template>
    <div>
        <h3 v-if="heading" class="title is-4">{{ heading }}</h3>
        <div class="columns">
            <div class="column">
                <slot name="left"></slot>
            </div>
            <div class="column">
                <slot name="right"></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'BaseDataView',
    props: {
        heading: {
            type: String,
            required: false,
        },
    }
}
</script>
