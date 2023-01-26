<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link} from '@inertiajs/vue3';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

const props =defineProps({
    students:Array,
   }) 
</script>

<template>
    <Head title="Student List" />

<AuthenticatedLayout>
    <template #header>
        <h3>Student List</h3>
    </template>
          
    <div>
         <div class="max-w-7xl mx-auto sm:mx-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <Link href="/student/create" class="btn btn-success">Add Student</Link>
            </div>
            <div clas="flex flex-col">
                <div>
                    <div>
                        <div>
                            <table class="table table-success table-striped">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th >Id</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="student in students" :key="student.id">
                                        <td>{{student.id}}</td>
                                        <td>
                                            <div class="flex item-center">
                                                <div class="flex-shrink-0 h-20 w-20">
                                                    <img :src="student.image" class="h-20 w-20 rounded-full"  alter=""/>
                                                </div>

                                            </div>
                                        </td>
                                        <td> {{student.name}} </td>
                                        <td>{{student.age}}</td>
                                        
                                        <td v-if="student.status==1">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Select</span>
                                        </td>
                                        
                                        <td v-if="student.status==0">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Not Select</span>
                                        </td>
                                        <td>
                                            <Link :href="`/student/${student.id}/view`" class="btn btn-primary">View</Link>
                                            <Link :href="`/student/${student.id}/edit`" class="btn btn-warning">Update</Link>
                                            <Link :href="`/student/${student.id}`" method="delete" as="button" type="button" class="btn btn-danger">Delete</Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>

    
     
       
	
	



    </AuthenticatedLayout>
</template>
