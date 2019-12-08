<template>
    <q-dialog v-model="prompt" persistent>
        <q-card style="min-width: 350px">
            <q-card-section>
                <div class="text-h6">Create New Category</div>
            </q-card-section>

            <q-card-section>
                <q-input dense v-model="name" autofocus></q-input>
            </q-card-section>

            <q-card-actions align="right" class="text-primary">
                <q-btn flat label="Cancel" @click="closeDialog"></q-btn>
                <q-btn flat label="Add Category" @click="createCategory" ></q-btn>
            </q-card-actions>
        </q-card>
    </q-dialog>
</template>

<script>
export default {
    name: "CreateCategoryDialog",
    data() {
        return {
            name: ""
        }
    },
    props: {
        prompt: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        createCategory() {
            let postData = {
                'name': this.name
            }
            let _this = this

            this.$store.dispatch('createCategory', postData).then(function () {
                _this.closeDialog()
            })
        },
        closeDialog() {
            this.$emit('close')
        }
    }
}
</script>

<style scoped>

</style>