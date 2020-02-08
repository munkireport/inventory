Inventory module
================

Gathers inventory information found in `/Library/Managed Installs/ApplicationInventory.plist`

The table provides the following information per 'item':

* id (int) Unique id
* serial_number (string) Serial Number
* name (string) Name
* version (string) Version
* bundleid (string) Bundle ID
* bundlename (string) Bundle Name
* path (string) Path

Configuration
-------------

The inventory module has two settings that can be managed by adding them to the server environment variables or the `.env` file.

#### BUNDLEID_IGNORELIST

List of bundle-ids to be ignored when processing inventoryThe list is processed using regex, examples:

Skip  all virtual windows apps created by parallels and VMware
```bash
BUNDLEID_IGNORELIST='com.parallels.winapp.*, com.vmware.proxyApp.*'
```
Skip all Apple apps, except iLife, iWork and Server
```bash
BUNDLEID_IGNORELIST='com.apple.(?!iPhoto)(?!iWork)(?!Aperture)(?!iDVD)(?!garageband)(?!iMovieApp)(?!Server).*'
```
Skip all apps with empty bundle-id's
```bash
BUNDLEID_IGNORELIST='^$'
```

Defaults:
```bash
BUNDLEID_IGNORELIST='com.parallels.winapp.*,com.vmware.proxyApp.*, com.apple.print.PrinterProxy, com.google.Chrome.app.*'
```

#### BUNDLEPATH_IGNORELIST

List of bundle-paths to be ignored when processing inventory. The list is processed using regex, examples:

Skip all apps in /System/Library
```bash
BUNDLEPATH_IGNORELIST='/System/Library/.*'
```
Skip all apps that are contained in an app bundle (Please note that backslashes need to be escaped)
```bash
BUNDLEPATH_IGNORELIST='.*\\.app\\/.*\\.app'
```

Defaults:
```bash
BUNDLEPATH_IGNORELIST='/System/Library/.*, .*/Library/AutoPkg.*, /.DocumentRevisions-V100/.*, /Library/Application Support/Adobe/Uninstall/.*, .*/Library/Application Support/Google/Chrome/Default/Web Applications/.*'
```

#### APPS_TO_TRACK

Apps Version Widget

List of applications, by name, that you want to see in the apps
version report. If this is not set the report page will appear empty.
This is case insensitive but must be an array.

```bash
APPS_TO_TRACK='Flash Player, Java, Firefox, Microsoft Excel'
```
#### Single app widget

Starting with MunkiReport v5.2.0 you can also use multiple widgets that each track a single application. This way you have more control over your dashboard and you can track different apps in different dashboards. To accomplish this, pass the `appName` and `widget` variables to the widget using the dashboard yaml file.

Note that you still can use the `APPS_TO_TRACK` configuration by not passing in `appName`.

Example: 

```
display_name: My Awesome Dashboard
hotkey: q
row1:
    app1: {appName: "Safari", widget: "app"}
    app2: {appName: "Visual Studio Code", widget: "app"}
    messages:
row2:
    new_clients:
    pending_apple:
    pending_munki:
row3:
    munki:
    disk_report:
    uptime:
```
