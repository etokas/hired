
<template>
 <div>
     <multiselect
             v-model="values"
             :options="options"
             :name="name"
             :placeholder="placeHolder"
             :show-labels="false"
             :multiple="multiple"
             :searchable="searchable"
             :showNoOptions="false"
             @tag="addTag"
             :options-limit="optionsLimit"
             :label="labelName"
             track-by="code"
             :value="values"
             @select="onSelect"
             @search-change="asyncFind"

     >
         <span slot="noResult">Aucun resultat</span>
     </multiselect>
     <slot name="hidden">
         <input autocomplete="off" name="job[localisation]" v-if="type === 'city'" v-model="inputValue" type="hidden"/>
         <select v-else multiple name="job[tags][]" class="hidden">
             <option v-for="option in getValue" :value="option.code" selected>{{ option.name }}</option>
         </select>
     </slot>
 </div>
</template>

<script>
    import Multiselect from 'vue-multiselect';
    import axios from 'axios';

    export default {
        components: { Multiselect },
        props : {
            tags: {
                type: Array,
                default: function () {
                    return []
                }
            },
            multiple: {
                type: Boolean,
                default: false
            },
            searchable: {
                type: Boolean,
                default: false
            },
            type: {
                type: String
            },
            optionsLimit: {
                type: Number,
                default: 50
            },
            name: {
                type: String,
                default: ''
            },

            labelName: {
                type: String,
                default: 'name'
            },

            placeHolder: {
                type: String,
                default: 'Compétences '
            }
        },
        data () {
            return {
                values: [],
                inputValue: null,
                options: this.tags,
            }
        },
        methods :  {
            addTag (newTag) {
                this.values.push(newTag)
            },

            onSelect (value) {
                this.inputValue = value[this.labelName]
            },

            asyncFind(query) {
                axios.get('https://geo.api.gouv.fr/communes?nom=' + query + '&fields=nom,code').then(data => (this.options = data.data))
            }
        },
        computed: {
            getValue() {
                if (!this.multiple && !Array.isArray(this.values)) {
                    this.values = [this.values];
                }
                return this.values;
            },
        },
    }
</script>