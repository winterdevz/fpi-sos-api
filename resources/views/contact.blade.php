 

 <x-app-layout>
     <div class="row" id="app">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Contact</h5>
                <p class="card-category">Add Security Agent Contact</p>
              </div>
              <div class="card-body " >
                        <form class="w-full max-w-lg"  >
                            <div class="row">
                                
                                <div class="form-group col-12">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                    Contact Name 
                                    </label>
                                    <input class="form-control" type="text" placeholder="Security" v-model="name">
                                </div>
                                
                                <div class="form-group col-12">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                    Contact Phone
                                    </label> 
                                    <input class="form-control" id="grid-last-name" type="text" placeholder="2348128282929" v-model="phone">
                                </div>

                            <div class="form-group col-12">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                    Visible Status
                                </label>
                                <div class="relative">
                                <select class="form-control" id="grid-state" v-model="status">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option> 
                                </select>
                                 
                            </div>

                            <button v-show="isEdit" v-on:click.prevent="saveContact()" class="btn btn-success">Save</button>
                            <button v-show="!isEdit" v-on:click.prevent="updateContact()"   class="btn btn-warning">Update</button>
                            <button v-show="!isEdit" class="btn" v-on:click.prevent="newContact()">Add New Contact</button>
                            </div>
 
 
                           
                            </div>
    
                        
                        </form>
              </div>
              
            </div>
          </div>
          <div class="card col-12">
            <div class="card-body">
          <table class="table">
          <thead class="border-b">
    <tr>
    <th scope="col" class="">#</th>
    <th scope="col" class="">Name</th>
    <th scope="col" class="">Contact</th>
    <th scope="col" class="">Edit</th>
    <th scope="col" class="">Delete</th>
    </tr>
    </thead>
     
    <tr v-for="(contact, index) in contacts" :key="contact.id">
       
        <td scope="col" class="">@{{index +1}}</td>
        <td scope="col" class="">@{{contact.name}}</td>
        <td scope="col" class="">@{{contact.contact}}</td>
        <td scope="col" class="">
        <button type="button" class="btn btn-success" v-on:click="editContact(contact)">Edit</button></td>
        
        <td scope="col" class="" ><button class="btn btn-warning"  v-on:click="deleteContact(contact.id)">Delete</button></td>
    </tr>
 
    </table>
        </div>
        </div>
        </div>
</x-app-layout>

<script>
// import axios from axios
const { createApp } = Vue

//   createApp({
//     data() {
//       return {
//         message: 'Hello Vue!'
//       }
//     }
//   }).mount('#app')
  createApp({
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
 }).mount('#app')

</script>