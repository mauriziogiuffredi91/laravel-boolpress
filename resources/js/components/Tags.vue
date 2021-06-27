<template>
    <section>
        <div class="tags">
            <span v-for="tag in tags" :key="`tag-${tag.id}`" class="tag">
                {{tag.name}}
            </span>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Tags',
    props:{
        tags: Array,
    }
}
</script>

<style lang="scss" scoped>

    .tags{
        display: inline-block;
    }
    .tag{
        display: inline-block;
        margin: .25rem;
        padding: 0.25rem;
        font-size: .75rem;
        background: lightblue;
        border-radius: 20px;

    }
</style>