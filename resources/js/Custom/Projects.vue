<script>
export default {
    props: [
        'title',
        'description',
        'color',
    ]
}

</script>

<template>
    <section class="flex items-center px-44 py-6 justify-between">
        <div
            :class="color"
            class="h-24 w-24 rounded-full border-double border-8"
        >
            <slot></slot>
        </div>
        <p class="text-4xl font-extrabold mx-10 flex-1">
            {{ title }}</p>
        <p class="text-2xl mx-10 flex-1">
            {{ description }}
        </p>
    </section>
</template>

<style scoped>

</style>
