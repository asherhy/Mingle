<template>

<div class="container min-vh-100">
    <div class="row d-flex justify-content-center signup-row">
        <div class="col-10 col-md-7 col-lg-5">
            <div class="card signup border-sharp px-0 shadow-sm" id="signup-form">
                <div class="card-header signup-card-header">
                    <h3 class="text-left card-title mb-1 font-weight-bold">Create your mingle account</h3>
                </div>
                <form method="POST" class="signup pb-3" :action="form_action" ref="form">
                    <input
                        type="hidden"
                        name="_token"
                        :value="csrf"
                        @submit.prevent="validateAll"
                    />
                    <div class="card-body signup-card">
                        <p class="mb-1 text-danger" v-if="showError">
                            <small class="font-weight-bold"><i class="fas fa-exclamation"></i> Please complete this page before continuing</small>
                        </p>
                        <div v-show="currentPage == 1">
                            <div class="form-group">
                                <label for="name" class="col-form-label text-md-left font-weight-bold">Name</label>
                                <input id="name" type="text" class="form-control" @blur="v$.name.$touch" v-model="name" placeholder="Enter your full name" name="name" autocomplete="name">
                                <span v-if="v$.name.$error" class="text-danger" role="alert">
                                    <p
                                        class="mb-1"
                                        v-for="error of v$.name.$errors"
                                        :key="error.$uid"
                                    >
                                        <small class="font-weight-bold">{{ error.$message }}</small>
                                    </p>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="email" class=" col-form-label text-md-left">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" @blur="v$.email.$touch" v-model="email" placeholder="Enter your NUS email"  name="email" autocomplete="email">
                                <span v-if="v$.email.$error" class="text-danger" role="alert">
                                    <p
                                        class="mb-1"
                                        v-for="error of v$.email.$errors"
                                        :key="error.$uid"
                                    >
                                        <small class="font-weight-bold">{{ error.$message }}</small>
                                    </p>
                                </span>

                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label text-md-right">Password</label>
                                <input id="password" type="password" class="form-control" @blur="v$.pass.$touch" v-model="pass" placeholder="Password" name="password" autocomplete="new-password">
                                <span v-if="v$.pass.$error" class="text-danger" role="alert">
                                    <p
                                        class="mb-1"
                                        v-for="error of v$.pass.$errors"
                                        :key="error.$uid"
                                    >
                                        <small class="font-weight-bold">{{ error.$message }}</small>
                                    </p>
                                </span>
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" @blur="v$.pass_conf.$touch" v-model="pass_conf" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                                <span v-if="v$.pass_conf.$error" class="text-danger" role="alert">
                                    <p
                                        class="mb-1"
                                        v-for="error of v$.pass_conf.$errors"
                                        :key="error.$uid"
                                    >
                                        <small class="font-weight-bold">{{ error.$message }}</small>
                                    </p>
                                </span>
                            </div>
                        </div>
                        <div :class="{'hide': currentPage != 2}">
                            <div class="form-group">
                                <label for="telegram" class="col-form-label text-md-right">Telegram</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input type="telegram" class="form-control" @blur="v$.telegram.$touch" v-model="telegram" name='telegram' id="telegram">
                                </div>
                                <span v-if="v$.telegram.$error" class="text-danger" role="alert">
                                    <p
                                        class="mb-1"
                                        v-for="error of v$.telegram.$errors"
                                        :key="error.$uid"
                                    >
                                        <small class="font-weight-bold">{{ error.$message }}</small>
                                    </p>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-form-label text-md-right">Gender</label>
                                <div class="my-auto">
                                    <singleselect-component @update-value="updateGender($event)" :fields='genders' attri="gender" preselects=""
                                    pholder="Choose Your Gender"></singleselect-component>
                                </div>
                                <span v-if="v$.gender.$error" class="text-danger" role="alert">
                                    <p
                                        class="mb-1"
                                        v-for="error of v$.gender.$errors"
                                        :key="error.$uid"
                                    >
                                        <small class="font-weight-bold">{{ error.$message }}</small>
                                    </p>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="matric-year" class="col-form-label text-md-right">Matric Year</label>
                                <div class="my-auto">
                                    <singleselect-component @update-value="updateMYear($event)" :fields="years" attri="matric" preselects=""
                                    pholder="Choose Your Matric Year"></singleselect-component>
                                </div>
                                <span v-if="v$.matric_year.$error" class="text-danger" role="alert">
                                    <p
                                        class="mb-1"
                                        v-for="error of v$.matric_year.$errors"
                                        :key="error.$uid"
                                    >
                                        <small class="font-weight-bold">{{ error.$message }}</small>
                                    </p>
                                </span>
                            </div>
                        </div>
                        <div :class="{'hide': currentPage != 3}">
                            <div class="form-group">
                                <label for="major" class="col-form-label text-md-right">Major</label>
                                <div class=" my-auto">
                                    <multiselect-component @update-values="updateMajors($event)" :fields="majors" attri="majors[]" :preselects="[]"
                                        pholder="Select Your Major(s)"></multiselect-component>
                                </div>
                                <span v-if="v$.major.$error" class="text-danger" role="alert">
                                    <p
                                        class="mb-1"
                                        v-for="error of v$.major.$errors"
                                        :key="error.$uid"
                                    >
                                        <small class="font-weight-bold">{{ error.$message }}</small>
                                    </p>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="modules" class="col-form-label text-md-right">Modules</label>
                                <div class="my-auto">
                                    <multiselect-component @update-values="updateModules($event)" :fields="modules" attri="modules[]" :preselects="[]"
                                        pholder="Select Your Modules"></multiselect-component>
                                </div>
                                <span v-if="v$.module.$error" class="text-danger" role="alert">
                                    <p
                                        class="mb-1"
                                        v-for="error of v$.module.$errors"
                                        :key="error.$uid"
                                    >
                                        <small class="font-weight-bold">{{ error.$message }}</small>
                                    </p>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer mt-3 pb-0">
                        <div class="row py-0">
                            <a
                                class="original-btn welcome-btn welcome-btn-1 mr-auto"
                                v-if="currentPage != 1"
                                @click="previousPage()"
                                style="text-decoration:none; margin-left:10px;"
                            >
                                Previous
                            </a>
                            <a
                                class="original-btn welcome-btn welcome-btn-1 ml-auto"
                                v-if="currentPage != 3"
                                @click="nextPage()"
                                style="text-decoration:none;"
                            >
                                Next
                            </a>
                            <a
                                class="original-btn welcome-btn welcome-btn-2 ml-auto"
                                v-if="currentPage == 3"
                                @click="validateAll()"
                                style="text-decoration:none;"
                            >
                                Signup
                            </a>
                        </div>
                        <a data-toggle="tooltip" data-placement="right" title="Please email us at OrbitalMingle@gmail.com for an account!"><small class="text-teal font-weight-bold">Register as mentor?</small></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</template>

