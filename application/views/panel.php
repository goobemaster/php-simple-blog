  <nav>
    <?php if ($post_list_displayed) { ?>
    <div id="posts">
    <?php
      if (empty($blog_list)) {
        echo '<p>There are no blog entries yet.</p>';
      } else {
        $last_month = '';
        $last_year = '';
        foreach ($blog_list as $blog) {
          $current_month = date('F', strtotime($blog->created));
          $current_year = date('Y', strtotime($blog->created));

          $this->view('blog_list', array('blog' => $blog, 'year' => $current_year != $last_year ? $current_year : false, 'month' => $current_month != $last_month ? $current_month : false));
          $last_month = $current_month;
          $last_year = $current_year;
        }
      }
    ?>
    </div>
    <?php } ?>

    <?php if ($search_displayed) { ?>
    <div id="search">
      <h1><img src="media/images/search-icon.png" alt="Search" title="Search the blog"/>Search</h1><div class="break"></div>
      <form action="home/search" method="GET">
        <input type="text" value="" name="keyword" id="keyword"/>
        <input type="submit" value="Go"/>
      </form>
    </div>
    <?php } ?>

    <?php if ($tags_displayed) { ?>
    <div id="tags" class="tags">
      <h1><img src="media/images/tags-icon.png" alt="Most used tags" title="Most used tags"/>Tags</h1><div class="break"></div>
      <?php $tag_count = 0; foreach ($tag_list as $tag => $count) { $tag_count++; if ($tag_count > $tags_max) break; $weight = tag_weight($count, $tag_size_max); echo '<div class="tag" style="font-size:' . $weight . 'px;line-height:' . $weight . 'px;"><a href="home/search?keyword=' . urlencode($tag) . '&tags">' . $tag . '</a></div>'; } ?>
    </div>
    <?php } ?>
  </nav>