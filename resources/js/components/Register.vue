<template>
   <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form  v-on:submit.prevent="Register()">
                            <div class="col-8">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" v-model="regis.email"  type="email" name="email">
                                    <div v-if="errors.email">{{errors.email[0]}}</div>
                                </div>
                              
                            </div>
                            
                      <div class="col-8">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" v-model="regis.pass"  type="text" name="pass">
                                    <div v-if="errors.pass">{{errors.pass[0]}}</div>
                                </div>
                               
                            </div>
                           
                       <div class="col-8">
                                <div class="input-group">
                                    <label class="label">Confirm Password</label>
                                    <input class="input--style-4" v-model="regis.cofirm"  type="text" name="cofirm">
                                    <div v-if="errors.cofirm">{{errors.cofirm[0]}}</div>
                                </div>
                               
                            </div>
                           <div class="col-8">
                                <div class="input-group">
                                    <label class="label">Name</label>
                                    <input class="input--style-4" v-model="regis.name"  type="text" name="name">
                                    <div v-if="errors.name">{{errors.name[0]}}</div>
                                </div>
                            </div>   
                             <div class="row row-space">              
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="register"> Submit</button>
                        </div>
                         <div class="p-t-15">
                    <a>
                    <button class="btn btn--radius-2 btn--blue" type="button" > Login</button>
                    </a>
                    </div>
                             </div>

                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Register",
  data: function () {
    return {
	  regis:{
		email:'',
		pass:'',
		cofirm:'',
		name:''
		},
		 errors:{
           
         },
		 display:''
    };
  }, 
  components: {
    
  },
  methods:{
  
	Register(){
		axios.post('http://127.0.0.1:8000/api/register',this.regis)
			.then(response => {
			
                      this.display="Register successful"
                        // localStorage.setItem('lang',this.user.email);
                          window.location.reload();
                 
				  
		})
                .catch(error => {
                    this.errors = error.response.data.errors;
                    console.log(this.errors)
                   // console.log(error.response.data)
                })
	},
	
	
  }
};

</script>

<style>

</style>