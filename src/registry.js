/*!
 * @file
 * OS.js - JavaScript Operating System - default registry
 *
 * Copyright (c) 2011-2012, Anders Evenrud <andersevenrud@gmail.com>
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met: 
 * 
 * 1. Redistributions of source code must retain the above copyright notice, this
 *    list of conditions and the following disclaimer. 
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution. 
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @author  Anders Evenrud <andersevenrud@gmail.com>
 * @licence Simplified BSD License
 * @created 2013-01-27
 */
"use strict";

///////////////////////////////////////////////////////////////////////////////
// EXPORTS
///////////////////////////////////////////////////////////////////////////////

module.exports =
{
  defaults : {
    "desktop.font" : {
      "options" : ["Sansation", "FreeMono", "FreeSans", "FreeSerif"],
      "value"    :  "Sansation"
    },

    "desktop.icon.theme" : {
      "options" : ["Default"],
      "value"    :  "Default"
    },

    "desktop.cursor.theme" : {
      "options" : ["Default", "Experimental"],
      "value"    :  "Default"
    },

    "desktop.theme" : {
      "options" : ["dark", "light"],
      "value"    :  "dark"
    },

    "desktop.wallpaper.path" : {
      "value"  :  "/System/Wallpapers/noise_red.png"
    },

    "desktop.wallpaper.type" : {
      "options" : ["Tiled Wallpaper", "Centered Wallpaper", "Stretched Wallpaper", "Color only"],
      "value"    :  "Tiled Wallpaper"
    },

    "desktop.background.color"  :   {
      "value"  :  "#005A77"
    },

    "system.sounds.theme" : {
      "options" : ["Default"/*, "User-Defined"*/],
      "value"    :  "Default"
    },

    "desktop.panels" : {
      "items" : [
        {
          "name" : "Default",
          "index" : 0,
          "items" : [
            {
              "index" : 0,
              "name" : "PanelItemMenu",
              "opts" : {

              },
              "align" : "left",
              "position" : 0
            },
            {
              "index" : 1,
              "name" : "PanelItemSeparator",
              "opts" : {

              },
              "align" : "left",
              "position" : 38
            },
            {
              "index" : 2,
              "name" : "PanelItemWindowList",
              "opts" : {

              },
              "align" : "left",
              "position" : 48
            },
            {
              "index" : 3,
              "name" : "PanelItemClock",
              "opts" : {

              },
              "align" : "right",
              "position" : 0
            },
            {
              "index" : 4,
              "name" : "PanelItemSeparator",
              "opts" : {

              },
              "align" : "right",
              "position" : 115
            },
            {
              "index" : 5,
              "name" : "PanelItemDock",
              "opts" : [
                [
                  {
                    "title" : "About",
                    "icon" : "actions/gtk-about.png",
                    "launch" : "SystemAbout"
                  },
                  {
                    "title" : "Control Panel",
                    "icon" : "categories/preferences-system.png",
                    "launch" : "SystemControlPanel"
                  },
                  {
                    "title" : "Save and Quit",
                    "icon" : "actions/gnome-logout.png",
                    "launch" : "SystemLogout"
                  }
                ]
              ],
              "align" : "right",
              "position" : 120
            },
            {
              "index" : 6,
              "name" : "PanelItemSeparator",
              "opts" : {

              },
              "align" : "right",
              "position" : 205
            },
            {
              "index" : 7,
              "name" : "PanelItemWeather",
              "opts" : {

              },
              "align" : "right",
              "position" : 215
            }/*,
            {
              "index" : 7,
              "name" : "PanelItemNotificationArea",
              "opts" : {

              },
              "align" : "right",
              "position" : 340
            }*/
          ],
          "position" : "top",
          "style" : {
            "type" : "default",
            "background" : null,
            "opacity" : "default"
          }
        }
      ]
    },
    "desktop.grid" : {
      "items" : [
        {
          "title" : "Home",
          "icon" : "places/user-home.png",
          "launch" : "ApplicationFileManager",
          "arguments" : {
            "path" : "/User/Documents"
          },
          "protected" : true
        },
        {
          "title" : "Browser Compability",
          "icon" : "status/software-update-urgent.png",
          "launch" : "API::CompabilityDialog",
          "arguments" : null,
          "protected" : true
        },
        {
          "title" : "README",
          "icon" : "mimetypes/empty.png",
          "launch" : "ApplicationTextpad",
          "arguments" : {
            "path" : "/System/Docs/README"
          },
          "protected" : false
        },
        {
          "title" : "AUTHORS",
          "icon" : "mimetypes/empty.png",
          "launch" : "ApplicationTextpad",
          "arguments" : {
            "path" : "/System/Docs/AUTHORS"
          },
          "protected" : false
        }

      ]
    },
    "user.autorun" : {
      "items" : [
        "ServiceNoop"
      ]
    }
  }
};