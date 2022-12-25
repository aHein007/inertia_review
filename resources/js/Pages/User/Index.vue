<template>

    <div class="container mt-5">
        <h1 class=" fs-1 ">User</h1>



    <div class="mt-5 mb-5" v-if="$page.props.flash.successMessage">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $page.props.flash.successMessage }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <div class="mt-5 mb-5" >
        <div class="alert alert-danger alert-dismissible fade show" v-if="$page.props.flash.deleteMessage" role="alert">
            <strong>{{ $page.props.flash.deleteMessage }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <div class="mt-5 mb-5" >
        <div class="alert alert-success alert-dismissible fade show" v-if="$page.props.flash.updateMessage" role="alert">
            <strong>{{ $page.props.flash.updateMessage }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>


    <div class="input-group mb-3 w-25 float-end">
            <input type="text" class="form-control rounded-l" placeholder="" v-model="searchData" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2" @click="search">Search</button>
        </div>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col" class="text-info">
        You can Edit your data
      </th>
    </tr>
  </thead>
  <tbody v-for="user in user_data.data" :key="user.id">
    <tr>
      <th scope="row">{{ user.id }}</th>
      <td>{{ user.name }}</td>
      <td>{{ user.email }}</td>
      <td>{{ user.phone }}</td>
      <td>{{ user.address }}</td>
      <td>
        <div class="button-container">
            <button class="btn btn-success mr-2">
                <Link :href="route('user#editPage',user.id)">Edit</Link>
                <!-- this is so important -->
            </button>
            <button class="btn btn-danger" @click="deleteId(user.id)">
                Delete
            </button>
        </div>
      </td>
    </tr>



  </tbody>

  <Link :href="route('user#createPage')"  class="btn btn-primary mt-3">Create</Link>


</table>
<nav aria-label="Page navigation example" class="float-end" v-for="(link,index) in user_data.links" :key="index.id">
  <ul class="pagination m-2">
    <li class="page-item" ><a class="page-link" :href="link.url" :class="{'bg-primary':link.active ==true,'text-white':link.active,'disabled':link.url ==null}" v-html="link.label"></a></li>
<!-- this is pagination code -->
</ul>
</nav>


    </div>



</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    props: {
        user_data: Object
    },
    components: { Link },


    data(){
        return {
            searchData:""
        }
    },


    methods:{
        deleteId(id){
            this.$inertia.delete(`/delete/${id}`)
        },


        search(){

        }
    }
}
</script>

<style>

</style>
