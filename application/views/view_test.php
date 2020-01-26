<?php $this->load->view('header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('sidebar'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    // // ##HTTP REQUEST##
    // const Http = new XMLHttpRequest();
    // const url='https://jsonplaceholder.typicode.com/posts';
    // Http.open("GET", url);
    // Http.send();
    // Http.onreadystatechange=(e)=>{
    //     // if(this.readyState==4 && this.status== 200) {
    //         console.log(Http.responseText)
    //     // }
    // } 
    
    // // ##AJAX##
    // $(document).ready(function(){
    //     $('.btn').click(function(){
    //         const url='https://jsonplaceholder.typicode.com/posts';
    //         $.ajax({
    //             url : url,
    //             type : "GET",
    //             success : function(result){
    //                 console.log(result)
    //             },
    //             error : function(error){
    //                 console.log(error)
    //             }
    //         })
    //     })
    // })

    // // ##GET##
    // $(document).ready(function(){
    //     const url='https://jsonplaceholder.typicode.com/posts';
    //     $('.btn').click(function(){
    //         $.get(url, function(data,status){
    //             console.log(data)
    //         });
    //     });
    // });

    // // ##POST##
    // const url='https://jsonplaceholder.typicode.com/posts';
    // const data = {
    //     name:"said",
    //     id:23
    // }
    // $(document).ready(function(){
    //     $('.btn').click(function(){
    //         $.post(url,data,function(data,status){
    //             console.log(data)
    //         });
    //     });
    // });

    // // ##GET JSON##
    // const url='https://jsonplaceholder.typicode.com/posts';
    // $(document).ready(function(){
    //     $('.btn').click(function(){
    //         $.getJSON(url,function(result){
    //             console.log(result)
    //         });
    //     });
    // });


    // $(document).ready(function(){
    //     var nama = '';
    //     $('.btn').click(function(){
    //         $.ajax({
    //             url : "<?php echo base_url(); ?>test/getUser/",
    //             type : "GET",
    //             success: successCallBack
    //         });
    //         console.log(nama);
    //     });

    //     function successCallBack(returnData) {
    //         nama = returnData
    //     }        
    // });



    $(document).ready(function(){
        $('.btn').click(function(){
            var nama = '';
            $.ajax({
                url : "<?php echo base_url(); ?>test/getUser/",
                type : "GET",
                // success: successCallBack
                success : function(result){
                    nama = result;
                //     // console.log(result);
                //     obj = JSON.parse(result);                    
                //     // console.log(obj);
                //     // console.log(obj[0]['realname']);
                //     nama = obj[0]['realname'];
                },
                error : function(error){
                    console.log(error)
                }
            });
            console.log(nama);
        });
     
    });    



</script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
  		<h1>
  			Test
  			<small>RBA Al Fatih</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="<?php echo base_url('home/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
  			<li class="active">Dashboard</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<!-- Small boxes (Stat box) -->
  		<div class="row">
  			<div class="col-sm-12">
  				<div class="box box-info">
  					<div class="box-body">
                        <button class='btn'>test</button>

  					</div>
  				</div>
  			</div>
  		</div>
  	</section>

  </div>

  <?php $this->load->view('footer'); ?>


