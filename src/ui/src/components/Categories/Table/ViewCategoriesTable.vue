<template>
    <q-table
            title="Categories"
            :data="categories.tableData"
            :loading="categories.loading"
            :columns="columns"
            row-key="name"
    ></q-table>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
    name: "ViewCategoriesTable",
    data() {
        return {
            columns: [
                {
                    name: 'id',
                    required: true,
                    label: 'ID',
                    align: 'left',
                    field: row => row.id,
                    format: val => `${val}`,
                    sortable: true
                },
                {
                    name: 'name',
                    required: true,
                    label: 'Name',
                    align: 'left',
                    field: row => row.name,
                    format: val => `${val}`,
                    sortable: true
                },
            ]
        }
    },
    computed: {
        ...mapGetters({
            categories: 'getCategoriesData'
        })
    }
}
</script>

<style scoped>

</style>