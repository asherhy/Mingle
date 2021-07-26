<template>
    <div class="form-group form-row mb-4">
        <label for="type" class="col-form-label col-md-2"
            >no. of members excluding myself</label
        >
        <div class="col-md-10">
            <select
                id="members"
                name="members"
                @change="onChange($event)"
                class="form-control"
            >
                <option value="0" selected>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <div id="container"></div>
        </div>
    </div>
</template>

<script>
export default {
    components: {},
    data() {
        return {
            value: ""
        };
    },
    methods: {
        onChange(event) {
            var number = event.target.value;
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (var i = 0; i < number; i++) {
                var index = i + 1;
                // Append a node with a random text
                // Create an <input> element, set its type and name attributes
                $("#container").append(
                    '<div class="form-group form-row mt-4"><label for="title" class="col-form-label col-md-2">Telegram' +
                        " " +
                        index +
                        '</label><div class="input-group col-md-8"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">@</span></div><input type="telegram" class="form-control" name="telegram[]" id="telegram" required></div></div>'
                );
                // // Append a line break
                // container.appendChild(document.createElement("br"));
            }
        }
    },
    mounted() {
        this.value = this.preselects;
    }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
