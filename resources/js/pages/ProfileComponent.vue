<template>
    <div>
        <nav-component></nav-component>
        <div class="container">
            <div class="row v_content-center">
                <div class="col-md-12 v_content-center">
                    <p class="v_username mt-5">username</p>
                </div>
                <div
                    v-for="card in cards"
                    :key="card.id"
                    class="col-md-4 mb-5"
                >
                    <card-component :amount="card.amount" :text="card.text"></card-component>
                </div>
                <div class="col-md-6 v_content-center">
                    <div class="text-center mt-5">
                        <mdb-btn
                            style=" width: 500px;
                                    heigt: 70px;
                                    font-size: 18pt;
                                    background-color: black !important;"
                        >
                            Withdraw Money
                        </mdb-btn>
                    </div>
                </div>
                <div class="col-md-6 v_content-center">
                    <div class="text-center mt-5">
                        <mdb-btn
                            style=" width: 500px;
                                    heigt: 70px;
                                    font-size: 18pt;
                                    background-color: black !important;"
                        >
                            Add an Apparel
                        </mdb-btn>
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="v_activelink mt-5">Active Links</p>
                    <p class="v_link mt-1">designof.me/nightlife_inspector_01   /   12:00:00</p>
                    <p class="v_link mt-1">designof.me/nightlife_inspector_01   /   12:00:00</p>
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
    .v_username {
        color: grey;
        font-weight: normal;
        font-size: 40px;
    }
    .v_activelink {
        font-weight: bold;
        font-size: 30px;
        color: grey;
    }
    .v_link {
        font-weight: normal;
        font-size: 30px;
        color: grey;
    }
</style>

<script>
    import { mdbInput, mdbBtn } from 'mdbvue';
    import NavComponent from '../components/NavComponent.vue';
    import CardComponent from '../components/CardComponent.vue';

    export default {
        name: 'Basic',
        components: {
            mdbInput,
            mdbBtn,
            'nav-component': NavComponent,
            'card-component': CardComponent
        },
        data: function() {
            return {
                cards: [
                    {
                        id: 0,
                        amount: 134,
                        text: 'Sales'
                    },
                    {
                        id: 1,
                        amount: 1120 + ' $',
                        text: 'Earning'
                    },
                    {
                        id: 2,
                        amount: 10 + '.' + 350,
                        text: 'View'
                    }
                ]
            }
        }
    }
</script>
