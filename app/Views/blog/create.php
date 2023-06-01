<div class="container">
    <h1>Create new post</h1>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <?php echo \Config\Services::validation()->listErrors(); ?>
<?php endif; ?>

    <form class="" action="/blog/create" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title"><strong>Title:</strong><span class="required">*</span></label>
            <input type="text" class="form-control" name="title" id="title" value="">
        </div>
        <br>
        <div class="form-group">
            <label for="description"><strong>Description:</strong><span class="required">*</span></label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="tags"><strong>Tags:</strong><span class="required">*</span></label>
            <input type="text" class="form-control" name="tags" id="tags" value="">
        </div>
        <br>
        <div class="form-group">
            <label for="image"><strong>Image:</strong><span class="required">*</span></label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>

<style>
    .required {
        color: red;
    }
</style>