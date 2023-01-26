<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link} from '@inertiajs/vue3';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


const props =defineProps({
    student:Object,
    image:String
})

</script>

<template>
    <Head title="Student Details" />

    <AuthenticatedLayout>
        <template #header>
            <h4>Student Details</h4>
        </template>
              
        <div>
             <div>
                <div class="flex justify-end m-2 p-2">
                    <Link href="/student" class="btn btn-dark">Back</Link>
                </div>
                <div clas="flex">
                    <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{student.id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{student.name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Image</td>
                                            <td>
                                                <img :src="image" class="h-20 w-20 rounded-full"  alter="image"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Age</td>
                                            <td>{{student.age}}</td>
                                        </tr>   
                                            
                                        <tr>    
                                            <td>Status</td>
                                            <td v-if="student.status==1" >
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Select</span>
                                            </td>
                                            
                                            <td v-if="student.status==0">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Not Select</span>
                                            </td>
                                        </tr>
                                    </tbody>
                    </table>
                </div>
            </div>  
        </div>
        
    </AuthenticatedLayout>
</template>
