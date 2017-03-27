<?php
require_once(__DIR__ . '/lib/init.php');

get_header(); ?>

<h1>Contact form</h1>

<main>

  <form class="form" method="post" action="" >
    <ul class="container">
      <?php foreach( $CF->get_fields() as $id ) : ?>

      <li>
        <?php $CF->render($id); ?>
      </li>
      <?php endforeach; ?>

      <li>
        <label>
          <input type="submit" name="confirm" value="送信内容を確認" />
        </label>
      </li>
      
    </ul>
    <div class="hidden"><input type="hidden" name="token" value="" /></div>
  </form>

</main>

<?php get_footer();
