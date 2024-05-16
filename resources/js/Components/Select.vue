<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: {
        value: {
            required: true,
        },
        options: {
            type: Object,
            required: true,
        },
        placeholder: {
            type: String,
            required: false,
            default: "selecione",
        },
    },
    emits: ["update:modelValue"],
    methods: {
        focus() {
            this.$refs.input.focus();
        },
    },
});
</script>
<template>
    <select
        class=""
        :value="value"
        @input="$emit('update:modelValue', $event.target.value)"
    >
        <option value="" v-if="placeholder">{{ placeholder }}</option>

        <option
            v-for="option in options"
            :key="option.id"
            v-bind:value="option.id"
        >
            {{ option.name }}
        </option>
    </select>
</template>
