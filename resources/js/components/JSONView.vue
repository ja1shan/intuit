<template>
    <div class="json">
        <pre v-html="prettyPrintJson(json)"></pre>
    </div>
</template>

<script>
export default {
    name: 'JSONView',
    props: {
        json: {
            type: Object,
            required: true,
        },
    },
    methods: {
        prettyPrintJson(jsonObject) {
            let jsonString = JSON.stringify(jsonObject, undefined, 2);
            jsonString = jsonString.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            return jsonString.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
                let cls = 'num';
                if (/^"/.test(match)) {
                    if (/:$/.test(match)) {
                        cls = 'key';
                    } else {
                        cls = 'string';
                    }
                } else if (/true|false/.test(match)) {
                    cls = 'boolean';
                } else if (/null/.test(match)) {
                    cls = 'null';
                }
                return '<span class="' + cls + '">' + match + '</span>';
            });
        }
    }
}
</script>

<style>
.json pre {
    background: #131415;
    padding: 5px;
    margin: 5px;
    font-size: 12px;
}
.json .string { color: #d4d7dc; }
.json .num { color: #ffad00; }
.json .boolean { color: #a898ff; }
.json .null { color: #1d68a7; }
.json .key { color: #a9e838; }
</style>
