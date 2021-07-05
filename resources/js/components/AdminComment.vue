<template>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Comment</b></h2>
					</div>
					<div class=" col-sm-6">
                        
						<a href="#addEmployeeModal" class="btn btn-success " data-toggle="modal" >
                              <i class="material-icons">&#xE147;</i> 
						<span>Add New Comment</span></a>					
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>USER_ID</th>
						<th>POST_ID</th>
						<th>CONTENT</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody v-for="listComment in listComments.data" :key="listComment.id">
			<!-- @foreach($list_user as $list) -->
					<tr>
						<td>{{listComment.id}}</td>
						<td>{{listComment.user_id}}</td>
							<td>{{listComment.post_id}}</td>
							<td>{{listComment.content}}</td>
						<td>
						
							<a v-on:click.prevent="editComment(listComment.id)"  class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a v-on:click.prevent="deleteComment(listComment.id)" class="delete" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							
						</td>
					</tr>
					<!-- //@endforeach -->
				</tbody>
			</table>
			<div class="clearfix" >			
				 <pagination :data="listComments" @pagination-change-page="getComment"></pagination>
			</div>
			
			<div class="p-t-15">
                    
						 <router-link to="home">
                    <button class="btn btn--radius-2 btn--blue" type="button" > Home</button>
					</router-link>
                
            </div>  
		</div>
	</div>      
    
<div id="addEmployeeModal" class="modal fade"  >
	<div class="modal-dialog">
		<div class="modal-content" >
			<form  v-on:submit.prevent="addComment()">
				<div class="modal-header">						
					<h4 class="modal-title">Add Comment</h4>
					<button type="button"  v-on:click="doCancel()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				
				<div class="modal-body">					
					<div class="form-group">
						<label>USER_ID</label>
						<input v-model="comment.user_id" type="text" class="form-control" name="user_id" >
						<div v-if="errors.user_id">{{errors.user_id[0]}}</div>
					</div>
					
					<div class="form-group">
						<label>POST_ID</label>
						<input v-model="comment.post_id" type="text" class="form-control" name="post_id" >
						<div v-if="errors.post_id">{{errors.post_id[0]}}</div>
					</div>
					<div class="form-group">
						<label>Content</label>
						<input  v-model="comment.content"  type="text" class="form-control" name="content" >
						<div v-if="errors.content">{{errors.content[0]}}</div>
					</div>		
				</div>
				<div class="modal-footer" >
					<input type="button" v-on:click="doCancel()" class="btn btn-danger" data-dismiss="modal" value="Cancel">
					<input type="submit"  class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>  
</div>
<!-- Edit Modal HTML -->

  
</template>

<script>
export default {
 name: "AdminComment",
  data: function () {
    return {
      listComments: {},
	  comment:{
		user_id:'',
		post_id:'',
		content:'',
		},
		 errors:{},
		 
    };
  }, 
  components: {
    
  },
  mounted(){
    this.getComment();
  },
  methods:{
    getComment(page = 1) {
			axios.get('http://127.0.0.1:8000/api/adminComment?page=' + page)
				.then(response => {
					this.listComments = response.data;
				});
		},
	addComment(){
		axios.post('http://127.0.0.1:8000/api/addComment',this.comment)
			.then(response => {
			 if(response.data === ""){
						// this.checkLogin ="Account or Password wrong";
                    }else{
                        // console.log("dang nhap thanh cong   ");
                        console.log(response.data.id);
                        // localStorage.setItem('lang',this.user.email);
                          window.location.reload();
                    }
                    console.log(response)
				  
		})
                .catch(error => {
                    this.errors = error.response.data.errors;
                    console.log(error.response.data)
                })
	},
	doCancel(){
			this.errors='';
			this.comment.user_id='';
			this.comment.post_id='';
			this.comment.content='';
		

	},
	deleteComment(index){
		axios.post('http://127.0.0.1:8000/api/deleteComment',{id:index})
			.then(response => {
				this.listComments = response.data;
				this.$router.push({name: 'adminComment'}).catch(()=>{});
				
		})

	},
	editComment(id){
		this.$router.push({name: 'editComment',params:{id:id}});
	}
  }
};


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
a :active
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
.p-t-15 .btn {
	display: inline-block;
  line-height: 50px;
  padding: 0 50px;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  transition: all 0.4s ease;
  cursor: pointer;
  font-size: 18px;
  color: white;
  background:#4272d7;
  font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
</style>