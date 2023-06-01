<section>
    <?php
    $session = \Config\Services::session();
    ?>
    <?php if (isset($session->success)): ?>
    <div class="alert alert-success text-center alert-dismissible fade show mb-0" role="0">
        <?= $session->success ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        setTimeout(function() {
            $('.alert').alert('close');
        }, 10000); // Set the timeout for 10 seconds (10000 milliseconds)
    </script>
    <?php endif; ?>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Blog Application</h1>
            <p class="lead">Welcome to my website! You can create your own blogs here.</p>
            <hr class="my-4">
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h2>Latest Posts</h2>
        <br>
        <?php if (empty($latestPosts)): ?>
            <p>No posts have been found</p>
        <?php else: ?>
            <div class="post-container">
                <?php foreach ($latestPosts as $post): ?>
                    <div class="post">
                        <h3 class="post-title" style="color: #00BFFF;"><a href="/blog/<?= $post['slug'] ?>"><?= $post['title'] ?></a></h3>
                        <p class="post-description"><?= substr($post['description'], 0, 100) . '...' ?></p>
                        <p class="post-date"><?= date('M d, Y h:i A', strtotime($post['created_at'])) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    .post-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .post {
        background-color: #F0F0F0;
        padding: 20px;
        border-radius: 10px;
    }

    .post-title a {
        color: #00BFFF;
        text-decoration: none;
    }

    .post-description {
        color: #666;
    }

    .post-date {
        color: #999;
        font-size: 14px;
        margin-top: 10px;
    }
</style>
