<!-- <script src="assets/textarea/ckeditor.js"></script> -->

<div class="container">
    <!-- <div class="row"> -->
        <div class="col-lg-6 m-auto">
            <!-- <div class="card m-5"> -->
            <div class="card-body">
               <form action="/create" method="post" enctype="multipart/form-data">
                <?php if(isset($_GET['success'])): ?>
                <div class="alert alert-success" role="alert">Post Uploaded</div>
                <?php endif; ?>
                <?php if(isset($validation)): ?>
                    <div class="alert alert-warning" role="alert"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                
               <!-- <div class="form-group">
                   <label >Cover Photo</label>
                   <input class="form-control-file" type="file" name="photo">
               </div> -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" name="p_title"class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea id="long_desc" class="form-control" name="body" rows="3"></textarea>
                    </div>
            </div>
                <div class="card-footer">
                    <input class="btn btn-primary" type="submit" name="submit" value="Post">
                </form>
                </div>
            </div>
            
            
        <!-- </div>
    </div> -->
</div>

<!-- </script>

  &nbsp <script type="text/javascript">
    
// Initialize CKEditor
//CKEDITOR.inline( 'short_desc' );

CKEDITOR.replace('long_desc',{

//   width: "80%",
//   height: "200px" 

}); 
 
</script> -->
