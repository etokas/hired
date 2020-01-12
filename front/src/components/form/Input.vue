<template>
    <input type="text" :value="value" @input="updateInput">
</template>

<script>
    export default  {
        model: {
            prop: 'value',
            event: 'input'
        },
        props: {
            value: null
        },
        methods:{
            updateInput : function (e) {
                this.$emit('input', e.target.value)
            }
        }
    }
</script>

<style scoped>

</style>