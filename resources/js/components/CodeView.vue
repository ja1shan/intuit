<template>
    <div class="code-view">
        <pre>{{ code }}</pre>
    </div>
</template>

<script>
export default {
    name: 'CodeView',
    props: {
        code: {
            type: String,
            required: true,
        },
    }
}
</script>

<style>
.code-view pre {
    background: #131415;
    color: #d4d7dc;
    padding: 5px;
    margin: 5px;
    font-size: 12px;
}
</style>
