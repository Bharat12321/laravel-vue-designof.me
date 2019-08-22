<template>
    <div class="v_product">
        <div class="v_content-center v_tshirt">
            <img :src="tshirt">
        </div>
        <div class="v_logo">
            <img :src="logo">
        </div>
    </div>
</template>

<style scoped>
    .v_content-center {
        display: flex;
        justify-content: center;
    }
    .v_product {
        position: relative;
        background-color: #a3bbca;
        width: 100%;
        height: 100%;
    }
    .v_tshirt {
        padding: 120px 0px 120px 0px;
    }
    .v_logo {
        position: absolute;
        top: 40%;
        right: 40%;
    }
</style>

<script>
    import tshirt from '../../assets/images/tshirt.png';
    import logo from '../../assets/images/logo.png';
    export default {
        data: function() {
            return {
                tshirt: tshirt,
                logo: logo
            }
        }
    }
</script>
