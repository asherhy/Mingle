<template>
    <div>
        <multiselect
            v-model="values"
            :placeholder="pholder"
            :options="fields"
            :close-on-select="false"
            :multiple="true"
            :taggable="true"
            @tag="addTag"
        >
        </multiselect>
        <input
            type="hidden"
            :name="attri"
            v-for="value in values"
            :value="value"
        />
    </div>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
    components: {
        Multiselect
    },
    props: ["fields", "pholder", "attri", "preselects"],
    data() {
        return {
            values: []
        };
    },
    methods: {
        addTag(newTag) {
            const tag = {
                name: newTag,
                code:
                    newTag.substring(0, 2) +
                    Math.floor(Math.random() * 10000000)
            };
            this.options.push(tag);
            this.values.push(tag);
        },
        updateFieldRequired() {
            this.$nextTick(() => {
                const required =
                    this.required &&
                    (this.option == null ||
                        (Array.isArray(this.option) &&
                            this.option.length == 0 &&
                            this.options.length > 0));
                this.$refs.multiselect.$el.querySelector(
                    "input"
                ).required = required;
            });
        }
    },
    mounted() {
        this.values.push(...this.preselects);
    }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style>
.multiselect__option--highlight:after,
.multiselect__option--highlight,
.multiselect__tag-icon,
.multiselect__tag,
.multiselect__tag:after {
    background: #3aafa9;
}

.multiselect__tag-icon:hover {
    background: #37a29d;
}
</style>
