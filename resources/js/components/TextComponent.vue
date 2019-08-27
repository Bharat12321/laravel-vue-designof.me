<template>
    <div>
        <div class="container v_text-set">
            <div class="row">
                <div class="col-md-6 ">
                    <textarea class="v_text-content form-control" name="" id="" cols="40" rows="10" v-model="text"></textarea>
                </div>
                <div class="col-md-6">
                    <span class="input-group-text black-text font-weight-bold v_text-type">Choose Text Type</span>
                    <div>
                        <radio name="font" id="normal" value="font-normal" label="Text Type 01" v-bind:inverted="true" v-bind:checked="true" v-bind:required="true" v-on:input="handleClick"></radio>
                        <radio name="font" id="italic" value="font-italic" label="Text Type 02" v-bind:inverted="true" v-bind:checked="false" v-bind:required="true" v-on:input="handleClick"></radio>
                        <radio name="font" id="bold" value="font-bold" label="Text Type 03" v-bind:inverted="true" v-bind:checked="false" v-bind:required="true" v-on:input="handleClick"></radio>
                        <radio name="font" id="b_italic" value="font-b_italic" label="Text Type 04" v-bind:inverted="true" v-bind:checked="false" v-bind:required="true" v-on:input="handleClick"></radio>
                    </div>
                </div>
                <div class="col-md-12 v_product" id="preview_tshirt">
                    <div class="v_content-center v_tshirt">
                        <img :src="tshirt">
                    </div>
                    <div>
                        <label id="shirt-text" class="v_text-normal">{{ text }}</label>
                    </div>
                </div>
                <div class="col-md-12 v_content-center">
                    <p class="v_user mt-5">Your design ready to share</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .v_user {
        color: grey;
        font-weight: normal;
        font-size: 40px;
    }
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
    .v_text-content {
        width: 80%;
        border-color: black;
        border-width: 1px;
        border-style: solid;

    }
    .v_text-type {
        background-color: white;
        border: none;
        font-size: 24px;
    }
    .v_text-normal {
        position: absolute;
        top: 42%;
        right: 36%;
        font-weight: normal;
        font-size: 30px;
        letter-spacing: 2px;
    }
    .v_text-italic {
        position: absolute;
        top: 42%;
        right: 36%;
        font-weight: normal;
        font-style: italic;
        font-size: 30px;
        letter-spacing: 2px;
    }
    .v_text-bold {
        position: absolute;
        top: 42%;
        right: 36%;
        font-weight: bold;
        font-size: 30px;
        letter-spacing: 2px;
    }
    .v_text-bold-italic {
        position: absolute;
        top: 42%;
        right: 36%;
        font-weight: bold;
        font-style: italic;
        font-size: 30px;
        letter-spacing: 2px;
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
                text: '',
                image: new Image()
            }
        },
        methods: {
            handleClick: function(val) {
                var el = document.getElementById('shirt-text');
                el.removeAttribute("style");
                if (val === 'font-normal') {
                    el.classList.replace(el.className, 'v_text-normal');
                }
                if (val === 'font-italic') {
                    el.classList.replace(el.className, 'v_text-italic');
                }
                if (val == 'font-bold') {
                    el.classList.replace(el.className, 'v_text-bold');
                }
                if (val == 'font-b_italic') {
                    el.classList.replace(el.className, 'v_text-bold-italic');
                }
            }
        }
    }
</script>
