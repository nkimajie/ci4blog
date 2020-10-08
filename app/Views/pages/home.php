

<div class="container">

  <div class="row">

<?php foreach ($news as $news2): ?>



    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card h-100">
        <!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
        <div class="card-body">
          <h4 class="card-title">
            <a href="/view/<?= esc($news2['slug'], 'url'); ?>"><?= $news2['p_title']; ?></a>
          </h4>
          <p class="card-text"><?= word_limiter($news2['body'], 10)  ?></p>
          <a href="/view/<?= esc($news2['slug'], 'url'); ?>" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>

  
<!-- /.container -->

<?php endforeach; ?>
</div>
  <!-- /.row -->

  <!-- Pagination -->
  <!-- <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
    </li>
  </ul> -->

</div>
