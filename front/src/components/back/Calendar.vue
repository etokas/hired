<template>
    <div>
        <date-picker v-model='selectedDate'>
            <input
                    id="date"
                    slot-scope="{ inputProps, inputEvents }"
                    :class="[`vc-appearance-none vc-text-base vc-text-gray-800 vc-bg-white vc-border vc-border-gray-400 vc-rounded vc-w-full vc-py-2 vc-px-3 vc-leading-tight focus:vc-outline-none focus:vc-shadow`]"
                    v-bind="inputProps"
                    v-on="inputEvents"
                    name="job[startDate]"
                    autocomplete="off"
                    placeholder="Date de début"
            >
        </date-picker>
    </div>
</template>

<script>
    import Vue from 'vue'
    import DatePicker from 'v-calendar/lib/components/date-picker.umd'

    Vue.component('date-picker', DatePicker);

    export default {
        components: {DatePicker },
        data () {
            return {
                selectedDate: null,
            };
        }
    }
</script>

<style scoped>
    #date {
        width: 100%;
        height: 24px;

    }
</style>