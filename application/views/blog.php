<?php if ($blog->published) { ?>
<div class="blog" id="blog_<?php echo $blog->id; ?>">
  <aside>
    <time datetime="<?php echo $blog->created; ?>"><?php echo strftime('%Y', strtotime($blog->created)) . '<br/>' . strftime('%B', strtotime($blog->created)); ?></time>
    <dl>
      <dt>Author:</dt><dd><a href="mailto:<?php echo $author_email; ?>"><?php echo $author; ?></a></dd>
      <dt>Created:</dt><dd><?php echo strftime('%x %X', strtotime($blog->created)); ?></dd>
      <?php if ($blog->created != $blog->modified) { ?>
      <dt>Modified:</dt><dd><?php echo strftime('%x %X', strtotime($blog->modified)); ?></dd>
      <?php } ?>
    </dl>
  </aside>
  <article>
    <h2><?php echo $blog->title; ?></h2>
    <?php echo $blog->content; ?>
  </article>
</div>
<?php } ?>