<template>
    <div class="sidebar-nav">
        <aside class="menu">
            <p class="menu-label">
                E-Commerce API's
            </p>
            <ul class="menu-list">
                <li v-for="(entity, entityKey) in entities">
                    <a @click="$emit('click', entityKey)" :class="{'is-active': entityKey === selectedEntity}">
                        {{ entityKey.charAt(0).toUpperCase() + entityKey.slice(1) }}
                    </a>
                </li>
            </ul>
        </aside>
    </div>
</template>

<script>
export default {
    name: 'SidebarNav',
    props: {
        entities: {
            type: Object,
            required: true,
        },
        selectedEntity: {
            type: String,
            required: true,
        },
    }
}
</script>

<style>
.sidebar-nav {
    background: #ebeef1;
    padding: 8px 0px 8px 12px;
    position: sticky;
    top: 0;
    height: 100%;
}
</style>
