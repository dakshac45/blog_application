<section>
    <div class="container">
        <br>
        <h2>Blog List</h2>
        <br>
        <?php if (empty($posts)): ?>
            <p>No posts have been found</p>
        <?php else: ?>
            <div class="blog-list">
                <?php foreach ($posts as $post): ?>
                    <div class="blog-list-item">
                        <h3 class="blog-title">
                            <a href="/blog/<?= $post['slug'] ?>"><?= $post['title'] ?></a>
                        </h3>
                        <div class="blog-meta">
                            <span class="blog-date"><?= date('M d, Y h:i A', strtotime($post['created_at'])) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="pagination">
                <?= $pager->links() ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    .blog-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .blog-list-item {
        width: 48%;
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .blog-title a {
        color: #00BFFF; /* Change the hyperlink color to light blue */
        text-decoration: none;
    }

    .blog-meta {
        margin-top: 10px;
        color: #888;
        font-size: 14px;
    }

    .pagination {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pagination ul {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination li {
        margin-right: 10px;
    }

    .pagination li:last-child {
        margin-right: 0;
    }

    .pagination a {
        color: #00BFFF;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #00BFFF;
        border-radius: 4px;
    }

    .pagination a:hover {
        background-color: #00BFFF;
        color: #fff;
    }

    .pagination .active a {
        background-color: #00BFFF;
        color: #fff;
    }
</style>
