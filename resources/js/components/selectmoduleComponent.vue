<template>
    <div>
        <multiselect 
            v-model="value"
            :options="modules"
            :searchable="true"
            :close-on-select="true"
            :placeholder="pholder"
            label="code_title"
            track-by="code_title"
            @input="updateModule()"
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
        props: ['modules', 'pholder'],
        data() {
            return {
                value: ''
            }
        },
        methods: {
            updateModule() {
                this.$emit('update-module', this.value.id)
            }
        }
    }

</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>