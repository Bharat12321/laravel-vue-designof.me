<template>
    <div>
        <nav-component></nav-component>
        <div class="container">

            <form class="needs-validation" id="needs-validation" novalidate @submit="handleSubmit">            
            
            <div class="row v_content-center">
                <div class="col-md-12 v_content-center">
                    <p class="v_user mt-5">Made by {{ username }}</p>
                </div>
                <div class="container-fluid">

                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <img :src="tshirt" width="600" height="700" style="margin-left:240px;">
                    </div>
                    <div class="col-md-4"></div>

                    <div class="row">
                        
                        <!-- <money style="display:none;" class="form-control v_prize" v-model="price" v-bind="money"></money> -->

                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <h3 style="text-align:center;">
                                {{price}}
                            </h3>
                        </div>
                        <div class="col-md-3"></div>

                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <h3 style="text-align:center;">100% Cotton Eco-friendly Handmade
                                with an eye for design
                            </h3>
                        </div>
                        <div class="col-md-3"></div>
                        
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                                                        
                            <select name="texttype"  class="font-control v_select_type text-center" @change="onChangeSize($event)" >
                                <option value="font-normal">Select Size</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="texttype"  class="font-control v_select_type text-center" @change="onChangeColor($event)">
                                <option value="font-normal">Select Color</option>
                                <option value="blue">Blue</option>
                                <option value="green">Green</option>
                                <option value="red">Red</option>
                            </select>
                        </div>
                        <div class="col-md-3"></div>

                        <div class="col-md-4"></div>
                        <div class="col-md-4" style="margin-bottom:100px;">
                            <div class="v_outer">
                                <div class="text-center v_left">
                                    <mdb-btn
                                        style="margin-left:-42px"
                                        class="v_active"
                                        id="logoBtn"
                                        v-on:click="clickBuy" >
                                        Buy
                                    </mdb-btn>
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>

            </form>
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
    .v_select_type{
        width: 220px;
        height: 40px;
        border: 1px solid #ddd;
        padding: 0px 10px;
        font-size: 22px;
        -webkit-appearance :menulist;
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
            // let product_key = this.$route.path.replace("/buy/", "")

            let product_key = this.$route.params.id;

            let uri = '../api/designofme/getproduct?id='+product_key;
            this.axios.get(uri)
            .then(response=> {
                if (response.data === 'failed') {
                    console.log("failed");
                }
                else {
                    console.log("response:- ",response.data.data.price);
                    this.price=response.data.data.price;
                    this.tshirt="../images/designs/"+response.data.data.image;
                }
            })
            .catch(function(error){
                console.log(error);
            });     
            
            return {
                username: this.$cookies.get('username'),
                tshirt:'../../assets/images/tshirt.png',
                mark: mark,
                price: "",
                color:"",
                size:"",
                time : ''
                // money: {
                //     decimal: '.',
                //     thousand: ',',
                //     prefix: '',
                //     suffix: '$',
                //     precision: 2,
                //     masked: false
                // }
            }
        },
        methods: {

            onChangeColor(event) {
                this.color = event.target.value;
            },

            onChangeSize(event) {
                this.size = event.target.value;
            },            

            clickBuy(){
                console.log("submit"); 
                let product_key = this.$route.params.id;
                let username_k = this.$route.params.username;
                this.$router.push({path: '/checkout/'+username_k+'/'+product_key+'/'+this.color+'/'+this.size});
            },

            handleSubmit(event) {
                event.preventDefault();
                event.target.classList.add('was-validated');
                var formEl = document.getElementById('needs-validation');

                console.log("USER DETAILS");
                console.log(this.user);

                // let uri = '../api/designofme/checkout';
                // this.axios.post(uri, this.user)
                // .then(response => {
                    
                //     if (response.data.status === 'success') {
                //         window.location.href = "https://sandbox-cpp.iyzipay.com/?token="+response.data.token
                //     }else{
                //         console.log("Failed");
                //     }
                // })
                // .catch(function(error){
                //     console.log(error);
                // });
            }            
        }
    }
</script>
