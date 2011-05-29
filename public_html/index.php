<?php
/*!
 * @file
 * index.php
 * @author Anders Evenrud <andersevenrud@gmail.com>
 * @license GPLv3 (see http://www.gnu.org/licenses/gpl-3.0.txt)
 * @created 2011-05-26
 */

require "../header.php";

if ( !($wm = WindowManager::initialize()) ) {
  die("Failed to initialize window manager");
}

if ( !($json = $wm->doGET($_GET)) === false ) {
  header("Content-Type: application/json");
  die($json);
}
if ( !($json = $wm->doPOST($_POST)) === false ) {
  header("Content-Type: application/json");
  die($json);
}

$now = new DateTime();
$timestamp = $now->format("d/m/Y h:i:s"); // TODO: Timezone

header("Content-Type: text/html");
header("Expires: Fri, 01 Jan 2010 05:00:00 GMT");
header("Cache-Control: maxage=1");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!--
  JavaScript Window Manager

  @package ajwm.Template
  @author  Anders Evenrud <andersevenrud@gmail.com>
  -->
  <title>Another JSWM</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- Vendor libraries -->
  <script type="text/javascript" src="/js/vendor/json2.js"></script>
  <script type="text/javascript" src="/js/vendor/sprintf-0.7-beta1.js"></script>
  <script type="text/javascript" src="/js/vendor/fileuploader.js"></script>
  <script type="text/javascript" src="/js/vendor/jquery-1.5.2.min.js"></script>
  <script type="text/javascript" src="/js/vendor/jquery-ui-1.8.13.custom.min.js"></script>

  <link rel="stylesheet" type="text/css" href="/css/ui-lightness/jquery-ui-1.8.13.custom.css" />

  <!-- Main libraries -->
  <link rel="stylesheet" type="text/css" href="/css/main.css" />
  <link rel="stylesheet" type="text/css" href="/css/pimp.css" />
  <link rel="stylesheet" type="text/css" href="/css/theme.default.css" />

  <script type="text/javascript" src="/js/utils.js"></script>
  <script type="text/javascript" src="/js/main.js"></script>

  <!-- Preloaded applications -->
  <link rel="stylesheet" type="text/css" href="/css/sys.about.css" />
  <link rel="stylesheet" type="text/css" href="/css/sys.user.css" />
  <link rel="stylesheet" type="text/css" href="/css/sys.settings.css" />
  <link rel="stylesheet" type="text/css" href="/css/sys.logout.css" />
  <link rel="stylesheet" type="text/css" href="/css/sys.terminal.css" />

  <script type="text/javascript" src="/js/sys.user.js"></script>
  <script type="text/javascript" src="/js/sys.settings.js"></script>
  <script type="text/javascript" src="/js/sys.logout.js"></script>
  <script type="text/javascript" src="/js/sys.terminal.js"></script>
</head>
<body>

<div id="Desktop">
  <!-- Panel -->
  <div class="DesktopPanel AlignTop" id="Panel">

    <div class="PanelItem PanelItemMenu">
      <img alt="" src="/img/icons/16x16/categories/gnome-applications.png" title="Launch Application" />
    </div>

    <div class="PanelItem PanelItemSeparator">&nbsp;</div>

    <div class="PanelItemHolder PanelWindowHolder">
    </div>

    <div class="PanelItem PanelItemClock AlignRight">
      <span><?php print $timestamp; ?></span>
    </div>

    <div class="PanelItem PanelItemSeparator AlignRight">&nbsp;</div>

    <div class="PanelItemHolder PanelItemDock AlignRight">
      <div class="PanelItem PanelItemLauncher">
        <span class="launch_SystemAbout"><img alt="" src="/img/icons/16x16/categories/system-help.png" title="About" /></span>
      </div>
      <div class="PanelItem PanelItemLauncher">
        <span class="launch_SystemSettings"><img alt="" src="/img/icons/16x16/categories/applications-system.png" title="System Settings" /></span>
      </div>
      <div class="PanelItem PanelItemLauncher">
        <span class="launch_SystemUser"><img alt="" src="/img/icons/16x16/apps/user-info.png" title="User Information" /></span>
      </div>
      <div class="PanelItem PanelItemLauncher">
        <span class="launch_SystemLogout"><img alt="" src="/img/icons/16x16/actions/gnome-logout.png" title="Save and Quit" /></span>
      </div>
    </div>
  </div>

  <div id="ContextMenu">
  </div>

  <!-- Content -->
