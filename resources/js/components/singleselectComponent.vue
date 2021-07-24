<template>
    <div>
      <multiselect 
        v-model="value"
        :options="fields"
        :searchable="true"
        :close-on-select="true"
        :show-labels="false"
        :placeholder="pholder"
        @input="updateValue()"
        @remove="clearValue()">
    </multiselect>
     <input
            type="hidden"
            :name="attri"
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
        props: ['fields', 'pholder', 'attri', 'preselects'],
        data() {
            return {
                value: ''
            }
        },
        mounted() {
            this.value = this.preselects;
        },
        methods: {
            updateValue() {
                this.$emit('update-value', this.value)
            },
            clearValue() {
                this.$emit('clear-value')
            }
        }
    }

</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>