<?php
/**
* @file
* Default theme implementation to display a single Drupal page.
*
* The doctype, html, head and body tags are not in this template. Instead they
* can be found in the html.tpl.php template in this directory.
*
* Available variables:
*
* General utility variables:
* - $base_path: The base URL path of the Drupal installation. At the very
*   least, this will always default to /.
* - $directory: The directory the template is located in, e.g. modules/system
*   or themes/bartik.
* - $is_front: TRUE if the current page is the front page.
* - $logged_in: TRUE if the user is registered and signed in.
* - $is_admin: TRUE if the user has permission to access administration pages.
*
* Site identity:
* - $front_page: The URL of the front page. Use this instead of $base_path,
*   when linking to the front page. This includes the language domain or
*   prefix.
* - $logo: The path to the logo image, as defined in theme configuration.
* - $site_name: The name of the site, empty when display has been disabled
*   in theme settings.
* - $site_slogan: The slogan of the site, empty when display has been disabled
*   in theme settings.
*
* Navigation:
* - $main_menu (array): An array containing the Main menu links for the
*   site, if they have been configured.
* - $secondary_menu (array): An array containing the Secondary menu links for
*   the site, if they have been configured.
* - $breadcrumb: The breadcrumb trail for the current page.
*
* Page content (in order of occurrence in the default page.tpl.php):
* - $title_prefix (array): An array containing additional output populated by
*   modules, intended to be displayed in front of the main title tag that
*   appears in the template.
* - $title: The page title, for use in the actual HTML content.
* - $title_suffix (array): An array containing additional output populated by
*   modules, intended to be displayed after the main title tag that appears in
*   the template.
* - $messages: HTML for status and error messages. Should be displayed
*   prominently.
* - $tabs (array): Tabs linking to any sub-pages beneath the current page
*   (e.g., the view and edit tabs when displaying a node).
* - $action_links (array): Actions local to the page, such as 'Add menu' on the
*   menu administration interface.
* - $feed_icons: A string of all feed icons for the current page.
* - $node: The node object, if there is an automatically-loaded node
*   associated with the page, and the node ID is the second argument
*   in the page's path (e.g. node/12345 and node/12345/revisions, but not
*   comment/reply/12345).
*
* Regions:
* - $page['help']: Dynamic help text, mostly for admin pages.
* - $page['highlighted']: Items for the highlighted content region.
* - $page['content']: The main content of the current page.
* - $page['sidebar_first']: Items for the first sidebar.
* - $page['sidebar_second']: Items for the second sidebar.
* - $page['header']: Items for the header region.
* - $page['footer']: Items for the footer region.
*
* @see bootstrap_preprocess_page()
* @see template_preprocess()
* @see template_preprocess_page()
* @see bootstrap_process_page()
* @see template_process()
* @see html.tpl.php
*
* @ingroup themeable
*/
?>
<div class="navbar navbar-default navbar-fixed-top" id="xyzsubnav">
  <div class="col-md-12">
    <div class="navbar-header">

      <a href="#" class="navbar-btn btn-logo btn-default btn-plus dropdown-toggle" data-toggle="dropdown"><img class="paclogo" src="/pactober/sites/all/themes/pactober/images/Pac21Straight416.jpg" /></a>

      <ul class="nav dropdown-menu">
        <li><a href="/search"><i class="glyphicon glyphicon-user" style="color:#1111dd;"></i> Search</a></li>
        <li><a href="/subscribe"><i class="glyphicon glyphicon-user" style="color:#1111dd;"></i> Subscribe</a></li>
        <li><a href="/archives"><i class="glyphicon glyphicon-dashboard" style="color:#0000aa;"></i> Archives</a></li>
        <li><a href="/about"><i class="glyphicon glyphicon-inbox" style="color:#11dd11;"></i> About Pacifism21</a></li>
        <li class="nav-divider"></li>
        <li><a href="/user"><i class="glyphicon glyphicon-cog" style="color:#dd1111;"></i> Login</a></li>
      </ul>


      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse2">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Posts</a></li>
        <li><a href="#loginModal" role="button" data-toggle="modal">Login</a></li>
        <li><a href="#aboutModal" role="button" data-toggle="modal">About</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="row pac-main">
  <div class="col-xs-0 col-sm-1">
  </div>
  <?php if ($is_front):
    //print render($page['content']);
    print views_embed_view('front_stories', 'block_1');
  else: ?>
    <!-- STANDARD PAGE TEMPLATE -->
    <div class="pac-core col-xs-12 col-sm-10">
      <div class="col-xs-12 col-sm-12 col-md-9">
        <a id="main-content"></a>
        <?php if (!empty($title)): ?>
          <h1><?php print $title ?></h1>
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
    </div>
  <?php endif; ?>
  <div class="col-xs-1">
  </div>

  <footer class="footer container">
    <?php print render($page['footer']); ?>
  </footer>
