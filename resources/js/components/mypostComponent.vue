<template>
    <div class="container">
        <div class="row row-top">
            <div class="col-12">
                <div class="card border-sharp shadow-sm">
                    <div class="card-header bg-teal">
                        <h2 class="mb-0 pl-2 text-white">My Posts</h2>
                    </div>
                    <div class="card-body py-2">
                        <div class="row py-1">
                            <div class="col-9 col-lg-10">
                                <div
                                    class="p-2 bg-light rounded rounded-pill shadow-sm"
                                >
                                    <div class="input-group">
                                        <input
                                            type="search"
                                            v-model="search"
                                            placeholder="Search for a post"
                                            name="query"
                                            id="query"
                                            class="search-bar form-control border-0 bg-light"
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
                            <div class="col-3 col-lg-2 my-auto">
                                <div class="float-right">
                                    <slot name="post-btn"></slot>
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
                    <div v-if="!posts.length">
                        <h3 class="text-dark text-left d-inline">You haven't got any posts yet. Create one by clicking on the teal "New Post" button! &#128515;</h3>
                    </div>
                    <div
                        class="row row-cols-1 row-cols-lg-2 py-2"
                        v-else-if="filteredPosts.length"
                    >
                        <div
                            class="col"
                            v-for="(post, index) in filteredPosts"
                            :key="post.id"
                            v-show="items == 'all' || showItem(index)"
                        >
                            <div class="card border-sharp shadow-sm my-3">
                                <a
                                    class="stretched-link clickable-card"
                                    :href="post.route"
                                ></a>
                                <div
                                    class="card-header d-inline-flex px-0 post-card-header"
                                >
                                    <div class="col-auto">
                                        <img
                                            :src="
                                                '../../../images/avatars/' +
                                                    user.avatar
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
                                            {{ post.title }}
                                        </h5>
                                        <p class="text-muted mb-0">
                                            Posted by: {{ user.name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="card-body post-card-body pb-1">
                                    <p
                                        class="badge text-white text-left mb-2"
                                        style="background:#00b3b3; font-size:12px;"
                                    >
                                        {{
                                            modules.find(
                                                module =>
                                                    module.id == post.module_id
                                            ).code
                                        }}
                                    </p>
                                    <p class="card-text">{{ post.detail }}</p>
                                </div>
                                <div class="card-footer border-0">
                                    <p
                                        class="text-muted card-subtitle text-left"
                                        v-if="
                                            checkDate(
                                                post.created_at,
                                                post.updated_at
                                            )
                                        "
                                    >
                                        Posted on {{ getDate(post.created_at) }}
                                    </p>
                                    <p
                                        class="text-muted card-subtitle text-left"
                                        v-else
                                    >
                                        Edited on {{ getDate(post.updated_at) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <h3 class="text-dark text-left d-inline">
                            We've got nothing for
                        </h3>
                        <h3 class="text-dark text-left d-inline font-italic">
                            {{ '"' + this.search + '"' }}
                        </h3>
                        <h3 class="text-dark text-left d-inline">¯\_(ツ)_/¯</h3>
                        <hr />
                    </div>
                    <div class="card-footer mt-auto" v-if="filteredPosts.length">
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
export default {
    data() {
        return {
            search: "",
            items: 4,
            currentPage: 1
        };
    },
    props: ["posts", "user", "modules"],
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
            var day = unalteredDate.getDate();
            day = day.toString().length == 1 ? "0" + day : day;
            var month = unalteredDate.getMonth() + 1;
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
                    this.currentItem = this.posts[index].id;
                }
                return true;
            } else {
                return false;
            }
        }
    },
    computed: {
        filteredPosts() {
            var query = this.search.toUpperCase();
            return this.posts.filter(
                post =>
                    post.detail.toUpperCase().includes(query) ||
                    post.title.toUpperCase().includes(query) ||
                    this.modules
                        .filter(module =>
                            module.code_title.toUpperCase().includes(query)
                        )
                        .map(module => module.id)
                        .indexOf(post.module_id) > -1
            );
        },
        numberPages() {
            let fposts = this.filteredPosts;
            return Math.ceil(fposts.length / this.items);
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
