<template>
    <div class="text-sm text-gray-900" style="width: 100px;">
        <Multiselect
            v-model="value"
            :options="options"
            placeholder="Select one"
            :close-on-select="true"
            @select="changeLang"
        />
    </div>
</template>

<script>
import Multiselect from "@vueform/multiselect";
import {i18nVue, loadLanguageAsync, getActiveLanguage} from 'laravel-vue-i18n';

export default {
    components: { Multiselect },
    data() {
        const lang = getActiveLanguage();
        console.log(lang)
        return {
            value: lang,
            options: [
                { value: "en", label: "🇺🇲" },
                { value: "pt-BR", label: "🇺🇲" },
                { value: "es", label: "🇲🇽" },
            ],
        };
    },
    methods: {
        changeLang: function (value) {
            loadLanguageAsync(value.name);

            console.log(value)
        }
    }
};
</script>
<!-- <style src="vue-multiselect/dist/vue-multiselect.min.css"></style> -->

<link rel="stylesheet" href="https://unpkg.com/vue-multiselect/dist/vue-multiselect.min.css"></link>