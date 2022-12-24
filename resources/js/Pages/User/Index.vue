<template>

    <div class="container mt-5">
        <h1 class=" fs-1 ">User</h1>

    <div class="mt-5 mb-5" v-if="$page.props.flash.successMessage">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $page.props.flash.successMessage }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
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
  <tbody v-for="user in user_data" :key="user.id">
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
            <button class="btn btn-danger">Delete</button>
        </div>
      </td>
    </tr>



  </tbody>

  <Link :href="route('user#createPage')"  class="btn btn-primary mt-3">Create</Link>
</table>
    </div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    props: {
        user_data: Array
    },
    components: { Link }
}
</script>

<style>

</style>
