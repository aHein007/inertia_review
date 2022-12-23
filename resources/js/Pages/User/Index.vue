<template>
  <h1 class=" fs-1 p-5">User</h1>
    <div class="container">
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
            <button class="btn btn-success mr-2">Edit</button>
            <button class="btn btn-danger">Delete</button>
        </div>
      </td>
    </tr>



  </tbody>
</table>
    </div>

</template>

<script>
export default {
props:{
    user_data:Array
}
}
</script>

<style>

</style>