</div>

<!-- Loading -->
<div id="Loading" style="display:none">
  <div id="LoadingBar"></div>
</div>

<!-- Templates -->
<div id="LoginWindow" class="Window" style="display:none">
  <div class="WindowContent">
    <div class="WindowContentInner">
      <form method="post" action="/">
        <div class="Row">
          <label for="LoginUsername">Username</label>
          <input type="text" id="LoginUsername" value="Administrator" name="username" />
        </div>
        <div class="Row">
          <label for="LoginPassword">Password</label>
          <input type="password" id="LoginPassword" value="Administrator" name="password" />
        </div>
        <div class="Buttons">
          <input type="submit" value="Log in" />
        </div>
      </form>
    </div>
  </div>
</div>

<div id="Window" style="display:none">
  <div class="Window">
    <div class="WindowTop">
      <div class="WindowTopInner">
        <img alt="" src="/img/icons/16x16/emblems/emblem-unreadable.png" />
        <span></span>
      </div>
      <div class="WindowTopControllers">
        <div class="WindowTopController ActionMinimize">
          <span>_</span>
        </div>
        <div class="WindowTopController ActionMaximize">
          <span>+</span>
        </div>
        <div class="WindowTopController ActionClose">
          <span>x</span>
        </div>
      </div>
    </div>
    <div class="WindowMenu">
      <ul class="Top">
        <!--
        <li class="Top">
          <span class="Top">File</span>
          <ul class="Menu">
            <li><span>Close</span></li>
          </ul>
        </li>
        -->
      </ul>
    </div>
    <div class="WindowContent">
      <div class="WindowContentInner">
      </div>
    </div>
    <div class="WindowBottom">
      <div class="WindowBottomInner">
      </div>
    </div>
  </div>
</div>

<div id="Dialog" style="display:none">
  <div class="Window Dialog">
    <div class="WindowTop">
      <div class="WindowTopInner">
        <span></span>
      </div>
      <div class="WindowTopControllers">
        <div class="WindowTopController ActionClose">
          <span>x</span>
        </div>
      </div>
    </div>
    <div class="WindowContent">
      <div class="WindowContentInner">
        <div class="DialogContent">
          This is a dialog!
        </div>
        <div class="DialogButtons">
          <button class="Choose" style="display:none;">Choose</button>
          <button class="Close">Close</button>
          <button class="Ok" style="display:none;">Ok</button>
          <button class="Cancel" style="display:none;">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="OperationDialogColor" style="display:none">
  <div class="OperationDialog OperationDialogColor">
    <div class="OperationDialogInner">
      <div>
        <div class="Slider SliderR"></div>
      </div>
      <div>
        <div class="Slider SliderG"></div>
      </div>
      <div>
        <div class="Slider SliderB"></div>
      </div>
    </div>
    <div class="CurrentColor">
    </div>
    <div class="CurrentColorDesc">
    </div>
  </div>
</div>

<div id="OperationDialogCopy" style="display:none">
  <div class="OperationDialog OperationDialogCopy">
    <h1>Copy file</h1>
    <div class="OperationDialogInner">
      <p class="Status">0 of 0</p>
      <div class="ProgressBar"></div>
    </div>
  </div>
</div>

<div id="OperationDialogUpload" style="display:none">
  <div class="OperationDialog OperationDialogUpload">
    <h1>Upload file...</h1>
    <div class="OperationDialogInner">
      <p class="Status">No file selected</p>
      <div class="ProgressBar"></div>
    </div>
  </div>
</div>

<div id="OperationDialogFile" style="display:none">
  <div class="OperationDialog OperationDialogFile">
    <div class="FileChooser">
      <ul>
      </ul>
    </div>
    <div class="FileChooserInput">
      <input type="text" />
    </div>
  </div>
</div>

<!-- Version Stamp -->
<div id="Version">
  JSWM Version <?php print PROJECT_VERSION; ?>
  -
  <?php print PROJECT_AUTHOR; ?>

  &lt;<?php print PROJECT_CONTACT; ?>&gt;
</div>

</body>
</html>
