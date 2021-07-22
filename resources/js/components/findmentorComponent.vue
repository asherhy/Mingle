<template>
    <div class="container">
        <div class="row row-top">
            <div class="col-12">
                <div class="card border-sharp shadow-sm">
                    <div class="card-header bg-teal">
                        <h2 class="mb-0 pl-2 text-white">Mentors</h2>
                    </div>
                    <div class="card-body py-0">
                        <div class="row py-0">
                            <div class="col-12 col-lg-4 col-xl-5 my-auto">
                                <div
                                    class="p-2 bg-light rounded rounded-pill shadow-sm my-1"
                                >
                                    <div class="input-group">
                                        <input
                                            type="search"
                                            v-model="search"
                                            placeholder="Search for a mentor"
                                            name="query"
                                            id="query"
                                            class="mentor-search-bar search-bar form-control border-0 bg-light"
                                        />
                                        <div class="input-group-append">
                                            <button
                                                id="search-btn"
                                                type="submit"
                                                class="btn btn-link"
                                            >
                                                <i
                                                    class="fa fa-search text-teal"
                                                ></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 col-lg-5 my-auto">
                                <selectmoduleComponent class="my-3" :modules="modules" pholder="Select A Module" @update-module="updateModule($event)">

                                </selectmoduleComponent>
                            </div>
                            <div class="col-4 col-lg-3 col-xl-2 my-auto">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text bg-light" for="status">Status</label>
                                    </div>
                                    <select class="custom-select" id="status" v-model="active">
                                        <option value="all" selected>All</option>
                                        <option value="active">Active</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-3">
            <div class="col-12">
                <div class="card card-body border-sharp shadow-sm sub-card bg-light">
                    <div
                        class="row row-cols-1 row-cols-lg-2 py-2"
                        v-if="filteredMentors.length"
                    >
                        <div
                            class="col"
                            v-for="(mentor, index) in filteredMentors"
                            :key="mentor.id"
                            v-show="items == 'all' || showItem(index)"
                        >
                            <div class="card border-sharp shadow-sm my-3">
                                <!-- <a
                                    class="stretched-link clickable-card"
                                    :href="post.route"
                                ></a> -->
                                <div
                                    class="card-header d-inline-flex px-0 post-card-header"
                                >
                                    <div class="col-auto">
                                        <img
                                            :src="
                                                '../../../images/avatars/' +
                                                    mentor.avatar
                                            "
                                            style="width:50px; height:50px; border-radius:50%;"
                                        />
                                    </div>
                                    <div
                                        class="col-auto my-auto post-card-title"
                                    >
                                        <h5
                                            class="mb-0 post-title pl-0 text-dark"
                                        >
                                            {{ mentor.name }}
                                        </h5>
                                        <p class="text-muted mb-0">
                                            {{ mentor.title }}
                                        </p>
                                    </div>
                                </div>
                                <div class="card-body post-card-body pb-1">
                                    <h5 class="card-title">Modules Taught:</h5>
                                    <p
                                        v-for="module in mentormodules[mentor.id-1]"
                                        v-bind:key="module.id"
                                        class="badge text-white text-left mb-2 mx-2"
                                        style="background:#00b3b3; font-size:12px;"
                                    >
                                        {{
                                            module.code
                                        }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <h3 class="text-dark text-left d-inline">
                            We've got nothing ¯\_(ツ)_/¯
                        </h3>
                        <hr />
                    </div>
                    <div class="card-footer mt-auto" v-if="filteredMentors.length">
                        <div class="float-right">
                            <div class="pagination">
                                <span
                                    class="page-item"
                                    :class="{ disabled: currentPage == 1 }"
                                >
                                    <a
                                        class="page-link"
                                        @click="currentPage = currentPage - 1"
                                        aria-label="Previous"
                                    >
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </span>
                                <span
                                    class="page-item"
                                    :class="{
                                        active: currentPage == index + 1
                                    }"
                                    v-for="(i, index) in new Array(numberPages)"
                                    :key="index"
                                >
                                    <button
                                        class="page-link page-link-teal"
                                        @click="currentPage = index + 1"
                                    >
                                        {{ index + 1 }}
                                    </button>
                                </span>
                                <span
                                    class="page-item"
                                    :class="{
                                        disabled: currentPage == numberPages
                                    }"
                                >
                                    <a
                                        class="page-link"
                                        @click="currentPage = currentPage + 1"
                                        aria-label="Next"
                                    >
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import selectmoduleComponent from "./selectmoduleComponent.vue";

export default {
    components: { selectmoduleComponent },

    data() {
        return {
            search: "",
            items: 8,
            currentPage: 1,
            active: "all",
            module: "none"
        };
    },
    props: ["mentors", "mentormodules", "modules"],
    methods: {
        checkDate(created, updated) {
            if (created == updated) {
                return true;
            } else {
                return false;
            }
        },
        getDate(date) {
            const unalteredDate = new Date(date);
            var day = unalteredDate.getDay();
            day = day.toString().length == 1 ? "0" + day : day;
            var month = unalteredDate.getMonth();
            month = month.toString().length == 1 ? "0" + month : month;
            const year = unalteredDate.getFullYear();
            var hours = unalteredDate.getHours();
            hours = hours.toString().length == 1 ? "0" + hours : hours;
            var minutes = unalteredDate.getMinutes();
            minutes = minutes.toString().length == 1 ? "0" + minutes : minutes;
            return hours + ":" + minutes + " " + day + "/" + month + "/" + year;
        },
        showItem(index) {
            if (
                index < this.currentPage * this.items &&
                index >= this.currentPage * this.items - this.items
            ) {
                if (index == this.currentPage * this.items - this.items) {
                    this.currentItem = this.mentors[index].id;
                }
                return true;
            } else {
                return false;
            }
        },
        updateModule(module) {
            this.module = module;
        },
        getMentorIndexes() {
            var mentorIndexes = [];
            var i = 0;
            for (i; i < this.mentormodules.length; i++) {
                if (this.mentormodules[i].findIndex(mentormodule => 
                    mentormodule.id == this.module) != -1) {
                    mentorIndexes.push(i);
                    continue;
                }
            }
            return mentorIndexes;
        }
    },
    computed: {
        filteredMentors() {
            var query = this.search.toUpperCase();
            if (this.module != 'none') {
                var indexes = this.getMentorIndexes();
                if (this.active == 'all') {
                    return this.mentors.filter(
                        (mentor, index) =>
                            mentor.name.toUpperCase().includes(query) &&
                            indexes.indexOf(index) != -1
                    );
                } else {
                    return this.mentors.filter(
                        (mentor, index) => 
                            mentor.status == 'active' && (
                                mentor.name.toUpperCase().includes(query) &&
                                indexes.indexOf(index) != -1
                            )
                    );
                }
            } else {
                if (this.active == 'all') {
                    return this.mentors.filter(
                        mentor => 
                            mentor.name.toUpperCase().includes(query)
                    );
                } else {
                    return this.mentors.filter(
                        mentor =>
                            mentor.status == 'active' &&
                            mentor.name.toUpperCase().includes(query)
                    );
                }
            }
        },
        numberPages() {
            let fmentors = this.filteredMentors;
            return Math.ceil(fmentors.length / this.items);
        }
    },
    watch: {
        search: function() {
            this.currentPage = 1;
        }
    }
};
</script>

<style></style>
