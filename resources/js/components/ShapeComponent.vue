<template>
    <div class="row v_content-center">
        <div class="v_shape">
            <img v-bind:src="my_shape">
        </div>
        <div class="v_rectangle"></div>
        <div>
            <img v-bind:src="circle">
        </div>
    </div>
</template>

<style scoped>
    .v_rectangle {
        width: 100%;
        height: 5px;
        background-color: black;
    }
</style>

<script>
    export default {
        props: [
            'my_shape',
            'circle'
        ]
    }
</script>
