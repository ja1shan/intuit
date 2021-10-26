<template>
    <div>
        <div class="sub-title is-3">{{ title }}</div>
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: 'BaseCodeView',
    props: {
        title: {
            type: String,
            required: true,
        },
    }
}
</script>

<style scoped>
    .sub-title {
        color: #babec5;
    }
</style>
