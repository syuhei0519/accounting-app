<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                <span class="navbar-brand mb-0 h1">Vue Laravel SPA</span>
                <div>
                    <router-link v-bind:to="{name: 'task.list'}">
                        <button class="btn btn-success">List</button>
                    </router-link>
                    <button class="btn btn-success">ADD</button>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {}
</script>