<script>

import useVuelidate from '@vuelidate/core'
import { required, helpers, minLength, sameAs } from '@vuelidate/validators'

export default {
    setup() {
        return { v$: useVuelidate() }
    },
    data() {
        return {
            currentPage: 1,
            showError: false,
            years: [2018, 2019, 2020, 2021, 2022],
            genders: ['Female', 'Male', 'Other'],
            name: '',
            email: '',
            pass: '',
            pass_conf: '',
            telegram: '',
            gender: '',
            matric_year: '',
            major: [],
            module: []
        };
    },
    props: ["form_action", "csrf", "emails", "majors", "modules"],
    methods: {
        nextPage() {
            if (this.validated) {
                this.showError = false;
                this.currentPage += 1;
            } else {
                this.showError = true;
            }
        },
        previousPage() {
            this.showError = false;
            this.currentPage -= 1;
        },
        isNusEmail(email) {
            var address = email.substring(email.length - 10);
            return address == '@u.nus.edu';
        },
        isEmailUsed(email) {
            var i;
            for (i = 0; i < this.emails.length; i++) {
                if (email == this.emails[i]) {
                    return false;
                }
            }
            return true;
        },
        updateGender(gender) {
            this.gender = gender;
            this.v$.gender.$touch();
        },
        updateMYear(year) {
            this.matric_year = year;
            this.v$.matric_year.$touch();
        },
        updateMajors(majors) {
            this.major = majors;
            this.v$.major.$touch();
        },
        updateModules(modules) {
            this.module = modules;
            this.v$.module.$touch();
        },
        pageOneValidation() {
            if (
                this.v$.name.$dirty == false ||
                this.v$.email.$dirty == false ||
                this.v$.pass.$dirty == false ||
                this.v$.pass_conf.$dirty == false
            ) {
                return true;
            }
            return this.v$.name.$error || this.v$.email.$error || this.v$.pass.$error || this.v$.pass_conf.$error;
        },
        pageTwoValidation() {
            if (
                this.v$.telegram.$dirty == false ||
                this.v$.gender.$dirty == false ||
                this.v$.matric_year.$dirty == false
            ) {
                return true;
            }
            return this.v$.name.$error || this.v$.gender.$error || this.v$.matric_year.$error
        },
        pageThreeValidation() {
            if (
                this.v$.major.$dirty == false ||
                this.v$.module.$dirty == false
            ) {
                return true;
            }
            return this.v$.major.$error || this.v$.module.$error
        },
        validateAll() {
            if (this.pageThreeValidation()) {
                this.showError = true;
            } else {
                this.$refs.form.submit();
            }

        }
    },
    validations() {
        return {
            name: { 
                required: helpers.withMessage('The name field is required.', required)
            },
            email: { 
                required: helpers.withMessage('The email field is required.', required), 
                nusEmail: helpers.withMessage('Please use your nus email.', this.isNusEmail),
                emailUsed: helpers.withMessage('Email is already registered.', this.isEmailUsed)
            },
            pass: { 
                required: helpers.withMessage('Please enter a password.', required),
                minLengthValue: minLength(8)
            },
            pass_conf: { 
                required: helpers.withMessage('Please confirm your password.', required),
                sameAsPassword: helpers.withMessage('Please make sure your passwords match.', sameAs(this.pass))
            },
            telegram: {
                required: helpers.withMessage('The telegram field is required.', required)
            },
            gender: {
                required: helpers.withMessage('Please indicate your gender.', required)
            },
            matric_year: {
                required: helpers.withMessage('Please indicate your matriculation year.', required)
            },
            major: {
                required: helpers.withMessage('Please indicate your major(s).', required)
            },
            module: {
                required: helpers.withMessage('Please select your modules.', required)
            }
        }

    },
    computed: {
        validated() {
            if (this.currentPage == 1) {
                return !this.pageOneValidation();
            } else if (this.currentPage == 2) {
                return !this.pageTwoValidation();
            }
        }
    }
}

</script>