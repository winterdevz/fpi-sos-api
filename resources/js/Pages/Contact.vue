<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contacts
            </h2>
        </template>

        <div class="py-12">
           
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                       <form class="w-full max-w-lg"  >
                            <div class="flex flex-wrap">
                                
                                <div class="w-full md:w-1/2 px-2 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                    Contact Name 
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Security" v-model="name">
                                </div>
                                
                                <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                    Contact Phone
                                    </label> 
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="2348128282929" v-model="phone">
                                </div>

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                    Visible Status
                                </label>
                                <div class="relative">
                                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" v-model="status">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option> 
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>

                            <button v-show="isEdit" v-on:click.prevent="saveContact()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2">Save</button>
                            <button v-show="!isEdit" v-on:click.prevent="updateContact()"   class="mr-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2">Update</button>
                            <button v-show="!isEdit" v-on:click.prevent="newContact()">Add New Contact</button>
                            </div>
 
 
                           
                            </div>
    
                        
                        </form>
                    </div>
                </div>
            </div>
              
  <table class="min-w-full">
          <thead class="border-b">
    <tr>
    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">#</th>
    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Name</th>
    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Contact</th>
    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Edit</th>
    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Delete</th>
    </tr>
    </thead>
     
    <tr v-for="(contact, index) in contacts" :key="contact.id">
        <td scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">{{index +1}}</td>
        <td scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">{{contact.name}}</td>
        <td scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">{{contact.contact}}</td>
        <td scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
        <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" v-on:click="editContact(contact)">Edit</button></td>
        
        <td scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left" ><button class="inline-block px-6 py-2.5 bg-orange-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-orange-700 hover:shadow-lg focus:bg-orange-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-orange-800 active:shadow-lg transition duration-150 ease-in-out"  v-on:click="deleteContact(contact.id)">Delete</button></td>
    </tr>
 
    </table>

        </div>
    </BreezeAuthenticatedLayout>
  
</template>

<script>
// import axios from axios
 export default {
    data(){
        return { 
            name: "Habeeb",
            phone: "",
            status: "",
            contacts:  [],
            isEdit: true,
            contactId: null
        }
    },
    methods: {
        getData: async function(){
           const a = await axios.get('/api/contacts')
           this.contacts = a.data.data 
        },

        saveContact: async function(){
            let detail = {
                name: this.name,
                contact: this.phone,
                isActive: this.status
            }
         
            axios.post('/api/contact', detail)
            this.getData();
        },

        editContact: function (contact){ 
            this.name = contact.name
            this.phone = contact.contact
            this.status = contact.isActive
            this.isEdit = false
            this.contactId = contact.id
            
        },
        deleteContact: function (id){
            axios.delete(`/api/contact/${id}/delete`)
              this.getData();
        },
        newContact:function(){
             this.name = null
            this.phone = null
            this.status = null
            this.isEdit = true
            this.contactId = null
        },
        updateContact: function(contact){
            let detail = {
                name: this.name,
                contact: this.phone,
                isActive: this.status
            }
         
            axios.patch(`/api/contact/update/${this.contactId}`, detail)
            this.getData();
        }
    },
    mounted(){ 
       this.getData();
    }
 }

</script>