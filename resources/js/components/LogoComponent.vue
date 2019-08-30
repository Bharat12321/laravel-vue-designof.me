<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 v_product" id="preview_tshirt">
                <span>
                    <div class="v_content-center v_tshirt">
                        <img :src="tshirt">
                    </div>
                    <div class="v_logo">
                        <img :src="logo">
                    </div>
                </span>
            </div>
            <div class="col-md-12 v_content-center">
                <p class="v_user mt-1">Your design ready to share</p>
            </div>
            <div class="col-md-4 v_action v_share v_content-center">
                <a @click.prevent="share">Share Link</a>
            </div>
            <div class="col-md-4 v_action v_download v_content-center">
                <a @click.prevent="download">Download Picture</a>
            </div>
            <div class="col-md-4 v_action v_another v_content-center">
                <a @click.prevent="make">Make Another</a>
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
    .v_action {
        color: black;
        font-size: 20px;
        margin-top: -30px;
    }
</style>

<script>
    import html2canvas from 'html2canvas';
    import tshirt from '../../assets/images/tshirt.png';
    import logo from '../../assets/images/logo.png';
    export default {
        data: function() {
            return {
                tshirt: tshirt,
                logo: logo
            }
        },
        methods: {
            share() {
                console.log("share");
            },
            download() {
                console.log("download");
            },
            make() {
                console.log("make");
            },
            convert() {
                html2canvas(document.getElementById('preview_tshirt')).then(function(canvas) {
                    document.body.appendChild(canvas);
                });
            }
        }
    }
</script>
