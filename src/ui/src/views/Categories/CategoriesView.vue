<template>
    <div class="q-pa-md">
        <div class="row">
            <div class="col">
                <q-card style="padding: 5px;">
                    <view-categories-table></view-categories-table>
                    <br>
                    <q-btn
                        color="primary"
                        align="center"
                        label="Create New"
                        @click="createNewDialog = true"
                    />
                </q-card>
                <create-category-dialog
                        @close="createNewDialog = !createNewDialog"
                        :prompt="createNewDialog"
                ></create-category-dialog>
            </div>
        </div>
    </div>
</template>

<script>
import ViewCategoriesTable from "../../components/Categories/Table/ViewCategoriesTable";
import CreateCategoryDialog from "../../components/Categories/Dialogs/CreateCategoryDialog";

export default {
    name: "CategoriesView",
    components: {
        ViewCategoriesTable,
        CreateCategoryDialog
    },
    data() {
        return {
            createNewDialog: false
        }
    },
    created() {
        this.$store.dispatch('categoriesGetAll')
    }
}
</script>

<style scoped>

</style>