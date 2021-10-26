<template>
    <div class="text-input">
        <input :value="value" v-on:input="(event) => this.$emit('input', event.target.value)" />
    </div>
</template>

<script>
export default {
    name: 'TextInput',
    props: {
        value: {
            type: String,
            required: true,
        },
    }
}
</script>

<style>
.text-input input {
    background: #FFFFFF;
    color: #4D4D4C;
    padding: 4px 8px;
    width: 100%;
}
</style>
