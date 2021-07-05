<template>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Edit <b>Post</b></h2>
					</div>	
				</div>
			</div>
			<form  v-on:submit.prevent="editPost()">
				<div class="modal-body" >
				<div class="form-group">
						<label>ID</label>
						<input type="text" class="form-control" name="id" v-model="posts.id" disabled >
					</div>	
							
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" name="title" v-model="posts.title" >
						<div class="alert ">
							<div v-if="errors.title">{{errors.title[0]}}</div>
    					</div>
					</div>

					<div class="form-group">
						<label>Short_des</label>
						<input type="text" class="form-control" name="short" v-model="posts.short_des" >
							<div class="alert ">
								<div v-if="errors.short_des">{{errors.short_des[0]}}</div>
    					    </div>
					</div>
					
				
					<div class="form-group">
						<label>Description</label>
                        <textarea class="form-control" name="description" row="3" v-model="posts.description"   ></textarea>  
						<div class="alert ">
								<div v-if="errors.description">{{errors.description[0]}}</div>
    					</div>
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="text" class="form-control" name="image" v-model="posts.image"  >
							<div class="alert ">
								<div v-if="errors.image">{{errors.image[0]}}</div>
    					</div>
					</div>
								
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-danger" v-on:click="doCancel()" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form> 
		</div>
        
	</div>        
</div>
  
</template>

<script>
export default {
  data: function () {
    return {
      listPosts: {
		
	  },
	   posts:{
		   id:'',
		title:'',
		short_des:'',
		description:'',
		image:''
		},
	  errors:{}
    };
  },
  mounted(){
    this.getPosts();
  },
  methods:{
    getPosts() {
		//console.log(this.$route.params.id);
			axios.get('http://127.0.0.1:8000/api/editP/' +this.$route.params.id)
				.then(response => {
					console.log(response.data)
					this.posts = response.data.data[0];
                    console.log(this.posts);
                   
				});
		},
		doCancel(){
			this.$router.push({name: 'adminUser'});
		},
		editPost(){
		axios.post('http://127.0.0.1:8000/api/editP/' +this.$route.params.id,this.posts)
				.then(response => {
					// console.log(response.data);
					this.listPosts =response.data.data;
					this.$router.push({name: 'adminPost'});
				})
				.catch(error => {
                    this.errors = error.response.data.errors  
                    console.log(error.response.data)
                     console.log(this.errors)
                   
                })
		}
}
}
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>

<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}

</style>