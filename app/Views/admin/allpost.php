
<div class="container">
    <div class="row">
       <div class="col">
           <div class="card m-5">
                   <div class="card-header">
                       <h2 class="text-center text-dark">All Post</h2>
                   </div> 
                  <?php
                    if(session()->get('danger')): ?>
                       <div class="alert alert-danger" role="alert">Post Deleted</div>
                    <?php endif; ?>

                    <?php if(isset($_GET['edit'])): ?>
                <div class="alert alert-success" role="alert">Post Edited Successfully</div>
                <?php endif; ?>
                   <div class="card-body">
                       <table class="table table-bordered"> 
                           
                           <thead>
                               <tr>
                                   <td>ID</td>
                                   <td>Post Title</td>
                                   <td>Content</td>
                                   <td>Edit</td>
                                   <td>Delete</td>
                               </tr>
                               
                               
                           </thead>
                           <tbody>
                               <?php $i = 1; foreach ($table as $s) { ?>
                           <tr>   
                                <td><?= $i++ ; ?></td>
                                <td><?= $s['p_title']; ?></td>
                                <td><?= word_limiter($s['body'], 10); ?></td>
                                <td><a href="/Dashboard/Edit/<?= $s['id']; ?>" class="btn btn-success">Edit</a></td>
                                <td><a href="/Dashboard/Delete/<?= $s['id']; ?>" class="btn btn-danger">Delete</a></td>
                               </tr>
                               <?php
                                   }
                                   ?>
                           </tbody>
                       </table>
                   </div>
           </div>
       </div>
    </div>
</div>

