<template>
    <q-card class="my-card">
        <q-card-section class="bg-primary text-white">
            <div class="text-h6">Number Of Categories</div>
            <div class="text-subtitle2">x</div>
        </q-card-section>

        <q-separator ></q-separator>
    </q-card>
</template>

<script>
export default {
    name: "StatsCard",
    props: {
        title: {
            type: String,
            default: ""
        },
        subtitle: {
            type: String,
            default: ""
        }
    }
}
</script>

<style scoped>

</style>