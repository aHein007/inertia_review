<template>
  <div class="container">


<h1 class="fs-1 mt-5 text-center">Edit Page</h1>

<div class="text-center cursor-pointer" style="margin-right: 300px;">
   <Link href="/index"> <i class="fa-solid fa-arrow-left-long"></i></Link>
</div>

<form action="" method="post" @submit.prevent="submit(user_data.id)" class="w-25 m-auto mt-3">
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Name</label>
        <input type="text" class="form-control rounded" v-model="form.name" id="formGroupExampleInput" placeholder=" " >
        <small v-if="errors.name" class="text-danger">{{ errors.name }}</small>
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Email</label>
        <input type="email" class="form-control rounded" v-model="form.email" id="formGroupExampleInput2" placeholder="">
        <small v-if="errors.email" class="text-danger">{{ errors.email }}</small>
    </div>

    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Phone</label>
        <input type="text" class="form-control rounded" v-model="form.phone" id="formGroupExampleInput2" placeholder="">
        <small v-if="errors.phone" class="text-danger">{{ errors.phone }}</small>
    </div>

    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Password</label>
        <input type="text" class="form-control rounded" v-model="form.password" id="formGroupExampleInput2" placeholder="">
        <small v-if="errors.password" class="text-danger">{{ errors.password }}</small>
    </div>

    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Address</label>
        <input type="text" class="form-control rounded" v-model="form.address" id="formGroupExampleInput2" placeholder="">
        <small v-if="errors.address" class="text-danger">{{ errors.address }}</small>
    </div>

    <input type="submit" class="btn btn-info float-end" value="Save">

</form>


</div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {

    props:{
      user_data:Object,
      errors:Object
},

    data(){
        return {
           form:{
            name:this.user_data.name,
            email:this.user_data.email,
            phone:this.user_data.phone,
            password:"",
            address:this.user_data.address
           }
        }
    },

    methods:{
        submit(id){
            this.$inertia.put(`/edit/${id}`,this.form)
        }
    },

    components:{
        Link,
    }
}
</script>

<style>

</style>
