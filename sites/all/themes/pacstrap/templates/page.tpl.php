<?php
/*
 * main page template for pacifism.sh
 */
?>
<div class="main-container container-fluid">
  <header class="hidden-xs hidden-sm col-md-12" role="banner" id="page-header">
    <div class="row pac-topbar">
      <span class="hidden-xs hidden-sm col-md-1"> 
      </span>
      <span class="btn-toolbar hidden-xs hidden-sm col-md-10" role="toolbar" aria-label="Actions"> 
        <button type="button" class="btn btn-default">
          <a href="/about">About this site</a>
        </button>
        <button type="button" class="btn btn-default">
          <?php
            global $user;
            if ($user->uid > 0) {
               print 'Welcome <a href="/user">' . $user->name . '</a>';
            } else {
               print '<a href="/user/">Log in</a>';
            }
          ?>
        </button>
        <button type="button" class="btn btn-default">
          <a href="/newsletter/signup">Keep In Touch Via Email</a><br />
        </button>
      </span>
      <span class="hidden-xs hidden-sm col-md-1"> 
      </span>
    </div>
  </header> <!-- /#page-header -->

  <div class="row">
    <span class="hidden-xs col-sm-1 col-md-1">
    </span>
    <!-- XS AND SM -->
    <span class="col-xs-12 col-sm-10 hidden-md hidden-lg hidden-xl pac-logobar centered">
      <!-- XS -->
      <div class="col-xs-10 hidden-sm xs-header-well align-left">
        <table class="ttable">
          <tr class="trow">
            <td class="tlogo">
              <a href="/"><img width="100" src="/sites/all/themes/pacstrap/logos/pcube150.png" /></a>
            </td>
            <td class="xs-title-well">
              <h1><?php print $title ?></h1>
            </td>
          </tr>
        </table>
      </div>
      <!-- SM -->
      <div class="hidden-xs col-sm-10 sm-header-well align-left">
        <table class="ttable">
          <tr class="trow">
            <td class="tlogo">
              <a href="/"><img src="/sites/all/themes/pacstrap/logos/pcube150.png" /></a>
            </td>
            <td class="sm-title-well">
              <h1><?php print $title ?></h1>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-xs-2 col-sm-2 glyph-well align-right">
        <div class="dropdown pull-right">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdown1" data-toggle="dropdown" aria=expanded="true">
            <span class="glyphicon glyphicon-align-justify"></span>
          </button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdown1">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
              <a href="/about">About This Site</a>
            </li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
              <?php
                global $user;
                if ($user->uid > 0) {
                   print '<a href="/user">Welcome ' . $user->name . '</a>';
                } else {
                   print '<a href="/user/">Create Account or Log In</a>';
                }
              ?>
            </li> 
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
              <a href="/about">Search This Site</a>
            </li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
              <a href="/newsletter/signup">Keep In Touch Via Email</a>
            </li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
              <a href="/feed">Subscribe To Feed</a>
            </li>
          </ul>
        </div>
      </div>
    </span>
    <!-- MD LG XL -->
    <span class="hidden-xs hidden-sm col-md-10 pac-logobar">
      <div class="col-md-12 md-header-well align-left">
        <table class="ttable">
          <tr class="trow">
            <td class="tlogo">
              <a href="/"><img src="/sites/all/themes/pacstrap/logos/pcube200.png" /></a>
            </td>
            <td class="md-title-well">
              <h1><?php print $title ?></h1>
            </td>
          </tr>
        </table>
      </div>
    </span>
    <span class="hidden-xs col-sm-1 col-md-1">
    </span>
  </div> 

  <div class="row pac-mainwrap">
    <div class="hidden-xs col-sm-1 col-md-1">
    </div>
    <div class="col-xs-12 hidden-sm hidden-md hidden-lg hidden-xl pac-xs-core">
      <a id="main-content"></a>
      <?php if (!empty($title)): ?>
      <?php endif; ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <div class="pacadd">
        <div class="addthis_sharing_toolbox"></div>
      </div>
    </div>
    <div class="hidden-xs col-sm-10 col-md-7 pac-core">
      <a id="main-content"></a>
      <?php if (!empty($title)): ?>
      <?php endif; ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <div class="pacadd">
        <div class="addthis_sharing_toolbox"></div>
      </div>
    </div>
    <div class="hidden-xs hidden-sm col-md-3 pac-rightbar">
      <div class="rightbar-box rightbar-search">
        <h2 class="rightbar-title">Search</h2>
        <?php
          $block = module_invoke('search', 'block_view');
          $search_render = render($block);
          print $search_render;
        ?>
      </div>
      <?php
        print render($page['highlighted']); 
      ?>
    </div>
    <div class="hidden-xs col-sm-1 col-md-1">
    </div>
  </div>
</div>
<footer class="footer container">
  <?php print render($page['footer']); ?>
</footer>
