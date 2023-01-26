<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link,useForm} from '@inertiajs/vue3';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import {Inertia} from '@inertiajs/inertia';


const props =defineProps({
    student:Object,
    image:String
})
const form = useForm({
    name:props.student.name,
    image:null,
    age:props.student.age,
    status:props.student.status,
})
function updateStudent(){
    Inertia.post(`/student/${props.student.id}`, {
  _method: 'put',
  name: form.name,
  image:form.image,
  age:form.age,
  status:form.status
})
}
</script>

<template>
    <Head title="Student" />

    <AuthenticatedLayout>
        <template #header>
            <h3>Student Edit</h3>
        </template>
              
        <div>
             <div>
                <div class="flex justify-end m-2 p-2">
                    <Link href="/student" class="btn btn-link">Back</Link>
                </div>
                <div clas="flex">
                    <form @submit.prevent="updateStudent">
                        <div class="sm:col-span-6">
                            <label for="title" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" id="name"  name="name" v-model="form.name" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="title" class="block text-sm font-medium text-gray-700">Age</label>
                            <div class="mt-1">
                                <input type="text" id="age" name="age" v-model="form.age" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition-150 ease-in-out sm:text-sm sm:leading-5">
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="title" class="block text-sm font-medium text-gray-700">Image</label>
                            <div class="m-2 p-2">
                                <img :src="image" class="w-32 h-32"/>
                            </div>
                            <div class="mt-1">
                                <input type="file" id="image" name="image" @input="form.image=$event.target.files[0]">
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="title" class="block text-sm font-medium text-gray-700">Status</label>
                            <div class="mt-1">
                                <input type="radio" id="select" value="1" class="" name="status" v-model="form.status">
                                <label for="one" class="m-4">Select</label>

                                <input type="radio" id="notselect" value="0" class="" name="status" v-model="form.status">
                                <label for="one" class="m-4">Not Select</label>
                            </div>
                        </div>
                        <div class="m-2 p-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
        
    </AuthenticatedLayout>
</template>

