<template>
    <div>
        <nav-component></nav-component>
        <div class="row v_content-center">
            <div class="col-md-3 v_login-form">
                 <form class="needs-validation" id="needs-validation" novalidate @submit="handleSubmit">
                    <p class="h1 text-center mb-4">Login</p>
                    <div class="grey-text">
                        <label for="validationCustomEmail">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrependEmail">
                                    <i class="fas prefix fa-envelope"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="validationCustomEmail" aria-describedby="inputGroupPrependEmail" required>
                            <div class="invalid-feedback">
                                Please input your email.
                            </div>
                        </div>
                        <label for="validationCustomPass">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrependPass">
                                    <i class="fas prefix fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" id="validationCustomPass" aria-describedby="inputGroupPrependPass" required>
                            <div class="invalid-feedback">
                                Please input your password.
                            </div>
                        </div>
                    </div>
                    <div class="v_content-center">
                        <mdb-btn
                            type = "submit"
                            style=" width: 500px;
                                    heigt: 60px;
                                    margin: 30px 0px 0px 0px;
                                    font-size: 20pt;
                                    background-color: black !important;"
                        >
                            Login
                        </mdb-btn>
                    </div>
                    <div class="text-center mt-4">
                        <a href="" class="h2 grey-text font-weight-normal">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<style scoped>
    .v_content-center {
        display: flex;
        justify-content: center;
    }
    .v_login-form {
        margin-top: 100px;
    }
    .grey-text>label {
        margin-top: 30px;
    }
    .input-group>input {
        height: 60px;
        font-size: 18px;
        font-weight: lighter;
    }
</style>

<script>
    import { mdbInput, mdbBtn } from 'mdbvue';
    import NavComponent from '../components/NavComponent.vue';

    export default {
        name: 'Basic',
        components: {
            mdbInput,
            mdbBtn,
            'nav-component': NavComponent
        },
        methods: {
            handleSubmit(event) {
                event.preventDefault();
                event.target.classList.add('was-validated');
                var formEl = document.getElementById('needs-validation');
                var emailEl = document.getElementById('validationCustomEmail');
                var passEl = document.getElementById('validationCustomPass');
                if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailEl.value)) {
                    emailEl.value = '';
                }
                if (!passEl.value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/)) {
                    passEl.value = '';
                }
                var isValid = formEl.checkValidity();
                console.log(formEl.checkValidity());
            }
        }

    }
</script>
