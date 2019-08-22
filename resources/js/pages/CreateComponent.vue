<template>
    <div>
        <nav-component></nav-component>
        <div class="container">
            <div class="row v_content-center">
                <div class="col-md-12 v_content-center">
                    <p class="v_user mt-5">Making by user</p>
                </div>
                <div class="col-md-12 v_content-center">
                    <img :src=mark >
                </div>
                <div class="container-fluid">
                    <div class="v_outer">
                        <div class="text-center v_left">
                            <mdb-btn
                                class="v_active"
                                id="logoBtn"
                                v-on:click="clickLogo"
                            >
                                Add Logo
                            </mdb-btn>
                        </div>
                        <div class="text-center v_right">
                            <mdb-btn
                                class="v_nonactive"
                                id="textBtn"
                                v-on:click="clickText"
                            >
                                Enter Text
                            </mdb-btn>
                        </div>
                    </div>
                    <div class="row v_time-prize">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text black-text font-weight-bold v_pend">Price:</span>
                                </div>
                                <money class="form-control v_prize" v-model="price" v-bind="money"></money>
                                <div class="input-group-append">
                                    <span class="input-group-text v_pend">Minimum price is 20$</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text black-text font-weight-bold v_pend">Time:</span>
                                </div>
                                <input type="time" class="form-control v_prize" />
                                <div class="input-group-append">
                                    <span class="input-group-text v_pend">Don't use timer for limitless links</span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-md-12 v_tshirt-view"
                            v-if="isLogoBtnActive"
                        >
                            <logo-component></logo-component>
                        </div>
                        <div
                            class="col-md-12 v_tshirt-view"
                            v-if="isTextBtnActive"
                        >
                            <text-component></text-component>
                        </div>
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
    .v_content-center {
        display: flex;
        justify-content: center;
    }
    .v_user {
        color: grey;
        font-weight: normal;
        font-size: 40px;
    }
    .v_outer {
        position: relative;
    }
    .v_left {
        position: absolute;
        left: 0px;
    }
    .v_right {
        position: absolute;
        right: 0px;
    }
    .v_active {
        width: 450px;
        height: 60px;
        font-size: 20pt;
        margin-right: 0px;
        margin-left: 0px;
        background-color: black !important;
    }
    .v_nonactive {
        width: 450px;
        height: 60px;
        font-size: 20pt;
        margin-right: 0px;
        margin-left: 0px;
        background-color: grey !important;
    }
    .v_time-prize {
        margin: 100px 0px 0px 0px;
    }
    .v_prize {
        height: 48px;
        font-size: 20px;
        color: black;
        text-align: right;
    }
    .v_pend {
        background-color: white;
        border: none;
    }
    .v_tshirt-view {
        padding: 0px;
        margin-top: 32px;
    }
</style>

<script>
    import { mdbInput, mdbBtn } from 'mdbvue';
    import {Money} from 'v-money';
    import NavComponent from '../components/NavComponent.vue';
    import LogoComponent from '../components/LogoComponent.vue';
    import TextComponent from '../components/TextComponent.vue';
    import mark from '../../assets/images/mark.png';

    export default {
        name: 'Basic',
        components: {
            mdbInput,
            mdbBtn,
            Money,
            'nav-component': NavComponent,
            'logo-component': LogoComponent,
            'text-component': TextComponent
        },
        data: function() {
            return {
                isLogoBtnActive: true,
                isTextBtnActive: false,
                mark: mark,
                price: 20.00,
                money: {
                    decimal: '.',
                    thousand: ',',
                    prefix: '',
                    suffix: '$',
                    precision: 2,
                    masked: false
                }
            }
        },
        methods: {
            clickLogo: function(event) {
                var logoBtnEl = document.getElementById('logoBtn');
                var textBtnEl = document.getElementById('textBtn');
                logoBtnEl.classList.add('v_active');
                logoBtnEl.classList.remove('v_nonactive');
                textBtnEl.classList.add('v_nonactive')
                textBtnEl.classList.remove('v_active');
                this.isLogoBtnActive = true;
                this.isTextBtnActive = false;
                console.log(this.isLogoBtnActive);
                console.log(this.isTextBtnActive);
            },
            clickText: function(event) {
                var logoBtnEl = document.getElementById('logoBtn');
                var textBtnEl = document.getElementById('textBtn');
                logoBtnEl.classList.add('v_nonactive');
                logoBtnEl.classList.remove('v_active');
                textBtnEl.classList.add('v_active')
                textBtnEl.classList.remove('v_nonactive');
                this.isLogoBtnActive = false;
                this.isTextBtnActive = true;
                console.log(this.isLogoBtnActive);
                console.log(this.isTextBtnActive);
            }
        },
        mounted() {
            console.log("This component was mounted");
        }
    }
</script>
