
<template>
 <div>
     <multiselect
             v-model="values"
             :options="options"
             :placeholder="placeHolder"
             :show-labels="false"
             :multiple="multiple"
             :searchable="searchable"
             :showNoOptions="false"
             :options-limit="optionsLimit"
             :label="labelName"
             track-by="code"
             :value="values"
             @select="onSelect"
             @search-change="asyncFind"
             @input="addTag"
     >
         <span slot="noResult">Aucun resultat</span>
     </multiselect>
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
            labelName: {
                type: String,
                default: 'name'
            },

            placeHolder: {
                type: String,
                default: 'Compétences '
            }
        },
        mounted() {
            this.init();
        },
        data () {
            return {
                values: [],
                options: this.tags,
            }
        },
        methods :  {
            addTag (tags) {
                this.$emit('input-add', tags)
            },

            onSelect (value) {
                this.inputValue = value[this.labelName]
            },
            init () {
                axios.get('http://symfony.local/tags').then(function (tags) {
                    this.options = tags.data
                }.bind(this))
            },
            asyncFind(query) {
                axios.get('https://geo.api.gouv.fr/communes?nom=' + query + '&fields=nom,code').then(data => (this.options = data.data))
            }
        }
    }
</script>