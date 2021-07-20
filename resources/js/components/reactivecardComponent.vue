<template>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-5">
            <ul class="list-group">
                <li class="list-group-item border-0 pt-0" v-for="request in requests" :key="request.id">
                    <div class="card">
                        <div class="card-header text-left m-2 p-1">
                            <h5>{{request.author}}</h5>
                        </div>
                        <div class="card-body p-1 ml-2 mb-2">
                            <a class="card-text text-decoration-none text-dark stretched-link" 
                                data-toggle="collapse" v-bind:href="'#' + request.id" role="button" 
                                aria-expanded="false" v-on:click="setRequest(request)">
                                    {{request.title}}
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-6 col-lg-7">
            <div v-if="currentRequest">
                <div class="card mail-card">
                    <div class="card-header m-2 pt-2 p-2">
                        <button type="button" class="close" v-on:click="setRequest(nullObject)">
                            &times;
                        </button>  
                        <h2 class="card-title text-dark text-left">{{currentRequest.title}}</h2>
                        <h4 class="card-subtitle text-muted text-left">{{currentRequest.author}}</h4>
                    </div>
                    <div class="card-body pt-2">
                        <div class="mb-2"><span class="module-tag text-white px-2 py-1">{{currentRequest.module}}</span></div>
                        <div class="card-text">{{currentRequest.description}}</div>
                    </div>
                    <div class="card-footer">
                        <div class="row p-0">
                            <div class="ml-auto mr-4">
                                <button class="btn btn-sm btn-success mr-1" type="submit">Accept</button>
                                <button class="btn btn-sm btn-danger mr-1" type="submit">Reject</button>
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
        data () {
            return {
                currentRequest: null,
                nullObject: null
            }
        },
        props: [
            'requests'
        ],
        methods: {
            setRequest(request) {
                if (this.currentRequest == request) {
                    this.currentRequest = null;
                } else {
                    this.currentRequest = request;
                }
            }
        },
        mounted() {
            console.log("Component mounted.");
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
