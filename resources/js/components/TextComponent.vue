<template>
    <div>
        <div class="container v_text-set">
            <div class="row">
                <div class="col-md-6 ">
                    <textarea class="v_text-content" name="" id="" cols="40" rows="10"></textarea>
                </div>
                <div class="col-md-6">
                    <span class="input-group-text black-text font-weight-bold v_text-type">Choose Text Type</span>
                    <div>
                        <radio name="font" id="normal" value="font-normal" label="Text Type 01" v-bind:inverted="true" v-bind:checked="true" v-bind:required="true"></radio>
                        <radio name="font" id="italic" value="font-italic" label="Text Type 02" v-bind:inverted="true" v-bind:checked="false" v-bind:required="true"></radio>
                        <radio name="font" id="bold" value="font-bold" label="Text Type 03" v-bind:inverted="true" v-bind:checked="false" v-bind:required="true"></radio>
                        <radio name="font" id="b_italic" value="font-b_italic" label="Text Type 04" v-bind:inverted="true" v-bind:checked="false" v-bind:required="true"></radio>
                    </div>
                </div>
            </div>
        </div>
        <div class="v_product">
            <div class="v_content-center v_tshirt">
                <img :src="tshirt">
            </div>
            <div class="v_text">
                <!-- <img :src="logo"> -->
            </div>
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
        margin-top: 40px;
        background-color: #a3bbca;
        width: 100%;
        height: 100%;
    }
    .v_tshirt {
        padding: 120px 0px 120px 0px;
    }
    .v_text {
        position: absolute;
        top: 40%;
    }
    .v_text-content {
        width: 80%;
        border-color: black;
        border-width: 1px;
        border-style: solid;

    }
    .v_text-type {
        background-color: white;
        border: none;
    }

</style>

<script>
    import { mdbInput, mdbBtn } from 'mdbvue';
    import RadioComponent from '../components/RadioComponent.vue';
    import tshirt from '../../assets/images/tshirt.png';
    export default {
        name: 'InputsProPage',
        components: {
            mdbInput,
            mdbBtn,
            radio: RadioComponent
        },
        data: function() {
            return {
                tshirt: tshirt,
                radioGroup: 1
            }
        }
    }
</script>
