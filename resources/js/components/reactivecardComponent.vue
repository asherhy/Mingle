<template>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-sharp mail-card">
                <div class="card border-sharp mb-0 px-0">
                    <div class="card-header  bg-teal p-2 pl-3">
                        <h3 class="text-white text-left font-weight-bold">
                            Inbox
                        </h3>
                    </div>
                    <div class="card-body py-2">
                        <ul class="nav tabs" id="groupsTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a
                                    class="nav-link under px-0 mx-4 active"
                                    id="all-tab"
                                    data-toggle="tab"
                                    href="#all"
                                    role="tab"
                                    aria-controls="all"
                                    aria-selected="true"
                                    >All</a
                                >
                            </li>
                            <li class="nav-item" role="presentation">
                                <a
                                    class="nav-link under px-0 mx-4"
                                    id="pending-tab"
                                    data-toggle="tab"
                                    href="#pending"
                                    role="tab"
                                    aria-controls="pending"
                                    aria-selected="true"
                                    >Pending</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content mail-card-body" id="tabcontent">
                    <div
                        class="tab-pane fade show active"
                        id="all"
                        role="tabpanel"
                    >
                        <ul class="list-group">
                            <li
                                class="list-group-item border-sharp mail-item pr-0"
                                v-for="request in requests"
                                :key="request.id"
                                :class="{
                                    'bg-light': request == currentRequest
                                }"
                            >
                                <a
                                    class="card-text text-decoration-none text-dark stretched-link showRequest"
                                    data-toggle="collapse"
                                    v-bind:href="'#' + request.id"
                                    role="button"
                                    aria-expanded="false"
                                    v-on:click="setRequest(request)"
                                >
                                    <div class="row py-1 ml-1">
                                        <div class="col col-auto pl-0">
                                            <img
                                                :src="
                                                    '../storage/avatars/' +
                                                        request.author.avatar
                                                "
                                                style="width:50px; height:50px; border-radius:50%;"
                                            />
                                        </div>
                                        <div
                                            class="col col-6 col-md-5 col-lg-4 col-xl-5 my-auto pr-0 pl-0"
                                        >
                                            <h5
                                                class="card-subtitle text-dark text-left pt-2 mb-1 overflow"
                                            >
                                                {{ request.author.name }}
                                            </h5>
                                            <p class="text-dark mb-0 overflow">
                                                {{ request.title }}
                                            </p>
                                            <span
                                                class="badge"
                                                :class="{
                                                    'badge-secondary':
                                                        request.status ==
                                                        'Pending',
                                                    'badge-success':
                                                        request.status ==
                                                        'Accepted',
                                                    'badge-danger':
                                                        request.status ==
                                                        'Rejected'
                                                }"
                                            >
                                                {{ request.status }}
                                            </span>
                                            <!-- <p class="text-muted mb-0">Module: {{ request.module.code }}</p> -->
                                        </div>
                                        <div class="col col-auto pr-0">
                                            <p>
                                                {{
                                                    getDateWithoutTime(
                                                        request.created_at
                                                    )
                                                }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="pending" role="tabpanel">
                        <ul class="list-group">
                            <li
                                class="list-group-item border-sharp mail-item pr-0"
                                v-for="request in pendingRequests"
                                :key="request.id"
                                :class="{
                                    'bg-light': request == currentRequest
                                }"
                            >
                                <a
                                    class="card-text text-decoration-none text-dark stretched-link showRequest"
                                    data-toggle="collapse"
                                    v-bind:href="'#' + request.id"
                                    role="button"
                                    aria-expanded="false"
                                    v-on:click="setRequest(request)"
                                >
                                    <div class="row py-1 ml-1">
                                        <div class="col col-auto pl-0">
                                            <img
                                                :src="
                                                    '../storage/avatars/' +
                                                        request.author.avatar
                                                "
                                                style="width:50px; height:50px; border-radius:50%;"
                                            />
                                        </div>
                                        <div
                                            class="col col-6 col-md-5 col-lg-4 col-xl-5 my-auto pr-0 pl-0"
                                        >
                                            <h5
                                                class="card-subtitle text-dark text-left pt-2 mb-1 overflow"
                                            >
                                                {{ request.author.name }}
                                            </h5>
                                            <p class="text-dark mb-0 overflow">
                                                {{ request.title }}
                                            </p>
                                            <span
                                                class="badge"
                                                :class="{
                                                    'badge-secondary':
                                                        request.status ==
                                                        'Pending',
                                                    'badge-success':
                                                        request.status ==
                                                        'Accepted',
                                                    'badge-danger':
                                                        request.status ==
                                                        'Rejected'
                                                }"
                                            >
                                                {{ request.status }}
                                            </span>
                                            <!-- <p class="text-muted mb-0">Module: {{ request.module.code }}</p> -->
                                        </div>
                                        <div class="col col-auto pr-0">
                                            <p>
                                                {{
                                                    getDateWithoutTime(
                                                        request.created_at
                                                    )
                                                }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg">
            <div v-if="currentRequest">
                <div class="card mail-card border-sharp p-2 bg-lighter">
                    <div class="card-header m-2 pt-2 p-2 border-0">
                        <button
                            type="button"
                            class="close"
                            v-on:click="setRequest(nullObject)"
                        >
                            &times;
                        </button>
                        <h2 class="card-title text-dark text-left">
                            {{ currentRequest.title }}
                        </h2>
                        <hr />
                        <div class="row py-1">
                            <div class="col-auto my-auto">
                                <img
                                    :src="
                                        '../storage/avatars/' +
                                            currentRequest.author.avatar
                                    "
                                    style="width:60px; height:60px; border-radius:50%;"
                                />
                            </div>
                            <div class="col my-auto">
                                <h4 class="text-dark text-left pt-2 mb-1">
                                    Student: {{ currentRequest.author.name }}
                                </h4>
                                <p class="text-muted mb-0">
                                    {{ getDate(currentRequest.created_at) }}
                                </p>
                            </div>
                        </div>
                        <!-- I don't think need to put gender, matric year or major -->
                        <!-- <h4 class="card-subtitle text-muted text-left">
                            Gender : {{ currentRequest.author.gender }}
                        </h4>
                        <h4 class="card-subtitle text-muted text-left">
                            Matric Year :
                            {{ currentRequest.author.matric_year }}
                        </h4> -->
                        <!-- <h4 class="card-subtitle text-muted text-left">
                            {{ currentRequest.author.major }}
                        </h4> -->
                    </div>
                    <div class="card-body pt-2 mail-card-body">
                        <div class="mb-3">
                            <h5 class="d-inline">Module Code:</h5>
                            <span class="module-tag text-white px-2 py-1">{{
                                currentRequest.modules.code
                            }}</span>
                        </div>
                        <div class="card-text">
                            {{ currentRequest.detail }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row p-0">
                            <div
                                class="ml-auto mr-4 d-inline-flex"
                                v-if="currentRequest.status == 'Pending'"
                            >
                                <form
                                    method="POST"
                                    :action="currentRequest.acceptRoute"
                                >
                                    <input
                                        type="hidden"
                                        name="_token"
                                        :value="csrf"
                                    />

                                    <input
                                        type="hidden"
                                        name="_method"
                                        value="PUT"
                                    />
                                    <button
                                        class="btn btn-sm btn-success mr-1"
                                        type="submit"
                                    >
                                        Accept
                                    </button>
                                </form>
                                <form
                                    method="POST"
                                    :action="currentRequest.rejectRoute"
                                >
                                    <input
                                        type="hidden"
                                        name="_token"
                                        :value="csrf"
                                    />

                                    <input
                                        type="hidden"
                                        name="_method"
                                        value="PUT"
                                    />
                                    <button
                                        class="btn btn-sm btn-danger mr-1"
                                        type="submit"
                                    >
                                        Reject
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div v-if="requests.length">
                    <div class="card bg-lighter border-sharp mail-card">
                        <div class="card-body pt-5">
                            <h3>Select a request from the left to begin</h3>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div class="card bg-lighter border-sharp mail-card"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            currentRequest: null,
            nullObject: null
        };
    },
    props: ["requests", "csrf"],
    methods: {
        setRequest(request) {
            if (this.currentRequest == request) {
                this.currentRequest = null;
            } else {
                this.currentRequest = request;
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
        getDateWithoutTime(date) {
            const unalteredDate = new Date(date);
            var day = unalteredDate.getDate();
            day = day.toString().length == 1 ? "0" + day : day;
            var month = unalteredDate.getMonth() + 1;
            month = month.toString().length == 1 ? "0" + month : month;
            const year = unalteredDate.getFullYear();
            return day + "/" + month + "/" + year;
        }
    },
    mounted() {
        console.log("Component mounted.");
    },
    computed: {
        pendingRequests() {
            var pReqs = [];
            var i;
            for (i = 0; i < this.requests.length; i++) {
                if (this.requests[i].status == "Pending") {
                    pReqs.push(this.requests[i]);
                }
            }
            return pReqs;
        }
    }
};
</script>

<style>
div.row {
    padding-top: 150px;
}
div.card {
    border-radius: 10px;
}
div.card-header {
    border-bottom-color: #f3f2f1;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
}
div.card-body {
    font-size: 15px;
}
div.card-footer {
    background: none;
    border-top: none;
}
span.module-tag {
    background: #00b3b3;
    border-radius: 10px;
}
</style>
