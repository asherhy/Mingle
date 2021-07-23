<template>
    <div>
        <multiselect 
            v-model="value"
            :options="modules"
            :searchable="true"
            :close-on-select="true"
            placeholder="Select a module to search"
            label="code_title"
            track-by="code_title"
            @input="updateModule()"
            @remove="clearModule()"
        >
        </multiselect>
            <input
                type="hidden"
                :name="modules"
                :value="value"
                required
            />
    </div>
</template>

<script>

    import Multiselect from 'vue-multiselect'

    export default {
        components: {
            Multiselect
        },
        props: ['modules'],
        data() {
            return {
                value: ''
            }
        },
        methods: {
            updateModule() {
                this.$emit('update-module', this.value.id)
            },
            clearModule() {
                this.$emit('clear-module')
            }
        }
    }

</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>