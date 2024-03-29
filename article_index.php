<?php

include 'header.php';
include 'sidebar.php';
include 'db.php';

$query = "SELECT * FROM article LEFT JOIN category ON article.category_id = category.id ORDER BY posted_at DESC";
$result = mysqli_query($conn, $query);
$article = $result;

?>


<a href="article_create.php" class="tm-external-link mb-3">
    <i class="fa-solid fa-plus-circle"></i>New Article
</a>

<div class="row tm-row">
    <?php foreach($article as $article): ?>
    <article class="col-12 col-md-6 tm-post">
        <hr class="tm-hr-primary">
        
        <a href="article_view.php?id=<?= $article['id']; ?>" class="effect-lily tm-post-link tm-pt-60">
            <div class="tm-post-link-inner">
                
                <img src="<?php echo json_decode($article['photos'])[0] ?? 'img/img-01.jpg'; ?>" alt="Image" class="img-fluid">
                
            </div>
            <span class="position-absolute tm-new-badge">New</span>
            <h2 class="tm-pt-30 tm-color-primary tm-post-title">Simple and useful HTML layout</h2>
        </a>
        <p class="tm-pt-30">
            <?= $article['body'] ?>
        </p>
        <div class="d-flex justify-content-between tm-pt-45">
            <span class="tm-color-primary"><?= $article['name']; ?></span>
            <span class="tm-color-primary"><?= $article['posted_at']; ?></span>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
            <span>36 comments</span>
            <span>by Admin Nat</span>
        </div>
    </article>
    <?php endforeach ?>
    
    
</div>

<!-- hp include 'footer.php'; ?> -->