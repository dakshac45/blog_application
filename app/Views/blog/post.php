<section>
    <div class="container">
        <article class="blog-post text-center">
            <h1><?= $post['title'] ?></h1>
            <div class="details">
                Posted on: <?= date('M d Y h:i A', strtotime($post['created_at'])) ?>
            </div>
            <br>
            <?php if ($post['image']): ?>
                <img src="<?= base_url($post['image']) ?>" alt="Blog Image" class="img-fluid">
            <?php endif; ?>
            <div class="description">
                <br>
                <p style="text-align: justify; text-indent: 0; padding: 0 20px;"><?= $post['description'] ?></p>
            </div>
            <?php if (!empty($post['tags'])): ?>
                <div class="tags">
                    <strong>Tags:</strong>
                    <?php
                    $tags = explode(',', $post['tags']); // Convert the comma-separated string to an array
                    foreach ($tags as $tag):
                    ?>
                        <span class="tag"><?= trim($tag) ?></span>
                        <!-- <a href="#" class="tag"><?= $tag ?></a> -->
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </article>
    </div>
</section>

<style>
    .blog-post {
        margin-top: 50px;
        padding: 40px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .blog-post h1 {
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .details {
        color: #999;
        margin-bottom: 20px;
    }

    .description p {
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 20px;
        text-align: justify;
        text-indent: 0;
        padding: 0 20px;
    }

    .tags {
        margin-top: 20px;
    }

    .tag {
        display: inline-block;
        margin-right: 5px;
        background-color: #f2f2f2;
        padding: 5px 10px;
        border-radius: 5px;
    }
</style>
